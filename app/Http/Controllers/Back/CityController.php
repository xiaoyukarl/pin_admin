<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\CityRequest;
use App\Models\CityModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends BaseController
{

    public function index()
    {
        $cities = CityModel::all();

        CityModel::storage();
        return view('admin.city.index',compact('cities'));
    }

    public function create()
    {
        return view('admin.city.create');
    }

    public function store(CityRequest $request)
    {
        $data = $request->post();
        CityModel::create($data);

        CityModel::storage();//redis 缓存
        return redirect()->route('back.city.index');
    }

    public function edit( $id)
    {
        $city = CityModel::find($id);
        return view('admin.city.edit',compact('city'));
    }

    public function update(CityRequest $request, $id)
    {
        $data = $request->only('cityName');
        CityModel::where('id', $id)->update($data);
        CityModel::storage();//redis 缓存
        return redirect()->route('back.city.index');
    }

    public function delete($id)
    {
        CityModel::where('id', $id)->delete();

        return redirect()->route('back.city.index');
    }
}
