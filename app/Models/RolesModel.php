<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;

class RolesModel extends BaseModel
{
    protected $table = 'roles';
    protected $primaryKey = 'roleId';

    public static function getAllRoles()
    {
        return RolesModel::get();
    }

    public static function getRolesPermission()
    {
        $arrMv = DB::table('module as m')
            ->select('m.*','mv.vId','mv.vName','mv.vEnName','mv.sort as sort2')
            ->leftJoin('modulevalue as mv', 'm.mId', '=', 'mv.mId')
            ->orderBy('sort', 'asc')
            ->orderBy('mId', 'desc')
            ->orderBy('sort2', 'asc')
            ->orderBy('vId', 'asc')
            ->get()
            ->toJson();
        return json_decode($arrMv, true);
    }

    public static function getMvData()
    {
        $arrMv = DB::table('module as m')
            ->select('m.*','mv.vId','mv.vName','mv.vEnName','mv.sort as sort2')
            ->leftJoin('modulevalue as mv', 'm.mId', '=', 'mv.mId')
            ->orderBy('sort', 'asc')
            ->orderBy('mId', 'desc')
            ->orderBy('sort2', 'asc')
            ->orderBy('vId', 'asc')
            ->get()
            ->toArray();
        $arrMv = json_decode(json_encode($arrMv), true);
        foreach ($arrMv as $d) {
            if ($d['parentId'] == 0) {
                $arrMvSort['p' . $d['parentId']][] = $d;
            } else {
                $arrMvSort['p' . $d['parentId']][$d['modUrl']][] = $d;
            }
        }
        return $arrMvSort;
    }


    public static function getMvContent($mId, $strSpace, $arrMvData, $arrSelectedMv = array())
    {
        static $mvList = '';
        if (isset($arrMvData['p' . $mId])) {
            foreach ($arrMvData['p' . $mId] as $d) {

                if ($mId == 0) {
                    //模块组
                    $iMid = $d['mId'];
                    $mvList .= <<< EOF
                <tr onMouseOut="this.className=''" onMouseOver="this.className ='trOnMouseOver'">
                  <td><span style="font-weight:bold;">{$d['modName']}</span></td>
                  <td></td>
                </tr>
EOF;
                } else {
                    $iMid = $d[0]['mId'];
                    $mvList .= <<< EOF
                <tr onMouseOut="this.className=''" onMouseOver="this.className ='trOnMouseOver'">
                  <td>
                    <span style="color:#600">{$strSpace}{$d[0]['modName']}</span>
                      <input lay-ignore type='checkbox' onclick="selectAllValue(this,'{$d[0]['modUrl']}');" id="all{$d[0]['mId']}">
                      <label for="all{$d[0]['mId']}">全选</label>
                      </td>
                      <td>
EOF;

                    foreach ($d as $v) {
                        $strChecked    = isset($arrSelectedMv->{$v['modUrl']}->{$v['vEnName']}) ? 'checked="checked"' : '';
                        $strChangeView = $v['vEnName'] == 'view' ? '' : "onclick=\"selectView(this,'mv[{$v['modUrl']}][view]');\"";
                        if ($v['vEnName'] != '') {
                            $mvList .= "<div style='padding-right:10px;float: left;'><input lay-ignore type='checkbox' name='mv[{$v['modUrl']}][{$v['vEnName']}]' selName='{$v['modUrl']}'  value='1' id='{$v['vId']}' $strChecked $strChangeView><label for='{$v['vId']}'>{$v['vName']}</label></div>";
                        }
                    }
                    $mvList .= '</td></tr>';
                }

                if (isset($arrMvData['p' . $mId])) {
                    self::getMvContent($iMid, $strSpace . '&nbsp;&nbsp;&nbsp;&nbsp;', $arrMvData, $arrSelectedMv);
                }

            }

        }
        return $mvList;
    }

}
