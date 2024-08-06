<?php

namespace App\Service;
use App\Dto\Sticker\StickerCreateDto;
use App\Models\Sticker;
use App\Resources\Sticker\StickerResource;

class StickerService 
{
    public function __construct(
        // public PacketRepository $repository
    )
    {}

    // public function get(array $params): array
    // {
    //     return [
    //         'data' => PacketResource::collection($this->repository->getPaginated($params)),
    //     ];
    // }

    public function create(StickerCreateDto $dto)
    {
      
        return [
            'data'    => StickerResource::make(Sticker::create($dto->toArray())),
            'message' => 'sticker created successfully'
        ];
    }
}