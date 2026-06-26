<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Madrasah extends Model
{
    protected $fillable = ['name', 'level', 'address', 'status', 'details', 'map_embed', 'image'];

    protected $casts = [
        'details' => 'array',
    ];
}
