@extends("admin.layout.frame")

@section('content')
    <div class="layui-row">
        {!! Form::open(['url'=>route('back.admin.store'), 'class' => 'layui-form']) !!}

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>用户名</label>
            <div class="layui-input-inline">
                <input type="text" id="username" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">4到16个字符</div>
        </div>
        <div class="layui-form-item">
            <label for="password" class="layui-form-label">
                <span class="x-red">*</span>密码</label>
            <div class="layui-input-inline">
                <input type="password" id="password" name="password" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">6到24个字符</div>
        </div>

        <div class="layui-form-item">
            <label for="password" class="layui-form-label">
                <span class="x-red">*</span>角色
            </label>
            {!! $rolesHtml !!}
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" lay-filter="add" lay-submit="">提交</button>
        </div>

        {!! Form::close() !!}
    </div>
@endsection