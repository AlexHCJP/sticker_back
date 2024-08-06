<?php

namespace App\Service;
use App\Models\Packet;
use App\Dto\Packet\PacketCreateDto;
use App\Repositories\PacketRepository;
use App\Resources\Packet\PacketResource;

class PacketService 
{
    public function __construct(
        public PacketRepository $repository
    )
    {}

    public function get(array $params): array
    {
        return [
            'data' => PacketResource::collection($this->repository->getPaginated($params)),
        ];
    }

    public function create(PacketCreateDto $dto)
    {
        $model    = Packet::create($dto->toArray());

        if(!is_null($dto->categories)) {
            $categories = array_map(fn($device) => ['platform_id' => $device], $dto->categories);

            if($model->category()->exists()) {
                $packetCategories = $model->packetCategories;
                $packetCategories->each->delete();
            }
    
            $model->packetCategories()->createMany($categories);
        }
      
        return [
            'data'    => PacketResource::make($model),
            'message' => 'packet created successfully'
        ];
    }
}