
@extends("admin.layout.frame")

@section('content')
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a>
                <cite>模块权限</cite>
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
                    <a class="layui-btn" href="{{route('back.module_value.create', ['mId' => $mId])}}">
                        <i class="layui-icon"></i>添加{{$module->modName}}模块权限
                    </a>
                    <a  class="layui-btn" href="{{route('back.module.index')}}">返回</a>
                </div>
                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th>排序</th>
                            <th>名称</th>
                            <th>链接</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($values as $value)
                            <tr>
                                <td>{{$value->sort}}</td>
                                <td>{{$value->vName}}</td>
                                <td>{{$value->vEnName}}</td>
                                <td class="td-manage">
                                    <a title="编辑" href="{{route('back.module_value.edit', $value->vId)}}" class="layui-btn layui-btn-sm">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a href="{{route('back.module_value.delete', $value->vId)}}" onclick="return commonModel.delete()" class="layui-btn layui-btn-sm layui-btn-danger">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
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