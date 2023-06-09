<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'lokasi';

    protected $fillable = [
        'nama_lokasi',
        'longitude',
        'latitude',
        'radius',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
