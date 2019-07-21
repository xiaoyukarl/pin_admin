
@extends("admin.layout.frame")

@section('content')
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a>
                <cite>角色管理</cite>
            </a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
        </a>
    </div>
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">
                    <a class="layui-btn" href="{{route('back.roles.create')}}">
                        <i class="layui-icon"></i>添加角色
                    </a>
                </div>
                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>角色名称</th>
                            <th>简介</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->roleId}}</td>
                                <td>{{$role->roleName}}</td>
                                <td>{{$role->roleDesc}}</td>
                                <td>{{$role->createTime}}</td>
                                <td class="td-manage">
                                    <a title="编辑" href="{{route('back.roles.edit', $role->roleId)}}" class="layui-btn layui-btn-sm">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-card-body ">
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection