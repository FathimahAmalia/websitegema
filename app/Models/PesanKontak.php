<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'subjek',
        'pesan',
        'status_dibaca',
        'catatan_balasan',
    ];

    protected $casts = [
        'status_dibaca' => 'boolean',
    ];
}
