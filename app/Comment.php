<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $filalble = [
      'post_id',
      'author',
      'email',
      'body',
      'is_active',

    ];

    public function replies(){
      return $this->hasMany('App\CommentReply');
    }
}
