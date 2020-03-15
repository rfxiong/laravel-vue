@extends('layouts.master')
@section('content')
	@component('components.tabs',['title'=>'权限管理'])
        @slot('nav')
			<li class="nav-item">
                <a href="/admin/permissions" class="nav-link active">
                    <span class="d-none d-lg-block">权限列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/permissions" class="nav-link" data-toggle="modal" data-target="#addPermission">
                    <span class="d-none d-lg-block">权限添加</span>
                </a>
                @component('components.modal',['id'=>'addPermission','title'=>'添加权限','url'=>'/admin/permissions','button_name'=>'保存'])
			        <div class="form-group">
		                <label for="">权限描述</label>
		                <input class="form-control" type="text" id="title" name="title"  placeholder="请编辑中文权限描述" value="{{old('title')}}">
		            </div>
		            <div class="form-group">
		                <label for="name">权限名称</label>
		                <input class="form-control" type="text" id="name" name="name" placeholder="请编辑英文权限名称" value="{{old('name')}}">
		            </div>
		            <div class="form-group">
		                <label for="url">URI</label>
		                <input class="form-control" type="text" id="url" name="url" placeholder="请编辑url" value="{{old('url')}}">
		            </div>
		            <div class="form-group d-none">
		                <label for="guard_name">门卫</label>
		                <input class="form-control" type="text" id="guard_name" name="guard_name" value="admin">
		            </div>
		            <div class="form-group">
		                <label for="pid">父级权限</label>
		                <input class="form-control" type="text" id="pid" name="pid" placeholder="请编辑父级权限" value="{{old('pid')}}">
		            </div>
		            <div class="form-group">
		            	<div class="custom-control custom-checkbox">
	                        <input type="checkbox" class="custom-control-input" id="is_nav" name="is_nav" value="{{old('is_nav')}}" checked="">
	                        <label class="custom-control-label" for="is_nav">作为菜单</label>
	                    </div>
		            </div>
			    @endcomponent
            </li>
        @endslot

        @slot('body')
			<div class="table-responsive-sm">
            <table class="table table-centered mb-0">
                <thead>
                    <tr>
                        <th class="w-5">序号</th>
                        <th>权限名称</th>
                        <th>URI</th>
                        <th>父级权限</th>
                        <th>菜单项</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->title}}</td>
                        <td>{{$permission->url}}</td>
						<td>
							@if($permission->menu)
								{{$permission->menu}}
							@else
								<span class="badge badge-success">顶级权限</span>
							@endif
						</td>
                        <td>{{$permission->is_nav}}</td>
                        <td>{{$permission->updated_at}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editPermission{{$permission->id}}">编辑</button>
                                <button type="button" class="btn btn-secondary btn-sm mr-1">删除</button>
                            </div>
                            @component('components.modal',['id'=>"editPermission{$permission->id}",'url'=>"/admin/permissions/{$permission->id}", 'method'=>'PUT','title'=>"编辑{$permission->title}",'button_name'=>'保存'])
						        <div class="form-group">
					                <label for="">权限描述</label>
					                <input class="form-control" type="text" id="title" name="title"  placeholder="请编辑中文权限描述" value="{{$permission->title}}">
					            </div>

					            <div class="form-group">
					                <label for="name">权限名称</label>
					                <input class="form-control" type="text" id="name" name="name" placeholder="请编辑英文权限名称" value="{{$permission->name}}">
					            </div>
					            <div class="form-group">
					                <label for="url">URI</label>
					                <input class="form-control" type="text" id="url" name="url" placeholder="请编辑url" value="{{$permission->url}}">
					            </div>
					            <div class="form-group d-none">
					                <label for="guard_name">门卫</label>
					                <input class="form-control" type="text" id="guard_name" name="guard_name" value="admin">
					            </div>
					            <div class="form-group">
					                <label for="pid">父级权限</label>
					                <input class="form-control" type="text" id="pid" name="pid" placeholder="请编辑父级权限" value="{{$permission->pid}}">
					            </div>
					            <div class="custom-control custom-checkbox">
			                        <input type="checkbox" enabled class="custom-control-input" id="is_nav" name="is_nav" class="custom-control-input" value="{{$permission->is_nav}}" @if($permission->is_nav == '1') checked="checked" @endif>
			                        <label class="custom-control-label" for="is_nav">作为菜单</label>
			                    </div>
						    @endcomponent
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
        @endslot
    @endcomponent

@endsection