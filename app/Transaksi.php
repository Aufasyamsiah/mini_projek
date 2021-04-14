<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [' id_order', 'jumlah_pembayaran', 
                            'keseimbangan', 'metode_pembayaran', 'user_id', 
                            'tanggal_transaksi', 'jumlah_transaksi'];
}
