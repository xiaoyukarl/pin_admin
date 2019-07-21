<?php
/**
 * Created by PhpStorm.
 * User: xiaoyukarl
 * Date: 2019-07-17
 * Time: 23:19
 */

namespace App\Http\Controllers\Back;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    protected $imgExt = ['jpg','jpeg','png','gif'];

    protected $pageNum = 30;

    /**
     * 根据数组生成html下拉框
     * @param $selectArr
     * @param $confName
     * @param string $curId
     * @param int $needSelect
     * @param int $needCheck
     * @param string $optionName
     * @param array $disable
     * @return string
     */
    public static function getSelectHtml($selectArr, $confName, $curId = '', $needSelect=1, $needCheck=1, $optionName = '请选择', $disable = [])
    {
        if($needCheck ==1) {
            $strCheck = ' required="required" check="require" lay-verify="required"';
        } else {
            $strCheck = '';
        }

        $str = "<div class='layui-inline'><select name='$confName' $strCheck lay-search> ";
        if($curId!='') {
            $curStatus = $curId;
        } else {
            $curStatus = isset($_GET[$confName]) ? $_GET[$confName] : '';
        }
        if($needSelect ==1) {
            $str .= '<option value="">'.$optionName.'</option>';
        }
        foreach($selectArr as $k=>$v) {
            $k = (string) $k;
            $str .= "<option value='{$k}' ";
            if($curStatus == $k) {
                $str .= " selected='selected' ";
            }
            if(in_array($k, $disable)) {
                $str .= " disabled='disabled' ";
            }
            $str .= ">$v</option>";
        }
        $str .='</select></div>';
        return $str;
    }

    /**
     * 根据对象生成html下拉框
     * @param $collection
     * @param $selectName
     * @param $key
     * @param $showName
     * @param string $curId
     * @param int $needSelect
     * @param int $needCheck
     * @param string $optionName
     * @param array $disable
     * @return string
     */
    public static function getSelectHtmlByCollection($collection, $selectName, $key, $showName,$curId = '', $needSelect=1, $needCheck=1, $optionName = '请选择', $disable = [])
    {
        if($needCheck ==1) {
            $strCheck = ' required="required" check="require" lay-verify="required"';
        } else {
            $strCheck = '';
        }

        $str = "<div class='layui-inline'><select name='$selectName' $strCheck lay-search> ";
        if($curId!='') {
            $curStatus = $curId;
        } else {
            $curStatus = isset($_GET[$selectName]) ? $_GET[$selectName] : '';
        }
        if($needSelect ==1) {
            $str .= '<option value="">'.$optionName.'</option>';
        }
        foreach($collection as $v) {
            $k = (string) $v->$key;
            $str .= "<option value='{$k}' ";
            if($curStatus == $k) {
                $str .= " selected='selected' ";
            }
            if(in_array($k, $disable)) {
                $str .= " disabled='disabled' ";
            }
            $str .= ">" . $v->$showName . "</option>";
        }
        $str .='</select></div>';
        return $str;
    }

    /**
     * 上传单个文件,成功返回字符串文件名,错误返回数组提示
     * @param $request|request类
     * @param $key|文件input名称
     * @param $save_dir|upload下的文件夹名字如:'news/'
     * @param $exts|允许上传文件格式后缀
     * @return array|string
     */
    public function uploadFile(Request $request,$key,$save_dir,$exts)
    {
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $extension = $file->extension();
            if(!empty($exts) && !in_array($extension,$exts)){
                return ['msg'=>'文件格式必须为'.implode(',',$exts)];
            }
            $dir = $save_dir.date('Ym');
            if(!is_dir(public_path('upload/'.$dir))){
                mkdir(public_path('upload/'.$dir),0777,true);
            }
            $save_path = $file->store($dir);
            return $save_path;
        }else{
            return ['msg'=>'上传文件不存在'];
        }
    }
}