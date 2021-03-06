<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';

    protected $fillable =['nama_produk', 'kategori', 'gambar', 'stok', 'harga'];
}
