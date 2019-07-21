<?php

namespace App\Http\Controllers\Back;

use App\Models\RolesModel;
use Illuminate\Http\Request;

class RolesController extends BaseController
{
    public function index(Request $request)
    {
        $roles = RolesModel::orderBy('roleId','desc')->paginate($this->pageNum);

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $arrMvData = RolesModel::getMvData();
        $arrMv     = RolesModel::getMvContent(0, '', $arrMvData);
        return view('admin.roles.create')->with([
            'arrMv' => $arrMv
        ]);
    }

    public function store(Request $request)
    {
        $mv = $request->post('mv');
        $mvData = isset($mv) ? json_encode($mv) : '';
        $data = [
            'roleName' => $request->post('roleName'),
            'permission' => $mvData,
            'roleDesc' => $request->post('roleDesc'),
        ];
        RolesModel::create($data);
        return redirect()->route('back.roles.index');

    }

    public function edit($id)
    {
        $role = RolesModel::find($id);
        $permission = json_decode($role->permission);
        $arrMvData = RolesModel::getMvData();
        $arrMv     = RolesModel::getMvContent(0, '', $arrMvData, $permission);
        return view('admin.roles.edit')->with([
            'arrMv' => $arrMv,
            'role' => $role
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = RolesModel::find($id);
        $mv = $request->post('mv');
        $mvData = isset($mv) ? json_encode($mv) : '';
        $data = [
            'roleName' => $request->post('roleName'),
            'permission' => $mvData,
            'roleDesc' => $request->post('roleDesc'),
        ];
        $role->update($data);

        return redirect()->route('back.roles.index');
    }
}
