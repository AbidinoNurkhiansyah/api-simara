<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyStat extends Model
{
    protected $fillable = ['month', 'year', 'marriages_count', 'isbats_count'];
}
