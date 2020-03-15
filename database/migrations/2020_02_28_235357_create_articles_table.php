<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('标题|input');
            $table->string('author')->comment('作者|input');
            $table->text('content')->comment('内容|simditor');
            $table->string('thump')->comment('缩略图|image');
            $table->integer('click')->comment('查看次数|input');
            $table->tinyInteger('iscommend')->default(1)->comment('推荐|radio|1:是,2:否');
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
        Schema::dropIfExists('articles');
    }
}
