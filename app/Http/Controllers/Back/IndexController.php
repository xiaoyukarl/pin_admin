<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-17
 * Time: 22:39
 */

namespace App\Http\Controllers\Back;


use App\Models\ModuleModel;
use App\Models\RolesModel;

class IndexController extends BaseController {

    public function index()
    {
        $permissions = json_decode(session()->get('permission'), true);
        $modulesArr = ModuleModel::getModuleByMid(0);
        $modules = [];
        foreach ($modulesArr as $module){
            $subModule = ModuleModel::getModuleByMid($module['mId']);
            $needShow = false;
            foreach ($subModule as $sub) {
                if(array_key_exists($sub['modUrl'], $permissions)){
                    $needShow = true;
                }
            }
            if($needShow){
                $module['sub'] = $subModule;
                $modules[] = $module;
            }
        }
//        dd($modules,$permissions);

        return view('admin.index.index', compact('modules', 'permissions'));
    }

    public function env()
    {
        $envs = [
            ['name' => '系统名称',           'value' => env('APP_NAME', 'brightake')],
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => array_get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];
        $params['envs'] = $envs;

        return view('admin.index.env')->with($params);
    }
}