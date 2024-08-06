<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class GetRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'sort'      => ['nullable', 'in:asc,desc'],
            'page'      => ['nullable', 'integer'],
        ];
    }
   
}