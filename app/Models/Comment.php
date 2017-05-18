<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'postId', 'parentId', 'content','author',
    ];

    public function post(){
        return $this->belongsTo('App\Models\Post','postId');
    }
}
