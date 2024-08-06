<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Repository;

class CategoryRepository extends Repository
{
    public function getPaginated(array $params = []): Collection
    {
        $query = Category::query();
        $query = $this->applyFilter($query, $params);
        $query = $this->applyOrder($query, $params);
        $query = $this->applyPagination($query, $params);

        return $query->get();
    }

    private function applyFilter(Builder $query, array $params = []): Builder
    {
        //
        return $query;
    }
}
