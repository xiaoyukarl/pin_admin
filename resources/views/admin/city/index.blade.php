
@extends("admin.layout.frame")

@section('content')
    <div class="x-nav">
            <span class="layui-breadcrumb">
                <a>
                    <cite>城市列表</cite>
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
                    <button class="layui-btn" onclick="xadmin.open('添加城市','{{route('back.city.create')}}',800,600)">
                        <i class="layui-icon"></i>添加城市
                    </button>
                </div>
                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>城市</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{$city->id}}</td>
                                <td>{{$city->cityName}}</td>
                                <td>{{$city->createTime}}</td>
                                <td class="td-manage">
                                    <button title="编辑" onclick="xadmin.open('修改城市','{{route('back.city.edit', $city->id)}}',800,600)"  class="layui-btn layui-btn-sm">
                                        <i class="layui-icon">&#xe642;</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection