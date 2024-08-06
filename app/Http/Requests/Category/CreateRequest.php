<?php

namespace App\Http\Requests\Category;

use App\Dto\Category\CategoryCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function getDto(): CategoryCreateDto
    {
        return new CategoryCreateDto($this->get('name'));
    }
}
