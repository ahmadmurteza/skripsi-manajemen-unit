<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparepartBeli extends Model
{
    use HasFactory;

    protected $table = 'sparepart_beli';

    protected $fillable = [
        'gudang_sparepart_id',
        'tanggal_diterima',
        'deskripsi',
        'nomor_part',
        'jumlah',
        'harga_satuan',
        'total',
        'suplier',
        'nomor_po',
        'penerima',
        'status',
    ];
}
