<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latarbelakang extends Model
{
    use HasFactory;
    protected $fillable = [
        'sejarah',
        'visi',
        'misi'
    ];
}
