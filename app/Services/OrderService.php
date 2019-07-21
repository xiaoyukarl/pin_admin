<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-19
 * Time: 00:20
 */

namespace App\Services;


use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderService extends BaseService
{

    public function paginate(Request $request)
    {
        $starCity = $request->get('starCity', false);
        $destCity = $request->get('destCity', false);
        $username = $request->get('username', false);
        $enable = $request->get('enable', false);
        $type = $request->get('type', false);

        return OrderModel::orderBy('orders.id', 'desc')
            ->select('orders.*', 'u.username', 'u.avatar')
            ->leftJoin('users as u', 'u.id', '=', 'orders.userId')
            ->when($username, function ($query)use($username){
                return $query->where('u.username', $username);
            })
            ->when($type, function ($query)use($type){
                return $query->where('type', $type);
            })
            ->when($starCity, function ($query)use($starCity){
                return $query->where('starCity', $starCity);
            })
            ->when($destCity, function ($query)use($destCity){
                return $query->where('destCity', $destCity);
            })
            ->when($enable, function ($query)use($enable){
                return $query->where('enable', $enable);
            })
            ->paginate($this->pageNum);

    }

}