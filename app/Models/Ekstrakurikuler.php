<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'category',
        'category_slug',
        'tagline',
        'description',
        'activities',
        'curriculum',
        'schedule',
        'days',
        'time',
        'location',
        'instructor',
        'instructor_role',
        'members_count',
        'badge',
        'icon',
        'color',
        'background',
        'achievements',
        'requirements',
        'image',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
            if (empty($model->category_slug)) {
                $model->category_slug = Str::slug($model->category);
            }
        });
    }

    public function getActivitiesListAttribute(): array
    {
        if (empty($this->activities)) return [];
        $decoded = json_decode($this->activities, true);
        return is_array($decoded) ? $decoded : array_filter(array_map('trim', explode("\n", $this->activities)));
    }

    public function getCurriculumListAttribute(): array
    {
        if (empty($this->curriculum)) return [];
        $decoded = json_decode($this->curriculum, true);
        return is_array($decoded) ? $decoded : array_filter(array_map('trim', explode("\n", $this->curriculum)));
    }
}
