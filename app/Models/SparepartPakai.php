<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparepartPakai extends Model
{
    use HasFactory;

    protected $table = 'sparepart_pakai';

    protected $fillable = [
        'sparepart_beli_id',
        'tanggal_dipakai',
        'jumlah',
        'penerima',
        'status',
    ];
}
