<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'post_id',
        'parent_id',
        'content',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent(){
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }
}