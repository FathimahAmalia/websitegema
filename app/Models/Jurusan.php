<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'short_name',
        'code',
        'head_of_program',
        'description',
        'vision',
        'mission',
        'career_prospects',
        'competencies',
        'facilities',
        'image',
        'icon',
        'accent_color',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->short_name ?: $model->name);
            }
        });
    }

    public function getCareerProspectsListAttribute(): array
    {
        if (empty($this->career_prospects)) return [];
        $decoded = json_decode($this->career_prospects, true);
        return is_array($decoded) ? $decoded : array_filter(array_map('trim', explode("\n", $this->career_prospects)));
    }

    public function getCompetenciesListAttribute(): array
    {
        if (empty($this->competencies)) return [];
        $decoded = json_decode($this->competencies, true);
        return is_array($decoded) ? $decoded : array_filter(array_map('trim', explode("\n", $this->competencies)));
    }
}
