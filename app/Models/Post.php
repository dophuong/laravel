<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Eloquent;

class Post extends Eloquent
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'content', 'image','isPrivate',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','userId');
    }
}
