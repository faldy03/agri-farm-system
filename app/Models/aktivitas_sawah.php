<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aktivitas_sawah extends Model
{
    protected $fillable = [
    'sawah_id',
    'user_id',
    'jenis_aktivitas',
    'tanggal',
    'keterangan'
];
    public function sawah()
    {
        return $this->belongsTo(Sawah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
