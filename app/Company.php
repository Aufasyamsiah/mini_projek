<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [' nama_perusahaan', 'alamat_perusahaan', 
                            'phone_perusahaan', 'email_perusahaan'];
}
