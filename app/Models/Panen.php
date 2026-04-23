<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    protected $fillable = [
        'sawah_id',
        'tanggal_panen',
        'jumlah_kg',
        'harga_per_kg',
        'total'
    ];
    public function sawah()
    {
        return $this->belongsTo(Sawah::class);
    }
}
