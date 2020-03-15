@extends('layouts.master')
@section('content')
    @component('components.tabs',['title'=>'管理员管理'])
        @slot('nav')
            <li class="nav-item">
                <a href="/admin/admins" class="nav-link active">
                    <span class="d-none d-lg-block">管理员列表</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/admins/create" class="nav-link">
                    <span class="d-none d-lg-block">管理员添加</span>
                </a>
            </li>
        @endslot

        @slot('body')
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <form action="" method="get">
                            <div class="form-group form-inline">
                                <label class="col-xl-2">管理员姓名</label>
                                <input class="form-control col-xl-6" type="text" name="name" value="{{request()->get('name')}}">
                                <button type="submit" class="btn btn-warning btn-sm ml-2 col-xl-1">搜索</button>
                            </div>
                        </form>    
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>姓名</th>
                                    <th>邮件</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($admins as $admin)
                            <tr>
                                <td>{{ $admin['id']  }}</td>
                                <td>{{ $admin['name']  }}</td>
                                <td>{{ $admin['email']  }}</td>
                                <td class="table-action">
                                    <a href="" class="btn btn-danger btn-sm">编辑</a>
                                    <a href="" class="btn btn-info btn-sm">删除</a>
                                </td>
                            </tr>
                            @empty
                                <li>没有纪录</li>
                            @endforelse
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
                <div class="card-footer">
                    {{ $admins->appends(request()->except(['page']))->links() }}
                </div>
            </div>

        @endslot

    @endcomponent
@endsection
