<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediksi_Panen extends Model
{
    protected $fillable = [
        'sawah_id',
        'estimasi_kg',
        'tanggal_prediksi'
    ];
    public function sawah()
    {
        return $this->belongsTo(Sawah::class);
    }
}
