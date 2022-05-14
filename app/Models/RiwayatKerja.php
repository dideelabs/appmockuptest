<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatKerja extends Model
{
    protected $table = 'tm_riwayat_kerja';
    protected $fillable = [
        'perusahaan','posisi','gaji','tahun','id_pelamar'
    ];
}
