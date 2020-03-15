<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mydb extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [];
}
