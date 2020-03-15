<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CommonController extends Controller
{
    public function response($data,$code=200)
    {
        return ['data'=>$data, 'code'=>$code];
    }
}
