<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVendor extends Model
{
    use HasFactory;
    
    protected $table='master_vendor';

    protected $fillable = [
        'nama',
        'kode',
        'harga_katering_dasar',
        'add_on',
        'harga_add_on',
    ];
}
