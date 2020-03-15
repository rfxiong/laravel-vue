<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Mydb;
use Illuminate\Http\Request;
use App\Http\Requests\MydbRequest;

class MydbController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MydbRequest $request,Mydb $mydb)
    {
        $goods = Mydb::paginate(15);
        return view('admin.mydbs.index',compact('goods','mydb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MydbRequest $request)
    {
        Mydb::create($request->all());
        session()->flash('success','商品添加成功');
        return redirect()->route('mydbs.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Mydb  $mydb
     * @return \Illuminate\Http\Response
     */
    public function update(MydbRequest $request, Mydb $mydb)
    {
        Mydb::where('id',$mydb->id)->update($request->except(['_token','_method']));
        session()->flash('success','商品修改成功');
        return redirect()->route('mydbs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Mydb  $mydb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mydb $mydb)
    {
        Mydb::destroy($mydb->id);
        session()->flash('success','商品删除成功');
        return redirect()->route('mydbs.index');
    }

    
}
