<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin\User;
use Auth;
use App\Admin\Manager;

class TestController extends Controller
{
    //

    public function test(Request $request) {

        $option = DB::table('matrix_radio_content')-> select(DB::raw('count(*) as count, coordinates')) -> where('f_id',99) -> groupBy('coordinates') -> get() -> toArray();

//                    var_dump($option[0] -> content);
        //var_dump($num);
        var_dump("<pre>");
        var_dump($option);
        var_dump("</pre>");
    }

    public function typeNum() {
        $type = DB::table("quest") -> where("id",70) -> value("quest");
        $typeArr = [];
        $arr = [];
        $i = 0;
        $type = trim($type,",");
        $type = explode(",",$type);
        foreach ($type as $key => $value) {
            if($value != 13) {
                array_push($arr,$value);
            } else {
                array_push($typeArr,$arr);
                $arr = [];
                $i++;
            }
        }
        $i++;
        array_push($typeArr,$arr);
        //$typeArr[$i] = array_merge($typeArr,$arr);
        return $typeArr;
    }


}
