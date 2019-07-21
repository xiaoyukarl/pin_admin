<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')--{{env('APP_NAME')}}
    </title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8" />
    <link rel="stylesheet" href="{{asset("admin/css/font.css")}}">
    <link rel="stylesheet" href="{{asset("admin/css/xadmin.css")}}">
    <script src="{{asset("lib/layui/layui.js")}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset("admin/js/xadmin.js")}}"></script>
    <script type="text/javascript" src="{{asset("admin/js/jquery.min.js")}}"></script>
</head>