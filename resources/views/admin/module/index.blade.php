
@extends("admin.layout.frame")
@section('title')
    模块管理
@endsection

@section('content')
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a>
                <cite>模块管理</cite>
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
                    <a class="layui-btn" href="{{route('back.module.create')}}">
                        <i class="layui-icon"></i>添加模块组
                    </a>
                </div>
                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th>排序</th>
                            <th>名称</th>
                            <th>链接地址</th>
                            <th>超级管理员权限</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            {!! $moduleList !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection