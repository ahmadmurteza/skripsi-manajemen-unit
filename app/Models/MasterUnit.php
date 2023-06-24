<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUnit extends Model
{
    use HasFactory;
    protected $table = 'master_unit';

    protected $fillable = [
        'jenis_unit',
        'aset',
        'nomer_serial',
        'nomer_lambung',
        'status',
        'keterangan',
        'lokasi_id',
        'hm',
        'hm_service_id',
    ];
}
