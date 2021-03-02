<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mapel',
        'nama_mapel',
        'soal',
        'A',
        'B',
        'C',
        'D',
        'E',
        'jawaban'
    ];
}
