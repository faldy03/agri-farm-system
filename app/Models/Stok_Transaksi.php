<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok_Transaksi extends Model
{
    protected $fillable = [
        'produk_id',
        'tipe',
        'jumlah',
        'tanggal',
        'keterangan'
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
