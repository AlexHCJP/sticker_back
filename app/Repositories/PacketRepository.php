<?php

namespace App\Repositories;

use App\Models\Packet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Repository;

class PacketRepository extends Repository
{
    public function getPaginated(array $params = []): Collection
    {
        $query = Packet::query();
        $query = $this->applyFilter($query, $params);
        $query = $this->applyOrder($query, $params);
        $query = $this->applyPagination($query, $params);

        return $query->get();
    }

    private function applyFilter(Builder $query, array $params = []): Builder
    {
        if(isset($params['categories'])) {
            $query->where(function ($query) use ($params) {
                $query->whereHas('category', function($query) use ($params){
                    $query->whereIn('category_id', $params['categories']);
                });
            });
        }

        if(isset($parmas['filter'])) {
            $query->where('name', 'ilike', '%' . $params['filter'] . '%');
        }

        return $query;
    }
}
