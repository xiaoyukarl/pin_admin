<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\Back\OrderRequest;
use App\Models\CityModel;
use App\Models\OrderModel;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{


    public function index(Request $request)
    {
        $starCity = $request->get('starCity', false);
        $destCity = $request->get('destCity', false);
        $type = $request->get('type', false);
        $enable = $request->get('enable', false);
        $orders = (new OrderService())->paginate($request);

        $cities = CityModel::getAllCity();
        $params['starCitySelect'] = self::getSelectHtml($cities,'starCity', $starCity, 1, 0, '出发城市');
        $params['destCitySelect'] = self::getSelectHtml($cities,'destCity', $destCity, 1, 0, '到达城市');
        $params['typeSelect'] = self::getSelectHtml(config('base.type'),'type', $type, 1, 0, '类型');
        $params['enableSelect'] = self::getSelectHtml(config('base.enable'),'enable', $enable, 1, 0, '是否禁止');

        $params['orders'] = $orders;
        $params['request'] = $request;

        return view('admin.order.index')->with($params);
    }

    /**
     * 禁止显示此拼车
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enable($id)
    {
        OrderModel::where('id',$id)->update(['enable' => 2]);
        return redirect()->route('back.order.index');
    }


    public function create()
    {
        $cities = CityModel::getAllCity();
        $params['starCitySelect'] = self::getSelectHtml($cities,'starCity', '', 1, 1, '出发城市');
        $params['destCitySelect'] = self::getSelectHtml($cities,'destCity', '', 1, 1, '到达城市');
        $params['typeSelect'] = self::getSelectHtml(config('base.type'),'type', '', 1, 1, '类型');
        return view('admin.order.create')->with($params);
    }

    public function store(OrderRequest $request)
    {
        $data = $request->post();
        $data['userId'] = 1;
        OrderModel::create($data);
        return redirect()->route('back.order.index');
    }

}
