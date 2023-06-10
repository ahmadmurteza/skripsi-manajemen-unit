<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = 'gudang_sparepart';

    protected $fillable = [
        'nama_gudang',
        'penanggung_jawab',
        'deskripsi',
        'nama_gudang',
        'longitude',
        'latitude',
    ];
}
