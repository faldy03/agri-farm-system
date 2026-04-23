<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sawah extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'luas',
        'lokasi_lat',
        'lokasi_lng',
        'deskripsi',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function aktivitas()
    {
        return $this->hasMany(Aktivitas_Sawah::class);
    }
    public function panen()
    {
        return $this->hasMany(Panen::class);
    }

    public function pengeluaran()
    {
        return $this->hasMany(Transaksi_Pengeluaran::class);
    }

    public function pemasukan()
    {
        return $this->hasMany(Transaksi_Pemasukan::class);
    }
}
