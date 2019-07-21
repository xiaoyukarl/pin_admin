
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">

            @if(session()->has('permission'))
                @foreach($modules as $module)
                    <li>
                        <a href="javascript:;">
                            <cite>{{$module['modName']}} </cite>
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            @foreach($module['sub'] as $sub)
                                @if(isset($permissions[$sub['modUrl']]))
                                    <li>
                                        <a onclick="xadmin.add_tab('{{$sub['modName']}}','{{route('back.'.$sub['modUrl'].'.index')}}')" target="">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>{{$sub['modName']}}</cite>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
</div>
<!-- 左侧菜单结束 -->