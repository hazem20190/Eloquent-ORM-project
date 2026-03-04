<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $fillable = ['title', 'likes', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'owner', 'email' => 'owner@test.com']);
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // public function image()
    // {
    //     return $this->morphOne(Image::class, 'imageable');
    // }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // public function tags()
    // {
    //     return $this->morphToMany(Tag::class, 'taggable');
    // }
}
