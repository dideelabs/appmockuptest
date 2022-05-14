<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'tm_pendidikan';
    protected $fillable = [
        'jenjang','institusi','jurusan','tahun','ipk','id_pelamar'
    ];
}
