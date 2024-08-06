<?php

namespace App\Resources\Packet;

use App\Resources\Sticker\StickerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacketResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'content'        => $this->content,
            'stickers'       => StickerResource::collection($this->stickers),
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
