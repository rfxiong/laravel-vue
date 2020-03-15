<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends CommonController
{
    public function upload(Request $request)
    {
    	//判断是否有文件上传成功
    	if($request -> hasFile('file') && $request -> file('file') -> isValid()){
    		//有文件上传（重点）
    		$filename = sha1(time() . $request -> file('file') -> getClientOriginalName()) . '.' .  $request -> file('file') -> getClientOriginalExtension();
    		//文件保存/移动
    		Storage::disk('public') -> put($filename, file_get_contents($request -> file('file') -> path()));
    		//返回数据
    		$result = [
    			'errCode'		=>		'0',
    			'errMsg'		=>		'',
    			'succMsg'		=>		'文件上传成功！',
    			'path'			=>		'/storage/' . $filename,
    		];
    	}else{
    		//没有文件被上传或者出错
    		$result = [
    			'errCode'		=>		'000001',
    			'errMsg'		=>		$request -> file('file') -> getErrorMessage()
    		];
    	}
    	//返回信息
    	return response() -> json($result);
    }
}
