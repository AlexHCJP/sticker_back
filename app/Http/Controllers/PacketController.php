<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Packet\CreateRequest;
use App\Http\Requests\Packet\GetRequest;
use App\Models\Packet;
use App\Service\PacketService;
use App\Resources\Packet\PacketResource;

class PacketController extends Controller
{
    public function __construct(
        public PacketService $service
    )
    {}

    public function get(GetRequest $request)
    {
        return self::response(function () use ($request) {
            return $this->service->get($request->validated());
        });
    }

    public function show(Packet $packet) 
    {
        return self::response(function () use ($packet) {
            return [
                'packet' => PacketResource::make($packet)
            ];
        });
    }

    public function create(CreateRequest $request)
    {
        $request->validated();
        
        return self::response(function () use ($request) {
            return $this->service->create($request->getDto());
        });
    }
}