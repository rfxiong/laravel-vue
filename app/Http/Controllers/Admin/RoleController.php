<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Redirect;

class RoleController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        Role::create($data);
        Session()->flash('success','角色添加成功');
        return Redirect::back(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();
        Role::where('id',$role->id)->update($data);
        Session()->flash('success','角色修改成功');
        return Redirect::back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        dd($role);
    }

    public function permission($id)
    {
        $role = Role::find($id);
        $permissions =[];   //定义空数组，用于存放生成的三维数组
        //获取顶级（PID=0）菜单或权限--顶级菜单
        $parents = Permission::where('pid','0')->get()->toArray(); 
        foreach ($parents as $key => $parent) {
            $permissions[$key] = $parent;
            $temp = [];
            //逐个获取顶级（PID=0）菜单或权限的子菜单或子权限--二级菜单
            $childs = Permission::where('pid',$parent['id'])->get()->toArray();
            foreach ($childs as $k => $child) {
                $temp[] = $child;
            }
            $permissions[$key]['menu'] = $temp;
        }
        //dd($permissions);
        return view('admin.role.permission',compact('role','permissions'));
    }

    public function permissionStore(Request $request,$id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->name);  //同步数据库权限函数
        session()->flash('success','权限分配已完成');
        return back();
    }
}
