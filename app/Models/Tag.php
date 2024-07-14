<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Article;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug',
    ];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'articles_tags', 'article_id', 'tag_id');
    }
}
