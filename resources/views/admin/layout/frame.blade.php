<!DOCTYPE html>
<html class="x-admin-sm">
    @include('admin.layout.head')
<body>
    <div class="layui-fluid">

        @yield('content')

        <script>
            layui.use(['laydate', 'form'],
                function() {
                    var laydate = layui.laydate;

                    //执行一个laydate实例
                    laydate.render({
                        elem: '#start' //指定元素
                    });

                    //执行一个laydate实例
                    laydate.render({
                        elem: '#end' //指定元素
                    });
                });

        </script>
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
    </div>
</body>
</html>