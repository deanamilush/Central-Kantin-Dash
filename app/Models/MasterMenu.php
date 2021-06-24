<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMenu extends Model
{
    protected $table='master_all_menu';

    protected $fillable = [
        'kode_katering',
        'hari',
        'menu_utama',
        'menu_add_on',
        'harga_add_on',
    ];

    public function setHariAttribute($value)
    {
        $this->attributes['hari'] = json_encode($value);
    }

    public function getHariAttribute($value)
    {
        return $this->attributes['hari'] = json_decode($value);
    }
    
    public function setMenuAttribute($value)
    {
        $this->attributes['menu_utama'] = json_encode($value);
    }

    public function getMenuAttribute($value)
    {
        return $this->attributes['menu_utama'] = json_decode($value);
    }
    
    public function setAddOnAttribute($value)
    {
        $this->attributes['menu_add_on'] = json_encode($value);
    }

    public function getAddOnAttribute($value)
    {
        return $this->attributes['menu_add_on'] = json_decode($value);
    }

    protected $casts = [
        'hari' => 'json',
        'menu_utama' => 'json',
        'menu_add_on' => 'json',
    ];

    /*
    protected $table='test';
    protected $fillable = [
        'list',
    ];
    */
}
