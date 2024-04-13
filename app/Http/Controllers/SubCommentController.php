<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCommentRequest;
use App\Models\GeneralComment;
use App\Models\SubComment;
use App\Models\User;

class SubCommentController extends Controller
{
    public function index(int $idGenComment)
    {
        $generalComment = GeneralComment::findOrFail($idGenComment);
        $subComments = SubComment::where('general_comment_id', $idGenComment)->orderByDesc('id')->paginate(25);
        if (auth()->user()) {
            $userId = auth()->user()->id;
            $user = User::find($userId);
        } else {
            $user = null;
        }
        return view('site.sub-comments.index',compact('generalComment', 'subComments', 'user'));
    }

    public function create(int $idGenComment)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $generalComment = GeneralComment::where('id', $idGenComment)->firstOrFail();

        return view('site.sub-comments.create', compact('generalComment', 'user'));
    }

    public function store(SubCommentRequest $request)
    {
        SubComment::create($request->validated());

        return redirect()->route('genCom.index');
    }

    public function edit(int $idSubComment)
    {
        $subComment = SubComment::findOrFail($idSubComment);

        return view('site.sub-comments.edit', compact('subComment'));
    }

    public function update(SubCommentRequest $request, int $idSubComment)
    {
        SubComment::findOrFail($idSubComment)->update($request->validated());

        return redirect()->route('sub-comments.index');
    }

    public function destroy(int $idSubComment)
    {
        SubComment::findOrFail($idSubComment)->delete();

        return back();
    }
}
