<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];
    // protected $touches = ['post'];
    protected $touches = ['commentable'];

    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }

    public function commentable()
    {
        return $this->morphTo();
    }
    public function getName()
    {
        // $relation = $this->commentable_type;

        // if ($relation == 'App\Models\Post') {
        //     return $this->commentable->title;
        // }
        // if ($relation == 'App\Models\Video') {
        //     return $this->commentable->name;
        // }

        //##############################################
        $relation = $this->commentable;
        if ($relation instanceof Post) {
            return $this->commentable->title;
        }
        if ($relation instanceof Video) {
            return $this->commentable->name;
        }
    }
}
