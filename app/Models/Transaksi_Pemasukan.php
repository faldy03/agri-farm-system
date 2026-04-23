<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi_Pemasukan extends Model
{
    protected $fillable = [
        'sawah_id',
        'panen_id',
        'jumlah',
        'total',
        'tanggal'
    ];
    public function sawah()
    {
        return $this->belongsTo(Sawah::class);
    }

    public function panen()
    {
        return $this->belongsTo(Panen::class);
    }
}
