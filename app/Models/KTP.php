<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KTP extends Model
{
    use HasFactory;


    protected $table = 'ktp';

    protected $fillable = [
        'No_NIK',
        'No_KK',
        'Foto_KK',
        'status_validasi',
    ];
}
