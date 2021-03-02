<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mapel',
        'nama_mapel',
        'kkm',
        'jumlah',
        'waktu',
        'foto'
    ];
}
