<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'preview' => 'required|string',
            'body' => 'required|string',
            'published_at' => 'nullable|date',
            'author_id' => 'required|exists:authors,id',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ];
    }
}
