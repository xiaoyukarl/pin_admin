<?php

namespace App\Models;


class OrderModel extends BaseModel
{
    protected $table = 'orders';

    public function getImgUrlAttribute()
    {
        $imgUrl = '';
        if(!empty($this->img)){
            $imgUrl = config('base.imgDomain') . $this->img;
        }
        return $imgUrl;
    }
}
