<?php
/**
 * 控制器基类，放置类公用的方法
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    /**
     * 使用类方法之前需要通过身份验证
     */
    public function __construct()
    {
    	$this->middleware('admin.check');
    }

    /**
     * 返回异步成功信息
     */
    public function success($message)
    {
    	return response()->json(['message'=>$message,'valid'=>1]);
    }

    /**
     * 返回异步错误信息
     */
    public function error($message)
    {
    	return response()->json(['message'=>$message,'valid'=>0]);
    }
}
