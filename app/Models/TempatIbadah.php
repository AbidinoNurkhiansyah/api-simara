<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatIbadah extends Model
{
    protected $fillable = ['name', 'type', 'address', 'details', 'map_embed', 'image'];

    protected $casts = [
        'details' => 'array',
    ];
}
