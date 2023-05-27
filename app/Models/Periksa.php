<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $table = 'periksa';

    protected $fillable = [
        'idPerusahaan',
        'idKandang',
        'tglPeriksa',
        'mati',
        'culling',
        'bobot',
        'pakan',
    ];


}
