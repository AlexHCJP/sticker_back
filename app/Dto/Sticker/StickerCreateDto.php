<?php

namespace App\Dto\Sticker;

use App\Dto\Dto;

class StickerCreateDto extends Dto
{
    public function __construct(
        public string $content,
        public int $packet_id,
    ) {
    }
}
