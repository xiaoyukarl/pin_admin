<?php

namespace App\Models;


class AdminModel extends BaseModel
{

    protected $table = 'admins';

    public static function getAdminByName($name)
    {
        return AdminModel::where('name', $name)
            ->select('admins.*','roles.roleName','roles.permission')
            ->leftJoin('roles', 'roles.roleId', '=', 'admins.roleId')
            ->first();
    }

    public function setPasswordAttribute($password)
    {
        if(!empty($password)){
            $this->attributes['password'] = encrypt($password);
        }
    }
}
