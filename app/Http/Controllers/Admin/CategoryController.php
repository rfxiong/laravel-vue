<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Cache;

class CategoryController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Redis::exists($listKey)) {
        //     $list = Redis::lrange($listKey,0,-1);
        // }else {
        //     # code...
        // }
        $categories = (new Category())->tree();
        // foreach ($categories as $key => $value) {
        //     Redis::lpush("list:catetory",$value);
        // }
        $data = Cache::remember('category', 10, function () {
            Category::find(1)->first();
        });
        // Cache::put('age', 11, 10);
        // dd(Cache::get('age', '18'));
        dd($data);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only(['name','parent']);
        Category::create($data);
        return back()->with('success','栏目创建成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        // Category::
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('parent',0)->get();
        return view('admin.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->only(['name','parent']);
        Category::whereId($category['id'])->update($data);
        return redirect()->route('categories.index')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
