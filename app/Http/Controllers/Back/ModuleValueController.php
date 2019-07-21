<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\ModuleValueRequest;
use App\Models\ModuleModel;
use App\Models\ModuleValueModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleValueController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(!$request->has('mId')){
            return back()->withErrors(['need mId']);
        }
        $mId = $request->get('mId');
        $module = ModuleModel::find($mId);
        $values = ModuleValueModel::where('mId', $mId)->orderBy('sort', 'desc')->get();

        return view('admin.module_value.index')->with([
            'values' => $values,
            'mId' => $mId,
            'module' => $module
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if(!$request->has('mId')){
            return back()->withErrors(['need mId']);
        }
        $mId = $request->get('mId');

        $module = ModuleModel::find($mId);
        return view('admin.module_value.create')->with([
            'mId' => $mId,
            'module' => $module
        ]);
    }

    public function store(ModuleValueRequest $request)
    {
        $data = $request->post();
        ModuleValueModel::create($data);
        return redirect()->route('back.module_value.index', ['mId' => $data['mId']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moduleValue = ModuleValueModel::find($id);
        $module = ModuleModel::find($moduleValue->mId);

        return view('admin.module_value.edit')->with([
            'moduleValue' => $moduleValue,
            'module' => $module
        ]);
    }

    /**
     * @param ModuleValueRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ModuleValueRequest $request, $id)
    {
        $data = $request->post();
        $moduleValue = ModuleValueModel::find($id);
        $moduleValue->update($data);
        return redirect()->route('back.module_value.index', ['mId' => $data['mId']]);
    }

    public function delete($id)
    {
        $moduleValue = ModuleValueModel::find($id);
        $mId = $moduleValue->mId;
        $moduleValue->delete();
        return redirect()->route('back.module_value.index', ['mId' => $mId]);
    }

}
