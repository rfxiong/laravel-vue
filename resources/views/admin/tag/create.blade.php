@extends('layouts.master')
@section('content')
	@component('components.tabs',['title'=>'标签管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/tags" class="nav-link">
                    <span class="d-none d-lg-block">标签列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/tags/create" class="nav-link active">
                    <span class="d-none d-lg-block">标签添加</span>
                </a>
            </li>
        @endslot

        @slot('body')
			<form action="/admin/tags" method="post">
				@csrf
				<div class="card">
					<div class="card-body">
						<div class="card-header">
							<h4>标签管理</h4>
						</div>
					    <div class="card-body">
					        	<div class="form-group mb-3">
							        <label class=" control-panel">标签</label>
						        	<input type="text" name="name" class="form-control">        
							    </div>
					    </div> <!-- end card-body-->
					</div>
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-primary btn-sm">保存</button>
				</div>
			</form>
        @endslot
    @endcomponent
@endsection
@section('script')
	<script>

	</script>
@endsection