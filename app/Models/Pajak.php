<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $table = 'pajak';

    protected $fillable = [
        'no',
        'tanggal',
        'nama',
        'telp',
        'email',
        'nominal',
        'jenis',
        'ktp',
        'status_validasi',
    ];
}
