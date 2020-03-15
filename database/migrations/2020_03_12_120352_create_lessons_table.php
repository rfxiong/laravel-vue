<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('课程名称');
            $table->string('introduce')->comment('课程简介');
            $table->string('preview')->comment('课程简介');
            $table->tinyInteger('ishot')->default(0)->comment('热门科程');
            $table->tinyInteger('iscomment')->default(0)->comment('推荐科程');
            $table->Integer('click')->default(0)->comment('点击率');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
