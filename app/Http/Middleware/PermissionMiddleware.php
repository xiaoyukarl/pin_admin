<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-20
 * Time: 15:19
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;

class PermissionMiddleware
{

    public function handle($request, \Closure $next, $guard = null)
    {
        if(!session()->has('admin')){
            return redirect()->route('back.login.show');
        }
        if(!session()->has('permission') || empty(session()->get('permission'))){
            return redirect()->route('back.login.show')->withErrors([
                '请重新登录,并确认账号是否有权限'
            ]);
        }
        $this->check($request);


        return $next($request);
    }

    protected function check(Request $request)
    {
        //特殊不需要判断权限
        if($request->is('back/index') || $request->is('back/index/env')){
            return true;
        }
        $permission = json_decode(session()->get('permission'), true);
        $controller = $request->segment(2);
        if($request->method() == 'PUT'){
            $action = 'edit';
        }elseif(is_numeric($request->segment(3))){
            $action = $request->segment(4);
        }elseif(empty($request->segment(3))){
            $action = 'index';
        }else{
            $action = $request->segment(3);
        }
//        dd($request->url(),$action,$controller,$request->segments());
        if(!array_key_exists($controller, $permission)){
            abort(401, '无权限');
        }
        if(!key_exists($action, $permission[$controller])){
            abort(401, '无权限');
        }
        return true;
    }

}