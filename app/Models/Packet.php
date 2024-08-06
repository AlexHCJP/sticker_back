<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Sticker;

class Packet extends Model
{
    protected $fillable = [
        'name',
        'content',
        'views'
    ];

    protected $casts = [
        'content' => 'json',
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,      
            'packet_categories', 
            'packet_id',         
            'category_id'        
        );
    }

    public function packetCategories(): HasMany
    {
        return $this->hasMany(PacketCategory::class);
    }

    public function stickers(): HasMany
    {
        return $this->hasMany(Sticker::class);
    }
}