<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wakaf extends Model
{
    protected $fillable = [
        'name',
        'jenis_properti',
        'luas',
        'nadzir',
        'address',
        'map_embed',
        'image',
    ];
}
