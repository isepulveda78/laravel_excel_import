<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SapFile extends Model
{
    protected $fillable = ['name','sapfiles'];

    protected $casts = [
        'sapfiles' => 'array'
    ];
}
