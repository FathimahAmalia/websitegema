<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'category_slug',
        'author',
        'author_role',
        'read_time',
        'views',
        'image',
        'image_caption',
        'is_featured',
        'excerpt',
        'body',
        'tags',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'date',
        'views' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
            if (empty($model->category_slug)) {
                $model->category_slug = Str::slug($model->category);
            }
        });
    }

    public function getTagsListAttribute(): array
    {
        if (empty($this->tags)) {
            return [];
        }
        if (is_array($this->tags)) {
            return $this->tags;
        }
        $decoded = json_decode($this->tags, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }
        return array_map('trim', explode(',', $this->tags));
    }
}
