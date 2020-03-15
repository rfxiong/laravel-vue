@extends('layouts.master')
@section('content')
@component('components.tabs',['title'=>'权限分配','button_name'=>'保存'])
        @slot('nav')
        	<li class="nav-item">
                <a href="/admin/roles" class="nav-link">
                    <span class="d-none d-lg-block">角色列表</span>
                </a>
            </li>
			<li class="nav-item">
                <a href="#" class="nav-link active">
                    <span class="d-none d-lg-block">权限分配</span>
                </a>
            </li>
        @endslot

        @slot('body')
			<form action="/admin/roles/permission/{{$role['id']}}" method="post">
				@csrf
				@foreach($permissions as $permission)
				<div class="card-body">
					<h4 class="header-title mt-0 mt-sm-0">{{$permission['title']}}</h4>
					@foreach($permission['menu'] as $menu)
					<div class="mt-0 float-left">
						<div class="custom-control custom-checkbox ml-3">
							<input type="checkbox" class="custom-control-input" id="customCheck{{$menu['id']}}" value="{{$menu['name']}}" name="name[]" {{$role->hasPermissionTo($menu['name'])? 'checked=""':''}}>
							<label class="custom-control-label" for="customCheck{{$menu['id']}}">{{$menu['title']}}</label>
						</div>
					</div>
					@endforeach
				</div>
				@endforeach
				<button type="submit" class="btn btn-success btn-sm mt-2">提交</button>
			</form>
        @endslot
    @endcomponent
@endsection