<?php

namespace App\Resources\Sticker;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StickerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'content'        => $this->content,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
