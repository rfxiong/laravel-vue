@extends('layouts.master')
@section('content')
	@component('components.tabs',['title'=>'文章管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/articles" class="nav-link">
                    <span class="d-none d-lg-block">文章列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/articles/create" class="nav-link active">
                    <span class="d-none d-lg-block">文章添加</span>
                </a>
            </li>
        @endslot

        @slot('body')
			<form action="/admin/categories" method="post">
				@csrf
				<div class="card">
				    <div class="card-body">
				        	<div class="form-group mb-3">
						        <label for="simpleinput">文章标题</label>
						        <input type="text" id="title" name="title" class="form-control">
						    </div>
						    <div class="form-group mb-3">
						        <label for="simpleinput">作者</label>
						        <input type="text" id="author" name="author" class="form-control">
						    </div>
						    <div class="form-group mb-3">
						        <label for="simpleinput">文章内容</label>
						        <input type="text" id="author" name="author" class="form-control">
						    </div>
						    <div class="form-group mb-3">
						    	<form action="">
						    		<button type="button" class="btn btn-outline-success">上传</button>
							        <label for="simpleinput">缩略图</label>
							        <img class="card-img-top" src="assets/images/small/small-1.jpg" alt="Card image cap">
						    	</form>
							<div class="form-group mt-3 mb-3">
						        <label for="simpleinput">查看次数</label>
						        <input type="text" id="simpleinput" class="form-control">
						    </div>
						    <div class="custom-control custom-switch">
						        <input type="checkbox" class="custom-control-input" id="customSwitch1">
						        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
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