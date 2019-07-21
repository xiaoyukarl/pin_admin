@extends("admin.layout.frame")

@section('content')
    <div class="layui-row">
        {!! Form::open(['url'=>route('back.city.store'), 'class' => 'layui-form']) !!}

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>城市名</label>
            <div class="layui-input-inline">
                <input type="text" id="username" name="cityName" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" lay-filter="add" lay-submit="">提交</button>
        </div>

        {!! Form::close() !!}
    </div>
@endsection