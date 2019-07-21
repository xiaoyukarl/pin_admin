<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-17
 * Time: 23:19
 */

namespace App\Http\Controllers\Back;


use App\Http\Requests\Back\LoginRequest;
use App\Models\AdminModel;
use App\Services\AdminService;

class securityController
{

    public function showLoginForm()
    {
        return view('admin.security.login');
    }

    public function login(LoginRequest $request)
    {
        (new AdminService)->login($request->post());
        return redirect()->route('back.index.index');
    }

    public function logout()
    {
        if( session()->has('admin')){
            session()->forget('admin');
        }
        if(session()->has('permission')){
            session()->forget('permission');
        }
        return redirect()->route('back.login.show');
    }

}