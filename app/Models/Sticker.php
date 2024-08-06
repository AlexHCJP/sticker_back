<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sticker extends Model
{
    protected $fillable = [
        'content',
        'packet_id'
    ];

    public function packet(): BelongsTo
    {
        return $this->belongsTo(Packet::class);
    }
}