<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends CommonModel
{
    public function lessons()
    {
        return $this->belongsToMany('App\admin\Lesson');
    }
}
