<?php

namespace App\Service;
use App\Models\Category;
use App\Dto\Category\CategoryCreateDto;
use App\Resources\Category\CategoryResource;
use App\Repositories\CategoryRepository;

class CategoryService 
{
    public function __construct(
        public CategoryRepository $repository
    )
    {}

    public function get(array $params): array
    {
        return [
            'data' => CategoryResource::collection($this->repository->getPaginated($params)),
        ];
    }

    public function create(CategoryCreateDto $dto)
    {
        return [
            'data'    => CategoryResource::make(Category::create($dto->toArray())),
            'message' => 'category created successfully'
        ];
    }
}