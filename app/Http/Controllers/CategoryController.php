<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\GetRequest;
use App\Service\CategoryService;

class CategoryController extends Controller
{
    public function __construct(
        public CategoryService $service
    )
    {}

    public function get(GetRequest $request)
    {
        return self::response(function () use ($request) {
            return $this->service->get($request->validated());
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