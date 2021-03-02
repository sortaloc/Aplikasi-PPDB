<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_mapel',
        'nama_mapel',
        'kkm',
        'nilai'
    ];
}
