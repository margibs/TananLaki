<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_polls', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('author_id');
            $table->bigInteger('posts_id');
            $table->string('ip_add');
            $table->string('poll_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_polls');
    }
}
