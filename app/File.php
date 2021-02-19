<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['style', 'upc', 'total', 'retail', 'total_cost', 'total_wholesale', 'sales', 'sell_through', 'ranking', 'season'];

    public function pdf()
    {
        return $this->belongsToMany(Pdf::class);
    }

    public function hasPdf($pdfId)
    {
        return in_array($pdfId, $this->pdf->pluck('id')->toArray());
    }
}
