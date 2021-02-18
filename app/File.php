<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['user_id', 'style', 'upc', 'total', 'retail', 'total_cost', 'total_wholesale', 'sales', 'sell_through', 'ranking', 'season'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
