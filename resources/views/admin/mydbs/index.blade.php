@extends('layouts.master')
@section('content')
    @component('components.tabs',['title'=>'商品管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/mydbs" class="nav-link active">
                    <span class="d-none d-lg-block">商品列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/mydbs" class="nav-link" data-toggle="modal" data-target="#addMydbs">
                    <span class="d-none d-lg-block">商品添加</span>
                </a>
                @component('components.modal',['id'=>'addMydbs','title'=>'添加商品','url'=>'/admin/mydbs','button_name'=>'保存'])
                    <div class="form-group">
                        <label >商品名称</label>
                        <input class="form-control" type="text" name="goods_name" placeholder="请输入商品名称" value="{{old('goods_name')}}">
                    </div>
                    <div class="form-group">
                        <label >数量（吨）</label>
                        <input class="form-control" type="text" name="amount" placeholder="请输入商品数量" value="{{old('amount')}}">
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
                            <th style="width:20%">商品名称</th>
                            <th style="width:20%">数量(吨)</th>
                            <th style="width:30%">创建时间</th>
                            <th style="width:20%">操作</th>
                        </tr>
                        @foreach($goods as $good)
                            <tr>
                                <td>{{$good['id']}}</td>
                                <td>{{$good['goods_name']}}</td>
                                <td>{{$good['amount']}}</td>
                                <td>{{$good['created_at']}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editgood{{$good['id']}}">编辑</button>
                                        @component('components.modal',['id'=>"editgood{$good['id']}",'url'=>"/admin/mydbs/{$good['id']}", 'method'=>'PUT','title'=>"编辑{$good['title']}",'button_name'=>'保存'])
                                            <div class="form-group">
                                                <label for="password1">商品名称</label>
                                                <input class="form-control" type="text" name="goods_name" placeholder="请输入商品名称" value="{{$good['goods_name']}}">
                                            </div>
                                            <div class="form-group">
						                        <label >数量（吨）</label>
						                        <input class="form-control" type="text" name="amount" placeholder="请输入商品数量" value="{{$good['amount']}}">
						                    </div>
                                        @endcomponent
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deletegood{{$good['id']}}">删除</button>
                                        @component('components.modal',['id'=>"deletegood{$good['id']}",'url'=>"/admin/mydbs/{$good['id']}", 'method'=>'DELETE','title'=>"删除{$good['title']}",'button_name'=>'删除'])

                                            <div class="form-group text-center">
                                                <label for="password1">正在删除【{{$good['goods_name']}}】商品</label>
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


