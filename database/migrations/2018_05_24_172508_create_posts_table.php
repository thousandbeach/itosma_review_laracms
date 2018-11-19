<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title');
            // $table->integer('category_id')->unsigned()->index();
            $table->integer('category_id')->nullable();
            $table->string('featured')->nullable();
            $table->longText('content');
            $table->string('hero_image')->nullable();
            $table->string('slug')->unique()->index();
            $table->integer('tag_id')->nullable();
            $table->string('description');
            $table->string('keyword');
            $table->softDeletes();
            $table->timestamps();
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
