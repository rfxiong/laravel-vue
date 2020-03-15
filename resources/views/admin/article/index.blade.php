@extends('layouts.master')
@section('content')
    @component('components.tabs',['title'=>'文章管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/articles" class="nav-link active">
                    <span class="d-none d-lg-block">文章列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/articles/create" class="nav-link">
                    <span class="d-none d-lg-block">文章添加</span>
                </a>
            </li>
        @endslot

        @slot('body')
            <div class="table-responsive mt-2">
                <table class="table table-centered table-hover mb-0">
                    <tbody>
                        <tr>
                            <th style="width:8%">序号</th>
                            <th style="width:10%">标题</th>
                            <th style="width:8%">作者</th>
                            <th style="width:20%">内容</th>
                            <th style="width:10%">缩略图</th>
                            <th style="width:8%">点击</th>
                            <th style="width:8%">推荐</th>
                            <th style="width:20%">创建时间</th>
                            <th style="width:20%">操作</th>
                        </tr>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article['id']}}</td>
                                <td>{{$article['title']}}</td>
                                <td>{{$article['author']}}</td>
                                <td>{{$article['content']}}</td>
                                <td>{{$article['thump']}}</td>
                                <td>{{$article['click']}}</td>
                                <td>{{$article['iscommend']}}</td>
                                <td>{{$article['created_at']}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editarticle{{$article['id']}}">编辑</button>
                                        @component('components.modal',['id'=>"editarticle{$article['id']}",'url'=>"/admin/articles/{$article['id']}", 'method'=>'PUT','title'=>"编辑{$article['title']}",'button_name'=>'保存'])
                                            <div class="form-group">
                                                <label for="password1">文章名称</label>
                                                <input class="form-control" type="text" id="name" name="name" placeholder="请输入文章名称" value="{{old('name')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>父级文章</label>
                                                <select class="form-control" id="parent" name="parent">
                                                    <option value="0">顶级菜单</option>
                                                        @foreach($articles as $article)
                                                            <option value="{{$article['id']}}">
                                                                {{$article['name']}}
                                                            </option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        @endcomponent
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deletearticle{{$article['id']}}">删除</button>
                                        @component('components.modal',['id'=>"deletearticle{$article['id']}",'url'=>"/admin/articles/{$article['id']}", 'method'=>'DELETE','title'=>"删除{$article['title']}",'button_name'=>'删除'])

                                            <div class="form-group text-center">
                                                <label for="password1">正在删除【{{$article['name']}}】文章</label>
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


