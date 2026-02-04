<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_category';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'status',
        'icon',
    ];

    public function service(){
        return $this->hasMany(Services::class, 'kategori_id');
    }
}
