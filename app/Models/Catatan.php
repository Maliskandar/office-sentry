<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    // Pastikan Anda memiliki fillable untuk kolom yang diisi
    protected $fillable = ['sumber_informasi', 'catatan'];
}