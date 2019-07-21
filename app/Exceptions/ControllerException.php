<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-17
 * Time: 23:42
 */

namespace App\Exceptions;


use Illuminate\Http\Request;

class ControllerException extends \Exception
{

    /**
     * 控制器内抛出异常,返回上一个界面
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function render(Request $request)
    {
        return back()->withErrors([
            $this->getMessage()
        ]);
    }

}