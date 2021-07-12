<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtmPost extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'platform'];

    function images()
    {
        return $this->hasMany(Image::class, 'ctm_post_id');
    }

    function comment()
    {
        return $this->hasOne(Comment::class);
    }

    function message()
    {
        return $this->hasOne(Message::class);
    }

    function post()
    {
        return $this->hasOne(Post::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
