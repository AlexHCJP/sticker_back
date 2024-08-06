<?php

namespace App\Dto\Category;

use App\Dto\Dto;

class CategoryCreateDto extends Dto
{
    public function __construct(
        public string $name
    ) {
    }
}