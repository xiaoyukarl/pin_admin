<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function setCreateTimeAttribute()
    {
        $this->attributes['createTime'] = date('Y-m-d H:i:s');
    }

}
