<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends CommonModel
{
    public function videos()
    {
    	return $this->hasMany('App\Admin\Video');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Admin\Tag');
    }
}
