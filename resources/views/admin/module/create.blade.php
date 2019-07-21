@extends('admin.layout.frame')

@section('content')

    <div class="layui-layer-title" style="cursor: move;">添加模块组</div>
    <div class="layui-row">
        {!! Form::open(['url'=>route('back.module.store'), 'method'=>'POST' ,'class' => 'layui-form']) !!}
        <div class="layui-form-item">
            <label for="modName" class="layui-form-label">
                <span class="x-red">*</span>上级模块:
            </label>
            <input type="hidden" name="pId" value="{{$request->get('pId', 0)}}">
            <div class="layui-form-mid layui-word-aux">{{$parentModName}}</div>
        </div>
        <div class="layui-form-item">
            <label for="modName" class="layui-form-label">
                <span class="x-red">*</span>模块名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="modName" name="modName" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>

        @if(isset($module))

            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>模块链接
                </label>
                <div class="layui-input-inline">
                    <input type="text"  name="modUrl" required="required" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>

        @endif

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