@extends('layouts.master')
@section('content')
    @component('components.tabs',['title'=>'标签管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/tags" class="nav-link active">
                    <span class="d-none d-lg-block">标签列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/tags/create" class="nav-link">
                    <span class="d-none d-lg-block">标签添加</span>
                </a>
            </li>
        @endslot

        @slot('body')
            <div class="table-responsive mt-2">
                <table class="table table-centered table-hover mb-0">
                    <tbody>
                        <tr>
                            <th style="width:8%">序号</th>
                            <th style="width:10%">标签名称</th>
                            <th style="width:20%">创建时间</th>
                            <th style="width:20%">操作</th>
                        </tr>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag['id']}}</td>
                                <td>{{$tag['name']}}</td>
                                <td>{{$tag['created_at']}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a type="submit" href="/admin/tags/{{$tag['id']}}/edit" class="btn btn-info btn-sm" >编辑</a>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deletetag{{$tag['id']}}">删除</button>
                                        @component('components.modal',['id'=>"deletetag{$tag['id']}",'url'=>"/admin/tags/{$tag['id']}", 'method'=>'DELETE','title'=>"删除{$tag['title']}",'button_name'=>'删除'])

                                            <div class="form-group text-center">
                                                <label for="password1">正在删除【{{$tag['name']}}】标签</label>
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


