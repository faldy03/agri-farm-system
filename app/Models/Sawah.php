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
}
