<?php

namespace App\Http\Requests\Packet;

use Illuminate\Foundation\Http\FormRequest;

class GetRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'filter'     => ['nullable', 'string'],
            'sort'             => ['nullable', 'in:asc,desc'],
            'page'             => ['nullable', 'integer'],
            'categories'      => ['nullable', 'array'],
            'categories'    => ['nullable', 'exists:categories,id'],
        ];
    }
   
}