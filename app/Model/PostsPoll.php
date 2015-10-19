<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostsPoll extends Model
{
    protected $table = 'posts_polls';

    protected $fillable = ['posts_id', 'poll_question','poll_enable'];
}
