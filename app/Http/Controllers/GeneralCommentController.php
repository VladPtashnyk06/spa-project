<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralCommentRequest;
use App\Models\GeneralComment;
use App\Models\User;


class GeneralCommentController extends Controller
{
    public function index()
    {
        $generalComments = GeneralComment::orderBy('id', 'desc')->paginate(25);

        return view('site.general-comments.my-comments', compact('generalComments'));
    }

    public function allComments()
    {
        $generalComments = GeneralComment::orderBy('id', 'desc')->paginate(25);

        return view('site.general-comments.all-comments', compact('generalComments'));
    }

    public function create()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        return view('site.general-comments.create', compact('user'));
    }

    public function store(GeneralCommentRequest $request)
    {
        GeneralComment::create($request->validated());

        return redirect()->route('genCom.my.index');
    }

    public function edit(int $idGeneralComment)
    {
        $generalComment = GeneralComment::findOrFail($idGeneralComment);

        return view('site.general-comments.edit', compact('generalComment'));
    }

    public function show(int $idGeneralComment)
    {
        $generalComment = GeneralComment::findOrFail($idGeneralComment);

        return view('site.general-comments.single-comment', compact('generalComment'));
    }

    public function update(GeneralCommentRequest $request, int $idGeneralComment)
    {
        GeneralComment::findOrFail($idGeneralComment)->update($request->validated());

        return redirect()->route('genCom.my.index');
    }

    public function destroy(int $idGeneralComment)
    {
        GeneralComment::findOrFail($idGeneralComment)->delete();

        return back();
    }
}
