@extends('layouts.master')
@section('content')
    @component('components.tabs',['title'=>'角色管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/roles" class="nav-link active">
                    <span class="d-none d-lg-block">角色列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/roles" class="nav-link" data-toggle="modal" data-target="#addRole">
                    <span class="d-none d-lg-block">角色添加</span>
                </a>
                @component('components.modal',['id'=>'addRole','title'=>'添加角色','url'=>'/admin/roles','button_name'=>'保存'])
                    <div class="form-group">
                        <label for="">角色描述</label>
                        <input class="form-control" type="text" id="title" name="title"  placeholder="请输入中文角色描述" value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="password1">角色名称</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="请输入英文角色名称" value="{{old('name')}}">
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
                    <th style="width:20%">角色名称</th>
                    <th style="width:20%">角色描述</th>
                    <th style="width:25%">创建时间</th>
                    <th style="width:25%">操作</th>
                </tr>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role['id']}}</td>
                        <td>{{$role['name']}}</td>
                        <td>{{$role['title']}}</td>
                        <td>{{$role['created_at']}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editRole{{$role['id']}}">编辑</button>
                                @component('components.modal',['id'=>"editRole{$role['id']}",'url'=>"/admin/roles/{$role['id']}", 'method'=>'PUT','title'=>"编辑{$role['title']}",'button_name'=>'保存'])
                                    <div class="form-group">
                                        <label for="">角色描述</label>
                                        <input class="form-control" type="text" id="title" name="title"  placeholder="请编辑中文角色描述" value="{{$role['title']}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="password1">角色名称</label>
                                        <input class="form-control" type="text" id="name" name="name" placeholder="请编辑英文角色名称" value="{{$role['name']}}">
                                    </div>
                                @endcomponent
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deleteRole{{$role['id']}}">删除</button>
                                @component('components.modal',['id'=>"deleteRole{$role['id']}",'url'=>"/admin/roles/{$role['id']}", 'method'=>'DELETE','title'=>"删除{$role['title']}",'button_name'=>'删除'])

                                    <div class="form-group text-center">
                                        <label for="password1">正在删除【{{$role['title']}}】角色</label>
                                    </div>
                                    <div class="form-group text-center">
                                        <label class="btn btn-warning mt-2">你确定吗？</label>
                                    </div>

                                @endcomponent
                                <a href="/admin/roles/permission/{{$role['id']}}" class="btn btn-success btn-sm">权限</a>
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


