<?php

namespace App\Http\Requests\Sticker;

use App\Dto\Packet\PacketCreateDto;
use App\Dto\Sticker\StickerCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'packet_id'    => ['nullable', 'integer', 'exists:packets,id'],
            'content' => ['required', 'string',],
        ];
    }

    public function getDto(): StickerCreateDto
    {
        return new StickerCreateDto(
            $this->get('content'),
            $this->get('packet_id'),
        );
    }
}

