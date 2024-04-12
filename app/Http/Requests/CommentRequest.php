<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'page' => ['required'],
            'captcha' => ['required'],
            'text' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
