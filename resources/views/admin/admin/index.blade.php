
@extends("admin.layout.frame")

@section('content')
    <div class="x-nav">
            <span class="layui-breadcrumb">
                <a>
                    <cite>管理员列表</cite>
                </a>
            </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
        </a>
    </div>
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-body ">
                    {!! Form::open(['class' => 'layui-form layui-col-space5', 'method' => 'GET']) !!}
                        <div class="layui-input-inline layui-show-xs-block">
                            <input type="text" value="{{$request->get('name')}}" name="name" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                        {!! $rolesHtml !!}
                        <div class="layui-input-inline layui-show-xs-block">
                            <button class="layui-btn" lay-submit="" lay-filter="sreach">
                                <i class="layui-icon">&#xe615;</i>
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="layui-card-header">
                    <button class="layui-btn" onclick="xadmin.open('添加用户','{{route('back.admin.create')}}',800,600)">
                        <i class="layui-icon"></i>添加
                    </button>
                </div>
                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>角色</th>
                            <th>名称</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->roleName}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->createTime}}</td>
                                <td class="td-manage">
                                    <a title="编辑" href="{{route('back.admin.edit', $admin->id)}}" class="layui-btn layui-btn-sm">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-card-body ">
                    {{$admins->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection