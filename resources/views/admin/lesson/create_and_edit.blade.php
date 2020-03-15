@extends('layouts.master')
@section('content')
	@component('components.tabs',['title'=>'课程管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/lessons" class="nav-link">
                    <span class="d-none d-lg-block">课程列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/lessons/create" class="nav-link active">
                    <span class="d-none d-lg-block">课程添加</span>
                </a>
            </li>
        @endslot

        @slot('body')
			<form action="/admin/lessons" method="post">
				@csrf
				<div class="card">
					<div class="card-body">
						<div class="card-header">
							<h4>课程管理</h4>
						</div>
					    <div class="card-body">
					        	<div class="form-group mb-3">
							        <label class=" control-panel">课程</label>
						        	<input type="text" name="title" class="form-control">        
							    </div>
							    <div class="form-group mb-3">
							        <label for="example-textarea">课程简介</label>
							        <textarea class="form-control" id="example-textarea" name="introduce" rows="5">no blank</textarea>
							    </div>
							    <div class="form-group mb-3">
									<label class=" control-panel">预览</label>
						        	<input type="text" name="preview" value="/assets/avatar.jpg" class="form-control">
						        	<img src="/assets/avatar.jpg" alt="avatar" class="col-sm-2">
						        </div>
							    <div class="form-group mb-3">
							    	<label for="simpleinput">热门课</label>
							        <input type="number" name="ishot" class="form-control">
								<div class="form-group mt-3 mb-3">
							        <label for="simpleinput">查看次数</label>
							        <input type="number" name="click" class="form-control">
							    </div>
							    <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="iscommend" value="0">
                                    <label class="custom-control-label" for="customSwitch1">推荐</label>
                                </div>
					    </div> <!-- end card-body-->
					</div>
				</div>

				<div class="card mt-3" id="app">
					<div class="card-body">
						<div class="card-header">
							<h4>视频管理</h4>
						</div>
					    <div class="card-body" v-for="(v,k) in videos">
					        	<div class="form-group mb-1">
							        <label class="col-sm-2 control-panel">视频标题</label>
							        <div class="col-sm-10">
							        	<input type="text" class="form-control" v-model="v.title">        	
							        </div>
							    </div>
							    <div class="col-sm-10">
							    	<label class="col-sm-2 control-panel">视频地址</label>
						        	<input type="text" class="form-control" v-model="v.path">        	
						        </div>
						        <div class="col-sm-10">
						        	<button class="btn btn-danger btn-sm mt-3" @click.prevent="del(k)">删除视频</button>
						        </div>
					    </div> <!-- end card-body-->
					    <button type="submit" class="btn btn-success btn-sm" @click.prevent="add">添加视频</button>
				    </div>
				    <textarea name="videos">@{{videos}}</textarea>
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
		var vue = new Vue({
			el: '#app',
			data: {
				videos: [{title: 'aaaw', path: 'bbb'}],
			},
			methods: {
				add: function(){
					this.videos.push({title: '', path: ''});
				},
				del: function(k){
					this.videos.splice(k,1);
				}
			}
		});
	</script>
@endsection