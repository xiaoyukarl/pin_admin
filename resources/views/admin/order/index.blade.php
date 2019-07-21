
@extends("admin.layout.frame")

@section('tiele')
    拼车管理
@endsection

@section('content')
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a>
                <cite>拼车管理</cite>
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
                    <button class="layui-btn" onclick="xadmin.open('发布拼车','{{route('back.order.create')}}',800,600)">
                        <i class="layui-icon"></i>发布拼车
                    </button>
                </div>

                <div class="layui-card-body ">
                    {!! Form::open(['class' => 'layui-form layui-col-space5', 'method' => 'GET']) !!}
                    <div class="layui-input-inline layui-show-xs-block">
                        <input type="text" value="{{$request->get('username')}}" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    {!! $starCitySelect !!}
                    {!! $destCitySelect !!}
                    {!! $typeSelect !!}
                    {!! $enableSelect !!}
                    <div class="layui-input-inline layui-show-xs-block">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach">
                            <i class="layui-icon">&#xe615;</i>
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="layui-card-body ">
                    <table class="layui-table layui-form">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>图片</th>
                            <th>发布人</th>
                            <th>标题</th>
                            <th width="100px;">出发 -> 到达</th>
                            <th>出发时间</th>
                            <th>联系方式</th>
                            <th>内容</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->id}}

                                </td>
                                <td>
                                    @if(!empty($order->imgUrl))
                                        <a href="{{$order->imgUrl}}" target="_blank">
                                            <img src="{{$order->imgUrl}}" style="width: 50px;height: 50px;">
                                        </a>
                                    @endif
                                </td>
                                <td>{{$order->username}}</td>
                                <td>
                                    @if($order->enable == 1)
                                        <span class="layui-badge layui-bg-blue">显示</span>
                                    @else
                                        <span class="layui-badge layui-bg-gray">禁止</span>
                                    @endif
                                    <span class="layui-badge layui-bg-cyan layuiadmin-badge">
                                        {{$order->type==1?"找车":"找人"}}
                                    </span>
                                    {{$order->title}}
                                </td>
                                <td>{{$order->starCity}} -> {{$order->destCity}}</td>
                                <td>{{$order->departureTime}}</td>
                                <td>{{$order->telephone}}</td>
                                <td>{{$order->content}}</td>
                                <td>{{$order->createTime}}</td>
                                <td class="td-manage">
                                    <a title="编辑" href="{{route('back.order.enable', $order->id)}}" onclick="return commonModel.confirm('是否禁止')" class="layui-btn layui-btn-sm layui-btn-danger">
                                        <i class="layui-icon">&#x1006;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="layui-card-body ">
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection