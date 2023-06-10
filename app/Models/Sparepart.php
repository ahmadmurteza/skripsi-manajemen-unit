<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $table = 'gudang_sparepart';

    protected $fillable = [
        'nama_gudang',
        'longitude',
        'latitude',
    ];
}
