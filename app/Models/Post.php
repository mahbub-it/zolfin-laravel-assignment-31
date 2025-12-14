<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'thumbnail', 'excerpt', 'content', 'category_id', 'user_id'];
    protected $with = ['category', 'user'];

    // protected $table = 'another_posts';

    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}