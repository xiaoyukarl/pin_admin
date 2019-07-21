<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-17
 * Time: 23:39
 */

namespace App\Services;


use App\Exceptions\ControllerException;
use App\Models\AdminModel;

class AdminService
{

    public function login($data)
    {
        $admin = AdminModel::getAdminByName($data['name']);
        if(!$admin){
            throw new ControllerException('账号不存在');
        }
        if($data['password'] != decrypt($admin->password)){
            throw new ControllerException('密码错误');
        }
        session()->put('admin', $admin);//保存session登录状态
        session()->put('permission', $admin->permission);//保存session登录状态
        return $admin;
    }

    /**
     * 管理员分页
     * @param $request
     * @return mixed
     */
    public function getAdminsPaginate($request)
    {
        $roleId = $request->get('roleId', false);
        $name = $request->get('name', false);

        return AdminModel::orderBy('id', 'desc')
            ->when($roleId, function($query)use($roleId){
                return $query->where('admins.roleId', $roleId);
            })
            ->when($name, function($query)use($name){
                return $query->where('name', $name);
            })
            ->select('admins.*', 'roles.roleName')
            ->leftJoin('roles', 'roles.roleId', '=', 'admins.roleId')
            ->paginate(30);
    }
}