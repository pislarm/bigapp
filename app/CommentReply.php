<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $filalble = [
      'comment_id',
      'author',
      'email',
      'body',
      'is_active',

    ];

    public function comment(){
      $this->belongsTo('App\Comment');
    }
}
