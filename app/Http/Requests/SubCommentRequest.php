<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'general_comment_id' => ['required', 'integer', 'exists:general_comments,id'],
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'page' => ['required'],
            'captcha' => ['required', 'captcha'],
            'comment' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
