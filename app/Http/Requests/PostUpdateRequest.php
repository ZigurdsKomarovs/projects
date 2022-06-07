<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts,title,' . $this->id . '|max:255',
            'body' => 'required',
            'author_name' => 'nullable',
        ];
    }
}
