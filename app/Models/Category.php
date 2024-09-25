<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function latestArticle()
    {
        return $this->hasOne(Article::class)
            ->select('id', 'category_id', 'title')
            ->orderBy('id', 'desc');
    }
}
