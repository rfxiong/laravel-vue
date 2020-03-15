@extends('layouts.master')
@section('content')
    @component('components.tabs',['title'=>'栏目管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/categories" class="nav-link active">
                    <span class="d-none d-lg-block">栏目列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/categories" class="nav-link" data-toggle="modal" data-target="#addCategory">
                    <span class="d-none d-lg-block">栏目添加</span>
                </a>
                @component('components.modal',['id'=>'addCategory','title'=>'添加栏目','url'=>'/admin/categories','button_name'=>'保存'])
                    <div class="form-group">
                        <label for="password1">栏目名称</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="请输入栏目名称" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>父级栏目</label>
                        <select class="form-control" id="parent" name="parent">
                            <option value="0">顶级菜单</option>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                @endcomponent
            </li>
        @endslot

        @slot('body')
            <div class="table-responsive mt-2">
        <table class="table table-centered table-hover mb-0">
            <tbody>
                <tr>
                    <th style="width:10%">序号</th>
                    <th style="width:20%">栏目名称</th>
                    <th style="width:25%">创建时间</th>
                    <th style="width:25%">操作</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category['id']}}</td>
                        <td>
                            @if($category['parent'] == 0)
                                <span style="font-weight:bold;">{{$category['name']}}</span>
                            @else
                                {{$category['name']}}
                            @endif
                        </td>
                        <td>{{$category['created_at']}}</td>
                        <td>
                            <div class="btn-group">
                                <a type="submit" href="/admin/categories/{{$category['id']}}/edit" class="btn btn-info btn-sm" >编辑</a>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deleteCategory{{$category['id']}}">删除</button>
                                @component('components.modal',['id'=>"deleteCategory{$category['id']}",'url'=>"/admin/categories/{$category['id']}", 'method'=>'DELETE','title'=>"删除{$category['title']}",'button_name'=>'删除'])

                                    <div class="form-group text-center">
                                        <label for="password1">正在删除【{{$category['name']}}】栏目</label>
                                    </div>
                                    <div class="form-group text-center">
                                        <label class="btn btn-warning mt-2">你确定吗？</label>
                                    </div>

                                @endcomponent
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end table-responsive-->
        @endslot
    @endcomponent
@endsection


