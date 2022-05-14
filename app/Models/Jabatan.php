<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'tm_jabatan';
    protected $fillable = [
        'jabatan','created_at','updated_at'
    ];
}
