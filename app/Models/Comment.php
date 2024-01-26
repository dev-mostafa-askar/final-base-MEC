<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'media_type',
        'media',
        'post_id',
        'user_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function replays(){
        return $this->hasMany(Replay::class, 'comment_id');
    }
}
