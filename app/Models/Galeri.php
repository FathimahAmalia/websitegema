<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_slug',
        'category_label',
        'category_badge',
        'date',
        'location',
        'photographer',
        'image',
        'description',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->category_slug)) {
                $model->category_slug = Str::slug($model->category_label);
            }
        });
    }
}
