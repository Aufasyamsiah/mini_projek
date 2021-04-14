<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['nama_produk', 'deskripsi', 'merek', 
                            'harga', 'kuantitas', 'stok_barang'];
}
