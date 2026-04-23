<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
    'nama',
    'jenis',
    'satuan',
    'harga'
];
public function stok()
{
    return $this->hasOne(Stok::class);
}
}
