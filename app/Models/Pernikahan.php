<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pernikahan extends Model
{
    protected $fillable = [
        'bulan',
        'tahun',
        'pernikahan',
        'isbat_nikah'
    ];
}
