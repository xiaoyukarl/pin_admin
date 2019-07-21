@extends('admin.layout.frame')

@section('content')

    <div class="layui-layer-title" style="cursor: move;">添加{{$module->modName}}模块权限</div>
    <div class="layui-row">
        {!! Form::open(['url'=>route('back.module_value.store'), 'method'=>'POST' ,'class' => 'layui-form']) !!}

        <input type="hidden" name="mId" value="{{$mId}}">
        <div class="layui-form-item">
            <label for="vName" class="layui-form-label">
                <span class="x-red">*</span>权限名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="vName" name="vName" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="vEnName" class="layui-form-label">
                <span class="x-red">*</span>权限英文名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="vEnName" name="vEnName" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="sort" class="layui-form-label">
                <span class="x-red">*</span>排　　序
            </label>
            <div class="layui-input-inline">
                <input type="text" id="sort" name="sort" value="0" required="required" lay-verify="number" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" lay-filter="add" lay-submit="">提交</button>
            <button  class="layui-btn" onclick="window.history.back()">返回</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection