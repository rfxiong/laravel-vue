@extends('layouts.master')
@section('content')
    @component('components.tabs',['title'=>'课程管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/lessons" class="nav-link active">
                    <span class="d-none d-lg-block">课程列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/lessons/create" class="nav-link">
                    <span class="d-none d-lg-block">课程添加</span>
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
                            <th style="width:8%">简介</th>
                            <th style="width:8%">预览</th>
                            <th style="width:8%">热门</th>
                            <th style="width:8%">点击</th>
                            <th style="width:8%">推荐</th>
                            <th style="width:8%">视频</th>
                            <th style="width:15%">创建时间</th>
                            <th style="width:25%">操作</th>
                        </tr>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{$lesson['id']}}</td>
                                <td>{{$lesson['title']}}</td>
                                <td>{{$lesson['introduce']}}</td>
                                <td>{{$lesson['preview']}}</td>
                                <td>{{$lesson['ishot']}}</td>
                                <td>{{$lesson['click']}}</td>
                                <td>{{$lesson['iscommend']}}</td>
                                <td>{{$lesson->videos->count()}}</td>
                                <td>{{$lesson['created_at']}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editlesson{{$lesson['id']}}">编辑</button>
                                        @component('components.modal',['id'=>"editlesson{$lesson['id']}",'url'=>"/admin/lessons/{$lesson['id']}", 'method'=>'PUT','title'=>"编辑{$lesson['title']}",'button_name'=>'保存'])
                                            <div class="form-group">
                                                <label for="password1">课程名称</label>
                                                <input class="form-control" type="text" id="name" name="name" placeholder="请输入课程名称" value="{{old('name')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>父级课程</label>
                                                <select class="form-control" id="parent" name="parent">
                                                    <option value="0">顶级菜单</option>
                                                        @foreach($lessons as $lesson)
                                                            <option value="{{$lesson['id']}}">
                                                                {{$lesson['name']}}
                                                            </option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        @endcomponent
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deletelesson{{$lesson['id']}}">删除</button>
                                        @component('components.modal',['id'=>"deletelesson{$lesson['id']}",'url'=>"/admin/lessons/{$lesson['id']}", 'method'=>'DELETE','title'=>"删除{$lesson['title']}",'button_name'=>'删除'])

                                            <div class="form-group text-center">
                                                <label for="password1">正在删除【{{$lesson['name']}}】课程</label>
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


