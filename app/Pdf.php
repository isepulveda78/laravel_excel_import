<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $fillable = ['name'];

    public function file()
    {
        return $this->belongsToMany(File::class);
    }

}
