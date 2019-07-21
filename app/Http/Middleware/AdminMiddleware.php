<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-19
 * Time: 09:30
 */

namespace App\Http\Middleware;


class AdminMiddleware
{

    public function handle($request, \Closure $next, $guard = null)
    {
        if(!session()->has('admin')){
            return redirect()->route('back.login.show');
        }
        return $next($request);
    }
}