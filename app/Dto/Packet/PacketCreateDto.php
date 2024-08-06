<?php

namespace App\Dto\Packet;

use App\Dto\Dto;

class PacketCreateDto extends Dto
{
    public function __construct(
        public string $name,
        public array|null $categories,
        public string $content
    ) {
    }
}
