<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCommentRequest;
use App\Models\SubComment;

class SubCommentController extends Controller
{
    public function index()
    {
        return SubComment::all();
    }

    public function store(SubCommentRequest $request)
    {
        return SubComment::create($request->validated());
    }

    public function show(SubComment $comment)
    {
        return $comment;
    }

    public function update(SubCommentRequest $request, SubComment $comment)
    {
        $comment->update($request->validated());

        return $comment;
    }

    public function destroy(SubComment $comment)
    {
        $comment->delete();

        return response()->json();
    }
}
