<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'author',
        'title',
        'article',
        'category_id',
        'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
