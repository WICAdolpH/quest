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

        //$res = 0;
        $res = DB::table('matrix_gapfill_content') -> select("coordinates","content")  -> where('f_id',21) -> where('voter_id',506) -> get();
        var_dump($res);
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
