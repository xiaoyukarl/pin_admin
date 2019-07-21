<?php

namespace App\Models;


class ModuleModel extends BaseModel
{
    protected $table = 'module';
    protected $primaryKey = 'mId';

    public static function getModuleByMid($mId)
    {
        return self::where('parentId', $mId)->get()->toArray();
    }

    public static  function getNaviSortData( $isSort = 1 )
    {
        $naviData = ModuleModel::all()->toArray();
        $arrNaviSort = array();
        foreach ($naviData as $d) {
            $arrNaviSort['p' . $d['parentId']][] = $d;
        }
        if ($isSort == 0){
            return array($naviData, $arrNaviSort);
        }else{
            return $arrNaviSort;
        }
    }

    /**
     * 递归得到栏目列表
     * @param $mId
     * @param $strSpace
     * @param $arrModSort
     * @return string
     */
    public static function setModContent($mId, $strSpace, $arrModSort)
    {
        static $modTrList = '';
        //前导符号
        if ($mId == 0) {
            $subSymbol = '';
            $strFont = 'bold';
        } else {
            $subSymbol = '├┄';
            $strFont = '';
        }
        //没有栏目时
        if (isset($arrModSort['p' . $mId])) {
            foreach ($arrModSort['p' . $mId] as $d) {
                if ($d['parentId'] == 0)
                    $strAdd = "<a href='".route('back.module.create',['pId' => $d['mId']])."'>添加模块</a>";
                else
                    $strAdd = "<a href='".route('back.module_value.index',['mId' => $d['mId']])."' style='color:#930;'>查看权限</a>";

                if (!isset($arrModSort['p' . $d['mId']]))
                    $strDel = "<a href='".route('back.module.delete',$d['mId'])."' onclick='return commonModel.delete()'>删除</a>";
                else
                    $strDel = '';


                $strIsSuper = ($d['isSuper'] == 1) ? '  <span class="blue">是</span>' : '';

                $editUrl = route('back.module.edit', $d['mId']);
                $modTrList .= <<< EOF
            <tr onMouseOut="this.className=''" onMouseOver="this.className ='trOnMouseOver'">
              <td height="30"  align="center">{$d["sort"]}</td>
              <td>{$strSpace}{$subSymbol}<span  style="font-weight:{$strFont}">{$d['modName']}</span></td>
              
              <td align="center">{$d["modUrl"]}</td>
              <td align="center">{$strIsSuper}</td>
              <td ><table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="82">{$strAdd}</td>
                      <td width="51" align="left"><a href="{$editUrl}">修改</a></td>
                      <td width="63">{$strDel}</td>
                    </tr>
                    </table></td>
            </tr>
EOF;
                if (isset($arrModSort['p' . $d['mId']]))
                    self::setModContent($d['mId'], $strSpace . '&nbsp;&nbsp;&nbsp;&nbsp;', $arrModSort);
            }
        }
        return $modTrList;

    }


    public static  function setModOption($arrModuleSort, $currId = 0, $parentId = 0, $mId = 0, $strSpace = '')
    {
        static $modOption = '';
        //前导符号
        if ($mId == 0)
            $subSymbol = '';
        else
            $subSymbol = '├┄';
        // var_dump($moduleList);
        foreach ($arrModuleSort['p' . $mId] as $d) {
            $modOption .= "<option value='{$d["mId"]}'";
            if ($parentId == $d["mId"])
                $modOption .= ' selected="selected" ';
            if ($currId == $d["mId"])
                $modOption .= ' disabled="disabled" ';
            $modOption .= ">{$strSpace}{$subSymbol}{$d['modName']}</option>";
            //递归显示分类

            if (isset($arrModuleSort['p' . $d['mId']]))
                self::setModOption($arrModuleSort, $currId, $parentId, $d['mId'], $strSpace . '&nbsp;&nbsp;');

        }
        return $modOption;

    }
}
