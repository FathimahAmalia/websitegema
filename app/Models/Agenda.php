<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'day',
        'month',
        'year',
        'event_date',
        'location',
        'badge',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
