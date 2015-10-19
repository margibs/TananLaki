<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostsPollAnswer extends Model
{
    protected $table = 'posts_poll_answers';
    protected $fillable = ['posts_poll_id', 'poll_answer'];
}
