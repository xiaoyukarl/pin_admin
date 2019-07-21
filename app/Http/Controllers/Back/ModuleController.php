<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-18
 * Time: 00:26
 */

namespace App\Http\Controllers\Back;


use App\Http\Requests\Back\ModuleRequest;
use App\Models\ModuleModel;
use Illuminate\Http\Request;

class ModuleController extends BaseController
{

    public function index(Request $request)
    {

        $arrModuleSort = ModuleModel::getNaviSortData();
        $moduleList = ModuleModel::setModContent(0, '', $arrModuleSort);
//        dd($moduleList);

        $params = [
            'request' => $request,
            'moduleList' => $moduleList
        ];
        return view('admin.module.index', $params);
    }

    public function create(Request $request)
    {
        if($request->has('pId')){
//            dd($request->get('pId'));
            $module = ModuleModel::find($request->get('pId'));
            $params['module'] = $module;
            $params['parentModName'] = $module->modName;
        }else{
            $params['parentModName'] = '顶级模块';
        }
        $params['request'] = $request;
        return view('admin.module.create')->with($params);
    }

    public function store(ModuleRequest $request)
    {
        $data = $request->post();
        $data['parentId'] =  $request->post('pId', 0);
        unset($data['pId']);
        ModuleModel::create($data);
        return redirect()->route('back.module.index');
    }

    public function edit($id)
    {
        $module = ModuleModel::find($id);

        $arrModuleSort = ModuleModel::getNaviSortData();
        $modOption = ModuleModel::setModOption($arrModuleSort, $id, $module->parentId);

        return view('admin.module.edit')->with([
            'module' => $module,
            'modOption' => $modOption,
        ]);
    }

    public function update(ModuleRequest $request, $id)
    {
        $data = $request->post();
        $data['parentId'] =  $request->post('pId', 0);
        unset($data['pId']);
        $module = ModuleModel::find($id);
        $module->update($data);
        return redirect()->route('back.module.index');
    }

    public function delete($id)
    {
        dd($id);
        //删除要考虑,有没有子模块信息
    }
}