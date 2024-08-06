<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacketCategory extends Model
{
    protected $fillable = [
        'category_id',
        'packet_id'
    ];

}