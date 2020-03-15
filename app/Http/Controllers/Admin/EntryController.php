<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use User;
use Redirect;

class EntryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('admin.check')->except(['login','check']);
    }

    /**
     * 登录后，展示首台首页
     * @return [type] [description]
     */
    public function index()
    {
    	return view('admin.entry.index');
    }

    public function login()
    {
    	return view('admin.entry.login');
    }

    public function check(Request $request)
    {
    	$user = $this->validate($request,[
    		'name' => 'required|min:3',
    		'password' => 'required|min:5'
    	]);
    	$result = Auth::guard('admin')->attempt($user,$request->remember_token);
    	if($result){
    		// session()->flash('success','登录成功');
    		return Redirect::route('admin.index')->with('success','登录成功');
    	}
    	// session()->flash('success','账号或密码不正确，登录失败');
    	return Redirect::back()->with('danger','账号或密码不正确，登录失败');
    }

    public function logout()
    {
    	//session()->flash('success','退出成功');
    	Auth::guard('admin')->logout();
    	return Redirect::route('admin.login')->with('success','退出成功');
    }
}
