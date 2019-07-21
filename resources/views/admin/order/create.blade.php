@extends('admin.layout.frame')

@section('content')

    <div class="layui-layer-title" style="cursor: move;">添加模块组</div>
    <div class="layui-row">
        {!! Form::open(['url'=>route('back.order.store'), 'method'=>'POST' ,'class' => 'layui-form']) !!}

        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>标题
            </label>
            <div class="layui-input-inline">
                <input type="text" name="title" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="sort" class="layui-form-label">
                <span class="x-red">*</span>类型
            </label>
            <div class="layui-input-inline">
                {!! $typeSelect !!}
            </div>
        </div>


        <div class="layui-form-item">
            <label for="sort" class="layui-form-label">
                <span class="x-red">*</span>出发城市
            </label>
            <div class="layui-input-inline">
                {!! $starCitySelect !!}
            </div>
        </div>

        <div class="layui-form-item">
            <label for="sort" class="layui-form-label">
                <span class="x-red">*</span>到达城市
            </label>
            <div class="layui-input-inline">
                {!! $destCitySelect !!}
            </div>
        </div>

        <div class="layui-form-item">
            <label for="sort" class="layui-form-label">
                <span class="x-red">*</span>出发时间
            </label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="departureTime" readonly required lay-verify="required" autocomplete="off" id="departureTime">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>手机号
            </label>
            <div class="layui-input-inline">
                <input type="text" name="telephone" required="" lay-verify="required|phone" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>内容描述
            </label>
            <div class="layui-input-inline">
                <textarea placeholder="请输入内容" name="content" required lay-verify="required" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" lay-filter="add" lay-submit="">提交</button>
            <button  class="layui-btn" onclick="window.history.back()">返回</button>
        </div>
        {!! Form::close() !!}
    </div>

    <script>
        layui.use('laydate', function(){
            var laydate = layui.laydate;
            //执行一个laydate实例
            laydate.render({
                elem: '#departureTime', //指定元素
                type: 'date'
            });
        });
    </script>
@endsection