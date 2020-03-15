@extends('layouts.master')
@section('content')
	@component('components.tabs',['title'=>'分类管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/categories" class="nav-link">
                    <span class="d-none d-lg-block">分类列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <span class="d-none d-lg-block">分类编辑</span>
                </a>
            </li>
        @endslot

        @slot('body')
			<form action="/admin/categories/{{$category['id']}}" method="post">
				@csrf @method('PUT')
				<div class="card">
				    <div class="card-body">
				        	<div class="form-group mb-3">
						        <label for="simpleinput">分类标题</label>
                            <input type="text" name="name" value="{{$category['name']}}" class="form-control">
						    </div>
                            <div class="form-group">
                                <label>父级栏目</label>
                                <select class="form-control" id="parent" name="parent">
                                    <option value="0">顶级菜单</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}">
                                                {{$category['name']}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>

				    </div> <!-- end card-body-->
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success btn-sm">确定</button>
				</div>
			</form>
        @endslot
    @endcomponent
@endsection