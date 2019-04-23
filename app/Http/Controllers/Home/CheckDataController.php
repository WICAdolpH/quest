<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Crypt;
use Session;

class CheckDataController extends Controller
{
    //  数据展示
    public function checkData(Request $request){
        //  接受数据
        //$questId = 75;
        $questId = $request -> get('id');
        $result = 1;
        $check = DB::table("quest") -> where('id',$questId) -> value('quest');
        $check = trim($check,",");

        $checkArr = explode(",",$check);
        $checkData = "";
        //var_dump($checkArr);
        foreach ($checkArr as $key => $value) {

            switch ($value) {
                case "1" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  这是单选
                    $radioId = DB::table("radio") -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $radioTitle = DB::table("radio") -> where('quest_id',$questId)  -> offset($num) -> limit(1) -> value('title');
                    $checkData .= ",type:radio|title:".$radioTitle;
                    $radioResId = DB::table('radio_res') -> where('f_id',$radioId) -> pluck('id') ;
                    /*var_dump($radioResId);
                    var_dump("<br>");*/
                    foreach ($radioResId as $k => $val) {
                        //var_dump("*:".$val);
                        $optionTitle = DB::table('radio_res') -> where('id',$val) -> value('content');
                        $user = DB::table('radio_res') -> where('id',$val) -> value('voter_id');
                        $user = trim($user,",");
                        $userArr = explode(",",$user);
                        $count = 0;
                        foreach ($userArr as $userVote) {
                            if($userVote != "") {
                                $count++;
                            }
                        }
                        $checkData .= "|option{$k}:{$optionTitle}";
                        $checkData .= "|optionNum{$k}:{$count}";
                    }
                    //var_dump($checkData);
                    break;
                case "2" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  这是单选
                    $radioId = DB::table("radio_multi") -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $radioTitle = DB::table("radio_multi") -> where('quest_id',$questId)  -> offset($num) -> limit(1) -> value('title');
                    $checkData .= ",type:radioMulti|title:".$radioTitle;
                    $radioResId = DB::table('radio_multi_res') -> where('f_id',$radioId) -> pluck('id') ;
                    /*var_dump($radioResId);
                    var_dump("<br>");*/
                    foreach ($radioResId as $val) {
                        //var_dump("*:".$val);
                        $optionTitle = DB::table('radio_multi_res') -> where('id',$val) -> value('content');
                        $user = DB::table('radio_multi_res') -> where('id',$val) -> value('voter_id');
                        $user = trim($user,",");
                        $userArr = explode(",",$user);
                        $count = 0;
                        foreach ($userArr as $k=>$userVote) {
                            if($userVote != "") {
                                $count++;
                            }
                        }
                        $checkData .= "|option{$k}:{$optionTitle}";
                        $checkData .= "|optionNum{$k}:{$count}";
                    }
                    //var_dump($checkData);
                    break;
                case "7" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  填空题类型
                    $checkData .= ",type:gapFill";
                    $typeId = DB::table('gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $title = DB::table('gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $checkData .= "|title:{$title}";
                    $option = DB::table('gapfill_res') -> where('f_id',$typeId) -> pluck('content');
                    foreach ($option as $k => $val) {
                        $checkData .= "|option{$k}:{$val}";
                    }
                    //var_dump($checkData);
                    break;
                case "8" :
                    //  判断第几个
                    //var_dump(77);
                    $num = $this -> typeNum($key,$value,$questId);
                    //  多项填空题类型
                    $checkData .= ",type:gapMultiFill";
                    $typeId = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $title = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $checkData .= "|title:{$title}";
                    $optionId = DB::table("gapfill_multi_res") -> where('f_id',$typeId) -> pluck('id');
                    foreach ($optionId as $k => $val) {
//                        $checkData .= "|option{$k}:{$val}";
                        $title = DB::table('gapfill_multi_res') -> where('id',$val) -> value('content');
                        $checkData .= "|title{$k}:{$title}";
                        $optionArr = DB::table('gapfill_multi_content') -> where('f_id',$val) -> pluck('content');
                        $checkData .= "|option{$k}:";
                        foreach ($optionArr as $v) {
                            $checkData .= $v.".";
                        }
                    }
                    //var_dump($checkData);
                    break;
                case "9" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  分数类型
                    $checkData .= ",type:score";
                    $typeId = DB::table('score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $title = DB::table('score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $checkData .= "|title:{$title}";
                    $option = DB::table('score_res') -> where('f_id',$typeId) -> pluck('content');
                    foreach ($option as $k => $val) {
                        $checkData .= "|option{$k}:{$val}";
                    }
                    //var_dump($checkData);
                    break;
                case "19" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  日期类型
                    $checkData .= ",type:date";
                    $typeId = DB::table('date') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $title = DB::table('date') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $checkData .= "|title:{$title}";
                    $option = DB::table('date_res') -> where('f_id',$typeId) -> pluck('content');
                    foreach ($option as $k => $val) {
                        $checkData .= "|option{$k}:{$val}";
                    }
                    //var_dump($checkData);
                    break;
                case "23" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  矩阵选择
                    $checkData .= ",type:matrixRadio";
                    $typeId = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $title = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $checkData .= "|title:{$title}";
                    $option = DB::table('matrix_radio_content')-> select(DB::raw('count(*) as count, coordinates')) -> where('f_id',$typeId) -> groupBy('coordinates') -> get() -> toArray();
//                    var_dump($option[0] -> content);
                    //var_dump($num);
                    /*var_dump("<pre>");
                    var_dump($option);
                    var_dump("</pre>");*/

                    foreach ($option as $val) {
                        $checkData .= "|{$val->coordinates}:$val->count";
                    }

                    //  小标题
                    $titleRow = DB::table('matrix_radio_row') -> where('f_id',$typeId) -> pluck('content');
                    $titleCol = DB::table('matrix_radio_col') -> where('f_id',$typeId) -> pluck('content');
                    foreach ($titleCol as $k =>$val) {
                        $checkData .= "|col{$k}:$val";
                    }
                    foreach ($titleRow as $k =>$val) {
                        $checkData .= "|row{$k}:$val";
                    }
                    //var_dump($checkData);
                    break;
                case "24" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  矩阵分数
                    $checkData .= ",type:matrixScore";
                    $typeId = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $title = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $checkData .= "|title:{$title}";
                    $userArr = DB::table('matrix_score_content')-> select("voter_id") -> where('f_id',$typeId) -> groupBy('voter_id') -> get() -> toArray();
//                    var_dump($option[0] -> content);
                    //var_dump($num);
                    /*var_dump("<pre>");
                    var_dump($option);
                    var_dump("</pre>");*/

                    foreach ($userArr as $k=> $val) {

                        $option = DB::table('matrix_score_content') -> where('f_id',$typeId) -> where('voter_id',$val->voter_id)  -> get() -> toArray();
                        $checkData .= "|";
                        foreach ($option as $val1) {
                            $checkData .= "+{$val1->coordinates}:{$val1->content}";
                        }


                    }
                    //  小标题
                    $titleRow = DB::table('matrix_score_row') -> where('f_id',$typeId) -> pluck('content');
                    $titleCol = DB::table('matrix_score_col') -> where('f_id',$typeId) -> pluck('content');
                    foreach ($titleCol as $k =>$val) {
                        $checkData .= "|col{$k}:$val";
                    }
                    foreach ($titleRow as $k =>$val) {
                        $checkData .= "|row{$k}:$val";
                    }
                    //var_dump($checkData);
                    break;
                case "25" :
                    //  判断第几个
                    $num = $this -> typeNum($key,$value,$questId);
                    //  矩阵填空
                    $checkData .= ",type:matrixGapFill";
                    $typeId = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $title = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $checkData .= "|title:{$title}";
                    $userArr = DB::table('matrix_gapfill_content')-> select("voter_id") -> where('f_id',$typeId) -> groupBy('voter_id') -> get() -> toArray();
//                    var_dump($option[0] -> content);
                    //var_dump($num);
                    /*var_dump("<pre>");
                    var_dump($option);
                    var_dump("</pre>");*/

                    foreach ($userArr as $k=> $val) {

                        $option = DB::table('matrix_gapfill_content') -> where('f_id',$typeId) -> where('voter_id',$val->voter_id)  -> get() -> toArray();
                        $checkData .= "|";
                        foreach ($option as $val1) {
                            $checkData .= "+{$val1->coordinates}:{$val1->content}";
                        }


                    }
                    //  小标题
                    $titleRow = DB::table('matrix_gapfill_row') -> where('f_id',$typeId) -> pluck('content');
                    $titleCol = DB::table('matrix_gapfill_col') -> where('f_id',$typeId) -> pluck('content');
                    foreach ($titleCol as $k =>$val) {
                        $checkData .= "|col{$k}:$val";
                    }
                    foreach ($titleRow as $k =>$val) {
                        $checkData .= "|row{$k}:$val";
                    }
                    //var_dump($checkData);
                    break;
            }
        }
        return view('home.checkData.index',compact(['checkData',$checkData]));
    }

    //  密码认证
    public function passCheck (Request $request) {
        //  数据接受
        $questId = $request -> get('quest_id');
        $input_pass = $request -> get('pass');
        $db_pass = DB::table('quest') -> where('id',$questId) -> value('password');
        //dd($input_pass);
        if($db_pass == null) {
            return 1;
        } elseif ($db_pass != $input_pass) {
            return response() -> json(['status'=>'422',"msg"=>'密码错误']);
        }
        return 1;
    }

    public function typeNum($key,$type,$questId) {
       $num = -1;
       $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
       $quest = trim($quest,",");
       $questArr = explode(",",$quest);
       foreach ($questArr as $k => $v) {
           if($k<=$key && $type == $v) {
               $num++;
           }
       }
       return $num;
    }
}
