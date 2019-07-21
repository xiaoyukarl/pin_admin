@extends('admin.layout.frame')

@section('content')

    <div class="layui-layer-title" style="cursor: move;">添加角色</div>
    <div class="layui-row">
        {!! Form::open(['url'=>route('back.roles.store'), 'method'=>'POST' ,'class' => 'layui-form']) !!}

        <div class="layui-form-item">
            <label class="layui-form-label">
                <span class="x-red">*</span>名称
            </label>
            <div class="layui-input-inline">
                <input type="text" name="roleName" required="" lay-verify="required" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">
                简介
            </label>
            <div class="layui-input-inline">
                <input type="text" name="roleDesc" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">
                简介
            </label>
            <div class="layui-input-inline">
                <table width="100%" border="0" class="layui-table layui-form">
                    <tr class="table_title">
                        <td style="min-width: 150px;" align="center">组名</td>
                        <td style="min-width: 400px;" align="left">权限</td>
                    </tr>
                    {!! $arrMv !!}
                </table>
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