<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CreateCheckController extends Controller
{
    //创建页面
    public function createCheck(Request $request) {
        //判断进来的方法
        $method = $request -> getMethod();
        $country = \DB::table('area') -> where('pid','0') -> get();
        if( $method == 'GET' ) {
            //  判断试卷是否存在
            $questId =  \Session::get('questId') ?? null;
            if($questId ) {
                $questionnaire = "";
                //  从数据调取原试卷
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $quest = explode(",",$quest);
                $quest1 = $quest;
                foreach ( $quest as $key => $value ) {
                    $type = DB::table('type') -> where('id',$value) -> value('title');
                    $num = 0;
                    for($i=0; $i<$key; $i++) {
                        if($quest1[$i] == $value) {
                            $num++;
                        }
                    }
                    switch ( $type ) {
                        case 'radio' :
                            $typeId = DB::table('radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $option = DB::table('radio_res') -> where('f_id',$typeId) -> pluck('content');
                            $arr = "type:radio|title:{$title}";
                            foreach ($option as $key => $value) {
                                $arr = $arr."|option".$key.":{$value}";
                            }
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'radio_multi' :
                            $typeId = DB::table('radio_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('radio_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $option = DB::table('radio_multi_res') -> where('f_id',$typeId) -> pluck('content');
                            $arr = "type:radioMulti|title:{$title}";
                            foreach ($option as $key => $value) {
                                $arr = $arr."|option".$key.":{$value}";
                            }
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'gapfill' :
                            $typeId = DB::table('gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $option = DB::table('gapfill_res') -> where('f_id',$typeId) -> pluck('content');
                            $arr = "type:gapFill|title:{$title}";
                            foreach ($option as $key => $value) {
                                $arr = $arr."|option".$key.":{$value}";
                            }
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'gapfill_multi' :
                            $typeId = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $option = DB::table('gapfill_multi_res') -> where('f_id',$typeId) -> pluck('content');
                            $arr = "type:gapMultiFill|title:{$title}";
                            foreach ($option as $key => $value) {
                                $arr = $arr."|option".$key.":{$value}";
                            }
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'score' :
                            $typeId = DB::table('score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:score|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'descr' :
                            $typeId = DB::table('descr') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('descr') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:descr|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'page' :
                            $typeId = DB::table('page') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            //  统计分页总数
                            $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                            $quest = ltrim($quest,",");
                            $questArr = explode(",",$quest);
                            $typeNum = 0;
                            foreach ($questArr as $value) {
                                if($value == 13) {
                                    $typeNum ++;
                                }
                            }
                            $num1 = $num + 1;
                            $arr = "type:page|typeNum:{$typeNum}|num:{$num1}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'hr' :
                            $typeId = DB::table('hr') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $arr = "type:hr";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'name' :
                            $typeId = DB::table('name') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('name') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:name|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'phone' :
                            $typeId = DB::table('phone') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('phone') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:phone|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'email' :
                            $typeId = DB::table('email') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('email') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:email|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'sex' :
                            $typeId = DB::table('sex') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('sex') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:sex|title:{$title}";
                            var_dump($title);
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'date' :
                            $typeId = DB::table('date') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('date') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:date|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'time' :
                            $typeId = DB::table('time') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('time') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:time|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'city' :
                            $typeId = DB::table('city') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('city') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:city|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case 'address' :
                            $typeId = DB::table('address') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('address') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $arr = "type:address|title:{$title}";
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case  'matrix_radio' :
                            $typeId = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $row = DB::table('matrix_radio_row') -> where('f_id',$typeId) -> pluck('content');
                            $col = DB::table('matrix_radio_col') -> where('f_id',$typeId) -> pluck('content');
                            $arr = "type:matrixRadio|title:{$title}";
                            foreach ($row as $key => $value) {
                                $arr = $arr."|row".$key.":{$value}";
                            }
                            foreach ($col as $key => $value) {
                                $arr = $arr."|col".$key.":{$value}";
                            }
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case  'matrix_score' :
                            $typeId = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $row = DB::table('matrix_score_row') -> where('f_id',$typeId) -> pluck('content');
                            $col = DB::table('matrix_score_col') -> where('f_id',$typeId) -> pluck('content');
                            $arr = "type:matrixScore|title:{$title}";
                            foreach ($row as $key => $value) {
                                $arr = $arr."|row".$key.":{$value}";
                            }
                            foreach ($col as $key => $value) {
                                $arr = $arr."|col".$key.":{$value}";
                            }
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                        case  'matrix_gapfill' :
                            $typeId = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                            $title = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                            $row = DB::table('matrix_gapfill_row') -> where('f_id',$typeId) -> pluck('content');
                            $col = DB::table('matrix_gapfill_col') -> where('f_id',$typeId) -> pluck('content');
                            $arr = "type:matrixGapFill|title:{$title}";
                            foreach ($row as $key => $value) {
                                $arr = $arr."|row".$key.":{$value}";
                            }
                            foreach ($col as $key => $value) {
                                $arr = $arr."|col".$key.":{$value}";
                            }
                            $questionnaire = $questionnaire.$arr.",";
                            break;
                    }
                }
                $statue = 1;
                return view('home.createCheck.create',compact(["questId","questionnaire","statue",'country']));
            } else  {
                //获取userId
                $userName = \Session::get('userInfo');
                $userId= DB::table('user') -> where('username','test') -> value('id');
                //创建新问卷
                $check = array(
                    'statue' => 1,
                    'user_id' => $userId,
                    'title' => '请输入标题',
                    'title1' => '感谢您能抽出几分钟时间来参加本次答题，现在我们就马上开始吧！',
                );

                $result = \DB::table('quest') -> insertGetId($check);
                \Session::put('questId',$result);
                $questId = $result;

                $statue = 0;
                return view('home.createCheck.create',compact(['country','questId',"statue"]));
            }



        }

    }
    //保存页面
    public function checkSave(Request $request) {

        //var_dump($request->all());
        //判断是否是原来的问卷 不是则重新创建
        //接受数据
        $arr = [];
        $result = 1;
        $list = $request -> get('list');
        $list = rtrim($list,",");
        $list = explode(',',$list);
        if($list != null) {
            foreach ($list as $key => $value) {
                $arrType = [];
                $value = rtrim($value,"|");
                $value = explode("|",$value);
                foreach ($value as $val) {
                    $val = explode(":",$val);
                    $arrType[$val[0]] = $val[1];
                }
                switch ($arrType['type']) {
                    case 'radio':  $result &= $this->radio($arrType); break;
                    case 'radioMulti' : $result &= $this -> radioMulti($arrType);break;
                    case 'gapFill' : $result &= $this -> gapFill($arrType);break;
                    case 'gapMultiFill' : $result &= $this -> gapMultiFill($arrType); break;
                    case 'score' : $result &= $this -> score($arrType); break;
                    case 'descr' : $result &= $this -> descr($arrType); break;
                    case 'page' : $result &= $this -> page($arrType); break;
                    case 'hr' : $result &= $this -> hr($arrType); break;
                    case 'name' : $result &= $this -> nameInfo($arrType); break;
                    case 'phone' : $result &= $this -> phone($arrType);break;
                    case 'email' : $result &= $this -> email($arrType);break;
                    case 'sex' : $result &= $this -> sex($arrType);break;
                    case 'date' : $result &= $this -> date($arrType);break;
                    case 'time' : $result &= $this -> time($arrType);break;
                    case 'city' : $result &= $this -> city($arrType);break;
                    case 'address' : $result &= $this -> address($arrType);break;
                    case 'matrixRadio' : $result &= $this -> matrixRadio($arrType);break;
                    case 'matrixScore' : $result &= $this -> matrixScore($arrType);break;
                    case 'matrixGapFill' : $result &= $this -> matrixGapFill($arrType);break;
                }
                $arr[$key] = $arrType;
            }
            return $result;
        }

    }

    //保存新增的内容
    public function addCheckSave(Request $request) {

        //var_dump($request->all());
        //判断是否是原来的问卷 不是则重新创建
        //接受数据
        $arr = [];
        $result = 1;
        $list = $request -> get('list');
        $list = rtrim($list,",");
        $list = explode(',',$list);
        if($list != null) {
            foreach ($list as $key => $value) {
                $arrType = [];
                $value = rtrim($value,"|");
                $value = explode("|",$value);
                foreach ($value as $val) {
                    $val = explode(":",$val);
                    $arrType[$val[0]] = $val[1];
                }
                switch ($arrType['type']) {
                    case 'radio':  $result &= $this->radio($arrType); break;
                    case 'radioMulti' : $result &= $this -> radioMulti($arrType);break;
                    case 'gapFill' : $result &= $this -> gapFill($arrType);break;
                    case 'gapMultiFill' : $result &= $this -> gapMultiFill($arrType); break;
                    case 'score' : $result &= $this -> score($arrType); break;
                    case 'descr' : $result &= $this -> descr($arrType); break;
                    case 'page' : $result &= $this -> page($arrType); break;
                    case 'hr' : $result &= $this -> hr($arrType); break;
                    case 'name' : $result &= $this -> nameInfo($arrType); break;
                    case 'phone' : $result &= $this -> phone($arrType);break;
                    case 'email' : $result &= $this -> email($arrType);break;
                    case 'sex' : $result &= $this -> sex($arrType);break;
                    case 'date' : $result &= $this -> date($arrType);break;
                    case 'time' : $result &= $this -> time($arrType);break;
                    case 'city' : $result &= $this -> city($arrType);break;
                    case 'address' : $result &= $this -> address($arrType);break;
                    case 'matrixRadio' : $result &= $this -> matrixRadio($arrType);break;
                    case 'matrixScore' : $result &= $this -> matrixScore($arrType);break;
                    case 'matrixGapFill' : $result &= $this -> matrixGapFill($arrType);break;
                }
                $arr[$key] = $arrType;
            }
            return $result;
        }

    }
    //  选项删除
    public function delOption(Request $request) {
        //  获取试卷Id
        $questId = \Session::get('questId');

        /*  接受要删除的数据
         *  题型  $type
         *  题型总数 $typeNum
         *  题型第几个要进项操作 $operate
         *  删除第几项 $delOption
         * */
        $type = $request -> get('type');
        $operate = $request -> get('operate') - 1;
        $delOption = $request -> get('deloption');
        //获取结果判断
        $result = 1;
        switch($type) {
            case 'radio' :
                // 获取要操作的id
                $typeId = DB::table('radio') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                $result &= DB::table('radio_res') -> where('f_id', $typeId) -> offset($delOption) -> limit(1) -> delete();
                break;
            case 'radioMulti' :
                // 获取要操作的id
                $typeId = DB::table('radio_multi') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                $result &= DB::table('radio_multi_res') -> where('f_id', $typeId) -> offset($delOption) -> limit(1) -> delete();
                break;
            case 'gapFill' :
                $typeId = DB::table('gapfill') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                $result &= DB::table('gaofill_res') -> where('f_id', $typeId) -> offset($delOption) -> limit(1) -> delete();
                break;
            case 'gapMultiFill' :
                $typeId = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                $result &= DB::table('gapfill_multi_res') -> where('f_id', $typeId) -> offset($delOption) -> limit(1) -> delete();
                break;
        }
        return $result;
    }
    //  矩阵选项删除
    public function delMatrixOption(Request $request) {
        //获取试卷ID
        $questId = \Session::get('questId');
        /*  接受要删除的数据
         *  题型  $type
         *  题型总数 $typeNum
         *  题型第几个要进项操作 $operate
         *  删除第几项 $delOption
         * */
        $direction = $request -> get('direction');
        $type = $request -> get('type');
        $operate = $request -> get('operate') - 1 ;
        $delOption = $request -> get('deloption') - 1;
        $result = 1;
        var_dump("type:".$type);
        var_dump("operate".$operate);
        var_dump("deloption".$delOption);
        switch ($type) {
            case 'matrixRadio' :
                if($direction == "row") {
                    $matrixId = DB::table('matrix_radio') -> where('quest_id', $questId) -> offset($operate) -> limit(1) -> value('id');
                    var_dump($matrixId);
                    $delId = DB::table('matrix_radio_row') -> where('f_id',$matrixId)  ->  offset($delOption) -> limit(1) -> value('id');
                    $result &= DB::table('matrix_radio_row') -> where('id',$delId)  -> delete();
                    break;
                }
                if($direction == "col") {
                    $matrixId = DB::table('matrix_radio') -> where('quest_id', $questId) -> offset($operate) -> limit(1) -> value('id');
                    $delId = DB::table('matrix_radio_col') -> where('f_id',$matrixId)  ->  offset($delOption) -> limit(1) -> value('id');
                    $result &= DB::table('matrix_radio_col') -> where('id',$delId)  -> delete();
                    break;
                }
                break;
            case 'matrixGapFill' :
                if($direction == "row") {
                    $matrixId = DB::table('matrix_gapfill') -> where('quest_id', $questId) -> offset($operate) -> limit(1) -> value('id');
                    $result &= DB::table('matrix_gapfill_row') -> where('f_id',$matrixId) -> offset($delOption) -> limit(1) -> delete();
                    break;
                }
                if($direction == "col") {
                    $matrixId = DB::table('matrix_gapfill') -> where('quest_id', $questId) -> offset($operate) -> limit(1) -> value('id');
                    $result &= DB::table('matrix_gapfill_col') -> where('f_id',$matrixId) -> offset($delOption) -> limit(1) -> delete();
                    break;
                }
                break;
            case 'matrixScore' :
                if($direction == "row") {
                    $matrixId = DB::table('matrix_score') -> where('quest_id', $questId) -> offset($operate) -> limit(1) -> value('id');
                    $result &= DB::table('matrix_score_row') -> where('f_id',$matrixId) -> offset($delOption) -> limit(1) -> delete();
                    break;
                }
                if($direction == "col") {
                    $matrixId = DB::table('matrix_score') -> where('quest_id', $questId) -> offset($operate) -> limit(1) -> value('id');
                    $result &= DB::table('matrix_score_col') -> where('f_id',$matrixId) -> offset($delOption) -> limit(1) -> delete();
                    break;
                }
                break;
        }
        return $result;
    }

    // 小题删除
    public function delAll(Request $request) {
        //接受数据
        $delNum = $request -> get('delnum') - 3;
        $delId = $request -> get('delid');
        $type = $request -> get('type');
        //  获取书卷
        $questId = \Session::get('questId');
        //  开始删除
        $result = 1;
        switch ($type) {
            case 'radio' :
                $f_id = DB::table('radio') -> where("quest_id",$questId) -> offset($delId) -> limit(1) -> value('id');
                $result &= DB::table('radio') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                $result &= DB::table('radio_res') -> where('f_id',$f_id) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'radioMulti' :
                $f_id = DB::table('radio_multi') -> where("quest_id",$questId) -> offset($delId) -> limit(1) -> value('id');
                $result &= DB::table('radio_multi') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                $result &= DB::table('radio_multi_res') -> where('f_id',$f_id) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'gapFill' :
                $result &= DB::table('gapfill') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'gapMultiFill' :
                $f_id = DB::table('gapfill_multi') -> where("quest_id",$questId) -> offset($delId) -> limit(1) -> value('id');
                $result &= DB::table('gapfill_multi') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                $result &= DB::table('gapfill_multi_res') -> where('f_id',$f_id) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'score' :
                $result &= DB::table('score') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'descr' :
                $result &= DB::table('descr') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'page' :
                $result &= DB::table('page') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'hr' :
                $result &= DB::table('hr') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'name' :
                $result &= DB::table('name') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'phone' :
                $result &= DB::table('phone') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'email' :
                $result &= DB::table('email') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'sex' :
                $result &= DB::table('sex') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'date' :
                $result &= DB::table('date') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'time' :
                $result &= DB::table('time') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'city' :
                $result &= DB::table('city') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'address' :
                $result &= DB::table('address') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'matrixRadio' :
                $f_id = DB::table('matrix_radio') -> where("quest_id",$questId) -> offset($delId) -> limit(1) -> value('id');
                $result &= DB::table('matrix_radio') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                $result &= DB::table('matrix_radio_col') -> where('f_id',$f_id) -> delete();
                $result &= DB::table('matrix_radio_row') -> where('f_id',$f_id) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'matrixScore' :
                $f_id = DB::table('matrix_score') -> where("quest_id",$questId) -> offset($delId) -> limit(1) -> value('id');
                $result &= DB::table('matrix_score') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                $result &= DB::table('matrix_score_col') -> where('f_id',$f_id) -> delete();
                $result &= DB::table('matrix_score_row') -> where('f_id',$f_id) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
            case 'matrixGapFill' :
                $f_id = DB::table('matrix_gapfill') -> where("quest_id",$questId) -> offset($delId) -> limit(1) -> value('id');
                $result &= DB::table('matrix_gapfill') -> where('quest_id', $questId) -> offset($delId) -> limit(1) -> delete();
                $result &= DB::table('matrix_gapfill_col') -> where('f_id',$f_id) -> delete();
                $result &= DB::table('matrix_gapfill_row') -> where('f_id',$f_id) -> delete();
                //  对quest里面的字符串进行删除整理
                $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
                $quest = ltrim($quest,",");
                $questArr = explode(",",$quest);
                var_dump($questArr);
                unset($questArr[$delNum]);
                var_dump("delNum:".$delNum);

                $quest = implode(",",$questArr);
                $result &= DB::table('quest') -> where('id',$questId) -> update(['quest'=>$quest]);
                break;
        }
        return $result;
    }
    //  选项添加
    public function addOption(Request $request) {
        //  接受试卷
        $questId = \Session::get('questId');
        //  接受要创建的类型
        $type = $request -> get('type');
        $title = $request -> get('title');
        $operate = $request -> get('operate');
        //  开始入库
        $result = 1;
        switch ($type) {
            case 'radio' :
                $radioId = DB::table('radio') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                $arr = array(
                    'f_id' => $radioId,
                    'content' => $title,
                );
                $result &= DB::table('radio_res') -> insert($arr);
                break;
            case 'radioMulti' :
                $radioId = DB::table('radio_multi') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                var_dump($radioId);
                $arr = array(
                    'f_id' => $radioId,
                    'content' => $title,
                );
                $result &= DB::table('radio_multi_res') -> insert($arr);
                break;
            case 'gapMultiFill' :
                $radioId = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                var_dump($radioId);
                $arr = array(
                    'f_id' => $radioId,
                    'content' => $title,
                );
                $result &= DB::table('gapfill_multi_res') -> insert($arr);
                break;
            case 'matrixRadio' :
                //  接受方向
                $direction = $request -> get('direction');
                if($direction == "row") {
                    $typeId = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                    var_dump($typeId);
                    $arr = array(
                        'f_id' => $typeId,
                        'content' => $title,
                    );
                    $result &= DB::table('matrix_radio_row') -> insert($arr);
                }
                if($direction == "col") {
                    $typeId = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                    var_dump($typeId);
                    $arr = array(
                        'f_id' => $typeId,
                        'content' => $title,
                    );
                    $result &= DB::table('matrix_radio_col') -> insert($arr);
                }
                break;
            case 'matrixGapFill' :
                //  接受方向
                $direction = $request -> get('direction');
                if($direction == "row") {
                    $typeId = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                    var_dump($typeId);
                    $arr = array(
                        'f_id' => $typeId,
                        'content' => $title,
                    );
                    $result &= DB::table('matrix_gapfill_row') -> insert($arr);
                }
                if($direction == "col") {
                    $typeId = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                    var_dump($typeId);
                    $arr = array(
                        'f_id' => $typeId,
                        'content' => $title,
                    );
                    $result &= DB::table('matrix_gapfill_col') -> insert($arr);
                }
                break;
            case 'matrixScore' :
                //  接受方向
                $direction = $request -> get('direction');
                if($direction == "row") {
                    $typeId = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                    var_dump($typeId);
                    $arr = array(
                        'f_id' => $typeId,
                        'content' => $title,
                    );
                    $result &= DB::table('matrix_score_row') -> insert($arr);
                }
                if($direction == "col") {
                    $typeId = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($operate) -> limit(1) -> value('id');
                    var_dump($typeId);
                    $arr = array(
                        'f_id' => $typeId,
                        'content' => $title,
                    );
                    $result &= DB::table('matrix_score_col') -> insert($arr);
                }
                break;
        }
        return $result;
    }
    // input无刷新上传


    //单选入库
    public function radio($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');

        //  查询radio编号
        $typeId = DB::table('type')->where("title","radio")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);

        //  获取用户信息
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');

        //  开始入库
        $title = $arrType['title'];
        $radio = array(
            'title' =>  $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $radioId = DB::table('radio') -> insertGetId($radio);

        //  遍历$arrType 创建结果
        foreach ($arrType as $key => $value) {
            $condition = preg_match("/^[A-Za-z]+$/", $key);
            if($condition == 'option') {
                $option = array(
                    'content' => $value,
                    'f_id' => $radioId
                );
                $result &= DB::table('radio_res') -> insert($option);
            }
        }

        return $result;
    }
    //  多选入库
    public function radioMulti($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","radio_multi")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;

        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $radio = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $radioId = DB::table('radio_multi') -> insertGetId($radio);
        //  遍历$arrType 创建结果
        foreach ($arrType as $key => $value) {
            $condition = preg_match("/^[A-Za-z]+$/", $key);
            if($condition == 'option') {
                $option = array(
                    'content' => $value,
                    'f_id' => $radioId
                );
                $result &= DB::table('radio_multi_res') -> insert($option);
            }
        }

        return $result;
    }
    //  填空题入库
    public function gapFill($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","gapfill")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $gapFill = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('gapfill') -> insert($gapFill);
        return $result;
    }
    //  多项填空题入库
    public function gapMultiFill($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","gapfill_multi")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $gapMultiFill = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $gapMultiFillId = DB::table('gapfill_multi') -> insertGetId($gapMultiFill);
        //遍历每个选项结果
        foreach ($arrType as $key => $value) {
            $condition = preg_match("/^[A-Za-z]+$/", $key);
            if($condition == 'gapMultiFill') {
                $option = array(
                    'content' => $value,
                    'f_id' => $gapMultiFillId,
                );
                $result &= DB::table('gapfill_multi_res') -> insert($option);
            }
        }
        return $result;
    }
    //  打分题入库
    public function score($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号
        $typeId = DB::table('type')->where("title","score")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        var_dump($arrType);
        $radio = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('score') -> insertGetId($radio);
        return $result;
    }
    //  备注说明入库
    public function descr($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号
        $typeId = DB::table('type')->where("title","descr")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $radio = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('descr') -> insertGetId($radio);
        return $result;
    }
    //  分页入库
    public function page($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');

        //  查询radio编号
        $typeId = DB::table('type')->where("title","page")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);

        //获取用户信息
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');

        //开始入库
        $radio = array(
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $radioId = DB::table('page') -> insertGetId($radio);
    }
    //  横线入库
    public function hr($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');

        //  查询radio编号
        $typeId = DB::table('type')->where("title","hr")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);

        //获取用户信息
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');

        //开始入库
        $hr = array(
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('hr') -> insert($hr);
        return $result;
    }
    //  姓名入库
    public function nameInfo($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","name")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $gapFill = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('name') -> insert($gapFill);
        return $result;
    }
    //  电话入库
    public function phone($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","phone")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $phone = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('phone') -> insert($phone);
        return $result;
    }
    //  邮箱入库
    public function email($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","email")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $email = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('email') -> insert($email);
        return $result;
    }
    //  性别入库
    public function sex($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","sex")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $sex = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('sex') -> insert($sex);
        return $result;
    }
    //  日期入库
    public function date($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","date")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $date = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('date') -> insert($date);
        return $result;
    }
    //  时间入库
    public function time($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","time")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $time = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('time') -> insert($time);
        return $result;
    }
    //  城市入库
    public function city($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","city")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $city = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('city') -> insert($city);
        return $result;
    }
    //  当前位置入库
    public function address($arrType) {
        var_dump(11111);
        //  获取问卷Id
        $questId = \Session::get('questId');
        //  查询radio编号 重新组合编号入库
        $typeId = DB::table('type')->where("title","address")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');

        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $title = $arrType['title'];
        $address = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $result &= DB::table('address') -> insert($address);
        return $result;
    }
    //  矩阵单选入库
    public function matrixRadio($arrType) {

        //  获取问卷Id
        $questId = \Session::get('questId');

        //  查询radio编号
        $typeId = DB::table('type')->where("title","matrix_radio")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);

        //  获取用户信息
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');

        //  开始入库
        $title = $arrType['title'];
        $matrixRadio = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $matrixRadioId = DB::table('matrix_radio') -> insertGetId($matrixRadio);

        //  遍历$arrType 插入数据
        foreach ($arrType as $key => $value) {
            $condition1 = preg_match("/col/", $key) ? true : false;
            $condition2 = preg_match("/row/", $key) ? true : false;
            if ($condition1 == true) {
                $option = array(
                    'content' => $value,
                    'f_id' => $matrixRadioId
                );
                $result &= DB::table('matrix_radio_col') -> insert($option);
            }
            if ($condition2 == true) {
                $option = array(
                    'content' => $value,
                    'f_id' => $matrixRadioId
                );
                $result &= DB::table('matrix_radio_row') -> insert($option);
            }
        }
        return $result;
    }
    //  矩阵分数入库
    public function matrixScore($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');

        //  查询matrix_score编号
        $typeId = DB::table('type')->where("title","matrix_score")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);

        //  获取用户信息
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');

        //  开始入库
        $title = $arrType['title'];
        $matrixScore = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $matrixScoreId = DB::table('matrix_score') -> insertGetId($matrixScore);

        //  遍历$arrType 插入数据
        foreach ($arrType as $key => $value) {
            $condition1 = preg_match("/col/", $key) ? true : false;
            $condition2 = preg_match("/row/", $key) ? true : false;
            if ($condition1 == true) {
                $option = array(
                    'content' => $value,
                    'f_id' => $matrixScoreId
                );
                $result &= DB::table('matrix_score_col') -> insert($option);
            }
            if ($condition2 == true) {
                $option = array(
                    'content' => $value,
                    'f_id' => $matrixScoreId
                );
                $result &= DB::table('matrix_score_row') -> insert($option);
            }
        }
        return $result;
    }
    //  矩阵填空入库
    public function matrixGapFill($arrType) {
        //  获取问卷Id
        $questId = \Session::get('questId');

        //  查询matrix_score编号
        $typeId = DB::table('type')->where("title","matrix_gapfill")->value('id');
        $quest = DB::table('quest') -> where('id',$questId) -> value('quest');
        $quest = $quest.",".$typeId;
        $result = DB::table('quest')->where('id',$questId) -> update(['quest'=>$quest]);

        //  获取用户信息
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');

        //  开始入库
        $title = $arrType['title'];
        $matrixGapFill = array(
            'title' => $title,
            'user_id' => $userId,
            'quest_id' => $questId,
        );
        $matrixGapFillId = DB::table('matrix_gapfill') -> insertGetId($matrixGapFill);

        //  遍历$arrType 插入数据
        foreach ($arrType as $key => $value) {
            $condition1 = preg_match("/col/", $key) ? true : false;
            $condition2 = preg_match("/row/", $key) ? true : false;
            if ($condition1 == true) {
                $option = array(
                    'content' => $value,
                    'f_id' => $matrixGapFillId
                );
                $result &= DB::table('matrix_gapfill_col') -> insert($option);
            }
            if ($condition2 == true) {
                $option = array(
                    'content' => $value,
                    'f_id' => $matrixGapFillId
                );
                $result &= DB::table('matrix_gapfill_row') -> insert($option);
            }
        }
        return $result;
    }

    //  动态修改数据
    public function toEdit(Request $request) {
        /*
         *  接受数据
        *   题型 type  公共的
        *   对几个题型进行操作 typenum  公共的
        *   选择对option或者title 进行操作  questtype  公共的
        *   如果是选项 对第几个进行操作  questtypenum  特有的
        *   更新的数据 title   公共的
        *   如果是矩阵 方向    direction  特有的
        * */
        $questId = \Session::get('questId');
        $type = $request -> get('type');
        $typeNum = $request -> get('typenum');
        $questType = $request -> get('questtype');
        $questTypeNum = $request -> get('questtypenum');
        $title = $request -> get('title');
        $direction = $request -> get('direction');
        $result = 1;
        // 开始入库修改内容
        switch ( $type ) {
            case "radio":
                //  获取要修改的Id
                $typeId = DB::table('radio') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                if($questType == "title") {
                    $result &= DB::table('radio') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                } elseif ($questType == "option") {
                    //查询要更新ID
                    $optionId =  DB::table('radio_res') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                    $result &= DB::table('radio_res') ->  where('id',$optionId) -> update(["content" => $title]);
                }
                break;
            case "radioMulti":
                //  获取要修改的Id
                $typeId = DB::table('radio_multi') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                if($questType == "title") {
                    $result &= DB::table('radio_multi') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                } elseif ($questType == "option") {
                    //查询要更新ID
                    $optionId =  DB::table('radio_multi_res') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                    $result &= DB::table('radio_multi_res') ->  where('id',$optionId) -> update(["content" => $title]);
                }
                break;
            case "gapFill":
                $typeId = DB::table('gapfill') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('gapfill') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "gapMultiFill":
                $typeId = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                if($questType == "title") {
                    $result &= DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  update(["title" => $title]);
                } elseif ($questType == "option") {
                    var_dump($questTypeNum);
                    $optionId =  DB::table('gapfill_multi_res') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                    $result &= DB::table('gapfill_multi_res') -> where('id',$optionId) ->  update(["content" => $title]);
                }
                break;
            case "score":
                $typeId = DB::table('score') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('score') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "descr":
                $typeId = DB::table('descr') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('descr') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "name":
                $num = $typeNum - 1;
                $typeId = DB::table('name') -> where('quest_id',$questId) -> offset($num) -> limit(1) ->  value('id');
                var_dump("test:".$typeId);
                var_dump("test1:".$typeNum);
                $result &= DB::table('name') -> where('quest_id',$questId) -> where('id',$typeId) -> update(["title" => $title]);
                break;
            case "phone":
                $typeId = DB::table('phone') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('phone') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "email":
                $typeId = DB::table('email') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('email') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "sex":
                $typeId = DB::table('sex') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('sex') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "date":
                $typeId = DB::table('date') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('date') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "time":
                $typeId = DB::table('time') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('time') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "city":
                $typeId = DB::table('city') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('city') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "address":

                $typeId = DB::table('address') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                $result &= DB::table('address') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                break;
            case "matrixRadio":
                $typeId = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                if($questType == "title") {
                    $result &= DB::table('matrix_radio') -> where('quest_id',$questId) -> where('id',$typeId) ->  update(["title" => $title]);
                } elseif ($questType == "option") {
                    if ($direction == "row") {
                        $optionId =  DB::table('matrix_radio_row') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                        $result &= DB::table('matrix_radio_row') -> where('id',$optionId)  -> update(["content" => $title]);
                    } elseif ($direction == "col") {
                        var_dump($questTypeNum);
                        $optionId =  DB::table('matrix_radio_col') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                        $result &= DB::table('matrix_radio_col') -> where('id',$optionId) -> update(["content" => $title]);
                    }
                }
                break;
            case "matrixScore":
                $typeId = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                if($questType == "title") {
                    $result &= DB::table('matrix_score') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  update(["title" => $title]);
                } elseif ($questType == "option") {
                    if ($direction == "row") {
                        $optionId =  DB::table('matrix_score_row') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                        $result &= DB::table('matrix_score_row') -> where('id',$optionId)  -> update(["content" => $title]);
                    } elseif ($direction == "col") {
                        $optionId =  DB::table('matrix_score_col') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                        $result &= DB::table('matrix_score_col') -> where('id',$optionId) -> update(["content" => $title]);
                    }
                }
                break;
            case "matrixGapFill":
                $typeId = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  value('id');
                if($questType == "title") {
                    $result &= DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($typeNum) -> limit(1) ->  update(["title" => $title]);
                } elseif ($questType == "option") {
                    if ($direction == "row") {
                        var_dump("questTypeNum:".$questTypeNum);
                        $optionId =  DB::table('matrix_gapfill_row') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                        $result &= DB::table('matrix_gapfill_row') -> where('id',$optionId)  -> update(["content" => $title]);
                    } elseif ($direction == "col") {
                        $optionId =  DB::table('matrix_gapfill_col') -> where('f_id',$typeId) -> offset($questTypeNum) -> limit(1) -> value('id');
                        $result &= DB::table('matrix_gapfill_col') -> where('id',$optionId) -> update(["content" => $title]);
                    }
                }
                break;
        }
        return $result;
    }
    //  动态修改标题
    public function Edit(Request $request) {
        //  接收数据
        $type = $request -> get('type');
        $content = $request -> get('content');
        $result = 1;
        //获取试卷ID
        $questId = \Session::get('questId');
        //  验证password的合法性
        if($type == "password") {
            $this -> validate($request,[
                //验证规则语法   需要验证的字段名 => '验证规则1|验证规则2|验证规则3:20|...'
                //密码，必填，长度至少是6
                'password'	=>	'min:6|max:16|alpha_dash',
            ],['content.min' => '密码 至少是6个字符']);

        }
        switch ($type) {
            case 'title' :
                $result &= DB::table('quest') -> where('id',$questId) -> update(['title'=>$content]);
                break;
            case 'title1' :
                $result &= DB::table('quest') -> where('id',$questId) -> update(['title1'=>$content]);
                break;
            case 'password' :
                $result &= DB::table('quest') -> where('id',$questId) -> update(['password'=>$content]);
                break;
        }
        return $result;
    }
}

