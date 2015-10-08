<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IpPostsViewed extends Model
{
    protected $table = 'ip_posts_vieweds';

    protected $fillable = ['ip', 'posts_id'];
}
