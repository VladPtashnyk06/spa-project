<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralCommentRequest;
use App\Models\GeneralComment;

class GeneralCommentController extends Controller
{
    public function index()
    {
        return GeneralComment::all();
    }

    public function store(GeneralCommentRequest $request)
    {
        return GeneralComment::create($request->validated());
    }

    public function show(GeneralComment $generalComment)
    {
        return $generalComment;
    }

    public function update(GeneralCommentRequest $request, GeneralComment $generalComment)
    {
        $generalComment->update($request->validated());

        return $generalComment;
    }

    public function destroy(GeneralComment $generalComment)
    {
        $generalComment->delete();

        return response()->json();
    }
}
