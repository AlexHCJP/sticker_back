<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sticker\CreateRequest;
use App\Models\Sticker;
use App\Service\StickerService;
use App\Resources\Sticker\StickerResource;

class StickerController extends Controller
{
    public function __construct(
        public StickerService $service
    )
    {}

    // public function get(GetRequest $request)
    // {
    //     return self::response(function () use ($request) {
    //         return $this->service->get($request->validated());
    //     });
    // }

    public function show(Sticker $packet) 
    {
        return self::response(function () use ($packet) {
            return [
                'packet' => StickerResource::make($packet)
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