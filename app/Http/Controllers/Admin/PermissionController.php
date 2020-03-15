<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = DB::select('select t1.*,t2.title menu from permissions t1 left JOIN  permissions as t2 on t1.pid = t2.id');
        //dd($permissions);
        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        
        //dd($data);
        Permission::create([
            'name' => $request->name,
            'title' => $request->title,
            'url' => $request->url,
            'guard_name' => $request->guard_name,
            'pid' => $request->pid,
            'is_nav' => empty($request->is_nav)? '1':'2',
        ]);
        session()->flash('success','添加权限成功');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "aaa";
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
