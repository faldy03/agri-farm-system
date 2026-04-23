<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi_Pengeluaran extends Model
{
    protected $fillable = [
        'sawah_id',
        'produk_id',
        'jumlah',
        'biaya',
        'tanggal',
        'keterangan'
    ];
    public function sawah()
    {
        return $this->belongsTo(Sawah::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
