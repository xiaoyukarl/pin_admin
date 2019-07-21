<!doctype html>
<html  class="x-admin-sm">
@section('title')
    登录
@endsection
@include('admin.layout.head')
<link rel="stylesheet" href="{{asset('admin/css/login.css')}}">

<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">{{env('APP_NAME')}}-管理登录</div>
    <div id="darkbannerwrap"></div>

    {!! Form::open(["url"=>route('back.login.show'), "method" => 'POST']) !!}
        <input name="name" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" placeholder="密码" type="password" lay-verify="required" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    {!! Form::close() !!}
</div>

<?php
$errorStr = '';
if (count($errors) > 0){
    foreach ($errors->all() as $error){
        $errorStr .= $error;
    }
}
?>
<script>
    var error = "{{$errorStr}}";
    $(function(){
        if(error != ''){
            layui.use(['form','element'],function(){
                layer = layui.layer;
                layer.alert(error, function(index){
                    layer.close(index);
                });
            })
        }
    });
</script>
<!-- 底部结束 -->
</body>
</html>