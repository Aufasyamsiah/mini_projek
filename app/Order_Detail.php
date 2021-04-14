<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [' id_order', 'id_produk', 
                            'kuantitas', 'harga', 
                            'jumlah', 'diskon'];
}

