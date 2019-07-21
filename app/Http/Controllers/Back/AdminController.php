<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\AdminRequest;
use App\Models\AdminModel;
use App\Models\RolesModel;
use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends BaseController
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {

        $roleId = $request->get('roleId', false);
        $roles = RolesModel::getAllRoles();
        $rolesHtml = self::getSelectHtmlByCollection($roles, 'roleId', 'roleId', 'roleName', $roleId, 1, 0);
        $admins = $this->adminService->getAdminsPaginate($request);
        $params = [
            'admins' => $admins,
            'rolesHtml' => $rolesHtml,
            'request' => $request
        ];
        return view('admin.admin.index', $params);
    }

    public function create()
    {
        $roles = RolesModel::getAllRoles();
        $rolesHtml = self::getSelectHtmlByCollection($roles, 'roleId', 'roleId', 'roleName');
        return view('admin.admin.create', compact('rolesHtml'));
    }

    public function store(AdminRequest $request)
    {
        $data = $request->post();
        AdminModel::create($data);
        return redirect()->route('back.admin.index');
    }

    public function edit($id)
    {
        $admin = AdminModel::find($id);

        $roles = RolesModel::getAllRoles();
        $rolesHtml = self::getSelectHtmlByCollection($roles, 'roleId', 'roleId', 'roleName', $admin->roleId);

        return view('admin.admin.edit', compact('admin', 'rolesHtml'));
    }

    public function update(Request $request, $id)
    {
        $admin = AdminModel::find($id);
        $admin->update($request->post());
        return redirect()->route('back.admin.index');
    }
}
