<?php

namespace App\Models;



use Illuminate\Support\Facades\Redis;

class CityModel extends BaseModel
{

    protected $table = 'city';
    const CITY_STORAGE = 'cityInfo';

    /**
     * 缓存城市列表
     */
    public static function storage()
    {
        $cities = self::getAllCity();
        $data = array_values($cities);
        Redis::set(self::CITY_STORAGE,json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 下拉框中使用
     * @return array
     */
    public static function getAllCity()
    {
        $cities = CityModel::select('cityName')->get();
        $data = [];
        foreach ($cities as $city) {
            $data[$city->cityName] = $city->cityName;
        }
        return $data;
    }

}
