<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SAP extends Model
{
    protected $table = 'saps';
    protected $fillable = ['name'];
}
