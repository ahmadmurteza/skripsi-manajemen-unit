<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $fillable = [
        'master_unit_id',
        'lokasi_id',
        'pengadu',
        'kerusakan',
        'status',
        'prioritas',
        'foto_insiden',
        'waktu_insiden',
    ];
}
