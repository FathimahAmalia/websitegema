<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event',
        'level',
        'level_slug',
        'level_badge',
        'year',
        'category',
        'category_slug',
        'medal',
        'medal_icon',
        'medal_color',
        'image',
        'students',
        'instructor',
        'date',
        'location',
        'organizer',
        'description',
        'highlights',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->level_slug)) {
                $model->level_slug = Str::slug($model->level);
            }
            if (empty($model->category_slug)) {
                $model->category_slug = Str::slug($model->category);
            }
        });
    }

    public function getHighlightsListAttribute(): array
    {
        if (empty($this->highlights)) return [];
        $decoded = json_decode($this->highlights, true);
        return is_array($decoded) ? $decoded : array_filter(array_map('trim', explode("\n", $this->highlights)));
    }
}
