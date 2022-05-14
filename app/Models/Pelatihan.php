<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'tm_pelatihan';
    protected $fillable = [
        'pelatihan','sertifikat','tahun','id_pelamar'
    ];
}
