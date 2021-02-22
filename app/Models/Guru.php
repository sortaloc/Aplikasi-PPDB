<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nuptk',
        'tahun_masuk',
        'nama',
        'pendidikan',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'agama',
        'alamat',
        'no_hp',
        'email',
        'foto'
    ];
}
