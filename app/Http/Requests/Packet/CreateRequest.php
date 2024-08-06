<?php

namespace App\Http\Requests\Packet;

use App\Dto\Packet\PacketCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'string',],
            'name'    => ['required', 'string', 'max:255'],
            'categories'      => ['nullable', 'array'],
            'categories'    => ['nullable', 'exists:categories,id'],
        ];
    }

    public function getDto(): PacketCreateDto
    {
        return new PacketCreateDto(
            $this->get('name'),
            $this->get('categories'),
            $this->get('content')
        );
    }
}

