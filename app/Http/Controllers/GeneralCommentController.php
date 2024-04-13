<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralCommentRequest;
use App\Http\Requests\GeneralCommentsFilterRequest;
use App\Models\GeneralComment;
use App\Models\User;


class GeneralCommentController extends Controller
{
    public function index()
    {
        $generalComments = GeneralComment::orderBy('id', 'desc')->paginate(25);

        return view('site.general-comments.my-comments', compact('generalComments'));
    }

    public function allComments(GeneralCommentsFilterRequest $request)
    {
        $queryParams = $request->only(['name', 'email', 'created_at']);
        $filteredParams = array_filter($queryParams);

        $names = GeneralComment::pluck('name')->unique();
        $emails = GeneralComment::pluck('email')->unique();
        $created_ats = GeneralComment::pluck('created_at')->unique();

        $generalComments = GeneralComment::query();

        if (isset($filteredParams['name'])) {
            $generalComments->where('name', $filteredParams['name']);
        }

        if (isset($filteredParams['email'])) {
            $generalComments->where('email', $filteredParams['email']);
        }

        if (isset($filteredParams['created_at'])) {
            $generalComments->where('created_at', $filteredParams['created_at']);
        }

        $generalComments = $generalComments->orderByDesc('id')->paginate(25);

        return view('site.general-comments.all-comments', compact('names', 'emails', 'created_ats', 'generalComments'));
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
