<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksinasi extends Model
{
    use HasFactory;

    protected $table = 'vaksinasi';

    protected $fillable = [
        'idPerusahaan',
        'idKandang',
        'tglVaksinasi',
        'jenis',
        'jadwal',
        'status',
    ];
}
