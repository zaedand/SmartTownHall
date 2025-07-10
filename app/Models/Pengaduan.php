<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nama',
        'no_telepon',
        'alamat',
        'keterangan',
        'surat',
        'jenis',
        'status_validasi',
        'keterangan_admin',
    ];
}
