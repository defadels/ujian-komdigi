<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'kategori_id',
        'url_akses',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(ServiceCategory::class, 'kategori_id');
    }
}
