<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;
use function MongoDB\BSON\toJSON;
use Auth;

class ParticipateCheckController extends Controller
{
    //  参与调查首页
    public function index(Request $request) {
        //  开启闪存
        $request->flash();
        if (!$request -> get('title')) {
            //  从数据取数据，加载页面
            $quest = DB::table("quest") -> where('statue',0)-> paginate(6);
            foreach ($quest as $key => $value) {
                $userId = $value -> user_id;
                $name = DB::table('user') -> where('id',$userId) -> value('name');
                $quest[$key] -> name = $name;
            }
            return view('home.participate.index',compact('quest'));
        } else {
            //  从数据取数据，加载页面
            $quest = DB::table("quest") -> where('statue',0)-> paginate(6);
            foreach ($quest as $key => $value) {
                $userId = $value -> user_id;
                $name = DB::table('user') -> where('id',$userId) -> where('title',"like",'%'.$request->get('title')."%") -> value('name');
                $quest[$key] -> name = $name;
            }
            return view('home.participate.index',compact('quest'));
        }

    }

    //  参与调查
    public function toParticipate(Request $request) {
        $username = \Session::get("userInfo");
        $userId = DB::table('user') -> where('username',$username) -> value('id');
        //  展现调查页面
        $questionnaire = "";
        $result = 1;
        $questId = $request -> get('id');
        $quest = DB::table('quest') -> where('id',$questId) -> get() -> toArray();
        $quest = $quest[0];
        //  把题型整合成数组
        $questArr = $quest -> quest;
        $questArr = ltrim($questArr,",");
        $questArr = explode(",",$questArr);
        $questOption = array();
        $quest1 = $quest;
        $title = DB::table('quest') -> where('id',$questId) -> value("title");
        $title1 = DB::table('quest') -> where('id',$questId) -> value('title1');
        $quest_title = $title;
        $quest_title1 = $title1;
        //$quest_title = json_encode($quest_title);
        //dd($quest_title);
        //dd($questArr);
        $typeNum = 0;
        if(count($questArr)==0) {
            return view("home.participate.toParticipate",compact(["quest","questionnaire",'quest_title','quest_title1','questId','userId']));
        } else {
            foreach ($questArr as $key => $value) {
                $type = DB::table('type') -> where('id',$value) -> value('title');
                $num = 0;
                for($i=0; $i<$key; $i++) {
                    if($questArr[$i] == $value) {
                        $num++;
                    }
                }
                switch ( $type ) {
                    case 'radio' :
                        $typeId = DB::table('radio') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('radio') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $option = DB::table('radio_res') -> where('f_id',$typeId) -> pluck('content');
                        $arr = "type:radio|title:{$title}";
                        foreach ($option as $key => $value) {
                            $arr = $arr."|option".$key.":{$value}";
                        }
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'radio_multi' :
                        $typeId = DB::table('radio_multi') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('radio_multi') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $option = DB::table('radio_multi_res') -> where('f_id',$typeId) -> pluck('content');
                        $arr = "type:radioMulti|title:{$title}";
                        foreach ($option as $key => $value) {
                            $arr = $arr."|option".$key.":{$value}";
                        }
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'gapfill' :
                        $typeId = DB::table('gapfill') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('gapfill') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $option = DB::table('gapfill_res') -> where('f_id',$typeId) -> pluck('content');
                        $arr = "type:gapFill|title:{$title}";
                        foreach ($option as $key => $value) {
                            $arr = $arr."|option".$key.":{$value}";
                        }
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'gapfill_multi' :
                        $typeId = DB::table('gapfill_multi') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('gapfill_multi') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $option = DB::table('gapfill_multi_res') -> where('f_id',$typeId) -> pluck('content');
                        $arr = "type:gapMultiFill|title:{$title}";
                        foreach ($option as $key => $value) {
                            $arr = $arr."|option".$key.":{$value}";
                        }
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'score' :
                        $typeId = DB::table('score') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('score') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:score|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'descr' :
                        $typeId = DB::table('descr') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('descr') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:descr|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'page' :
                        $typeId = DB::table('page') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
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
                        $typeId = DB::table('hr') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $arr = "type:hr";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'name' :
                        $typeId = DB::table('name') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('name') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:name|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'phone' :
                        $typeId = DB::table('phone') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('phone') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:phone|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'email' :
                        $typeId = DB::table('email') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('email') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:email|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'sex' :
                        $typeId = DB::table('sex') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('sex') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:sex|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'date' :
                        $typeId = DB::table('date') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('date') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:date|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'time' :
                        $typeId = DB::table('time') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('time') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:time|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'city' :
                        $typeId = DB::table('city') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('city') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:city|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case 'address' :
                        $typeId = DB::table('address') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('address') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
                        $arr = "type:address|title:{$title}";
                        $questionnaire = $questionnaire.$arr.",";
                        break;
                    case  'matrix_radio' :
                        $typeId = DB::table('matrix_radio') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('matrix_radio') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
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
                        $typeId = DB::table('matrix_score') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('matrix_score') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
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
                        $typeId = DB::table('matrix_gapfill') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('id');
                        $title = DB::table('matrix_gapfill') -> where('quest_id',$questId)-> orderBy('id') -> offset($num) -> limit(1) -> value('title');
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
        }
        $typeNum = $typeNum==0 ? 1 : $typeNum;

        //dd($typeNum);
        return view("home.participate.toParticipate",compact(["quest","questionnaire",'quest_title','quest_title1','userId','typeNum']));
    }

    public function outPutJson($data, $code = 200, $message = NULL) {
        $message = $message ?? config('response_code')[$code];
        return \Response::json(['message' => $message, 'status_code' => $code, 'data' => $data]);
    }


    //用户数据保存

    public function saveCheck(Request $request) {
        //  接收数据
        $checkInfo = $request -> get('checkInfo');
        $page = $request -> get('page');
        $questId = $request -> get('questId');
        /*var_dump("checkInfo:".$checkInfo);
        var_dump("page:".$page);*/
        //var_dump("questId:".$questId);
        //  开启闪存
        //\Session::forget("oldArr");
        $sign = 0;
        $request->flash();
        $oldArr = \Session::get("oldArr") ?? [];

        $oldArr1 = [
            "page" => $page,
            "checkInfo" => old('checkInfo'),
            'questId' => $questId
        ];
        //dd($oldArr1);
        //var_dump($page);
        foreach ($oldArr as $key => &$value) {
            if(isset($value['page'])) {
                if($page == $value['page'] && $value['page'] != "null" && $questId == $value['questId']) {
                    $value['checkInfo'] = old('checkInfo');
                    $sign = 1;
                    //var_dump("jin");
                }
            }
        }
        unset($value);
        //var_dump($oldArr);
        if($sign == 1) {
            \Session::forget("oldArr");
            \Session::put(["oldArr"=>$oldArr]);
        } elseif($sign == 0) {
            $oldArr[] = $oldArr1;
            \Session::put(["oldArr"=>$oldArr]);
        }

        //  用户信息
        $userName = \Session::get("userInfo");
        $userId = DB::table("user") -> where("username",$userName) -> value('id');
        $userId = Auth::user()->id;
        //  对数据进行整理
        $checkInfo = ltrim($checkInfo,",");
        $checkInfoArr = explode(",",$checkInfo);
        $checkInfoArr1 = $checkInfoArr;
        $result = 1;
        //dd($checkInfoArr1);
        if($checkInfo) {
            foreach ($checkInfoArr1 as $num1 => $value) {
                $arrType = [];
                $value = rtrim($value,"|");
                $value = explode("|",$value);
                foreach ($value as $val) {
                    $val = explode(":",$val);
                    $arrType[$val[0]] = $val[1];
                }

                //  数据格式验证 和 保存
                switch($arrType['type']) {
                    case 'radio' :
                        //  数据认证

                        //  判断第几个
                        $num = 0;
                        $typeArr = $this->typeNum($questId);
                        //var_dump($typeArr);
                        foreach ($typeArr as $key => $value1) {
                            if($key < $page) {
                                foreach ($value1 as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        //  获取radioId
                        $radioId = DB::table("radio") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");

                        //  清楚用户现有的投票
                        $idSet = DB::table("radio_res") -> where("f_id",$radioId) -> pluck("id");
                        foreach ($idSet as $val) {
                            $voter = DB::table("radio_res") -> where('id',$val) -> value('voter_id');
                            $voter = str_replace(",".$userId,"",$voter);
                            $result &= DB::table("radio_res") -> where('id',$val) -> update(["voter_id"=>$voter]);
                        }
                        $val = 0;
                        foreach ($arrType as $options => $optionVal) {
                            preg_match_all("/(option)/",$options,$option1);
                            $option1 = implode("",$option1[0]);
                            if($option1 == "option") {
                                preg_match("/\d+/",$options,$optionNum);
                                //$optionNum = implode("",$optionNum[0]);
                                $optionNum = $optionNum[0] - 1;
                                $val |= (int)$optionVal;

                                if($optionVal == 1) {
                                    $resultId = DB::table("radio_res") -> where('f_id',$radioId)->orderBy('f_id') -> offset($optionNum) -> limit(1) -> value("id");
                                    $voter = DB::table("radio_res") -> where('f_id',$radioId)->orderBy('f_id') -> offset($optionNum) -> limit(1) -> value("voter_id");
                                    $voter = $voter.",".$userId;
                                    $result &= DB::table("radio_res") -> where('id',$resultId) -> update(["voter_id"=>$voter]);
                                }
                            }
                        }
                        //  数据验证
                        $arr = [
                            'val' => $val
                        ];
                        $rules = [
                            'val' => "regex:/1/"
                        ];
                        $num2 = $num1 + 1;
                        $message = [
                            'regex' => "请完成第{$num2}道选择"
                        ];
                        // 使用laravel的表单验证
                        $validator = \Validator::make($arr,$rules,$message);

                        if ($validator->passes()) {
                            break;
                        } else {
                            $validatorErrs = $validator->errors()->all();
                            $errMessages = ['status' => 422, 'msg' => $validatorErrs];
                            return response()->json([ 'status'=>'422', 'msg' => $validator->errors()->first() ]);
                        }
                    // 具体查看laravel的核心类

                    case 'radioMulti' :
                        //  判断第几个
                        $num = 0;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value) {
                            if($key < $page) {
                                foreach ($value as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        //  获取radioId
                        $radioId = DB::table("radio_multi") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");

                        //  清楚用户现有的投票
                        $idSet = DB::table("radio_multi_res") -> where("f_id",$radioId) -> pluck("id");
                        foreach ($idSet as $val) {
                            $voter = DB::table("radio_multi_res") -> where('id',$val) -> value('voter_id');
                            $voter = str_replace(",".$userId,"",$voter);
                            $result &= DB::table("radio_multi_res") -> where('id',$val) -> update(["voter_id"=>$voter]);
                        }
                        $val = 0;

                        foreach ($arrType as $options => $optionVal) {
                            preg_match_all("/(option)/",$options,$option1);
                            $option1 = implode("",$option1[0]);

                            $val = $val|(int)$optionVal;
                            if($option1 == "option") {
                                preg_match("/\d+/",$options,$optionNum);
                                //$optionNum = implode("",$optionNum[0]);
                                $optionNum = $optionNum[0] - 1;
                                if($optionVal == 1) {
                                    $resultId = DB::table("radio_multi_res") -> where('f_id',$radioId)->orderBy('id') -> offset($optionNum) -> limit(1) -> value("id");
                                    $voter = DB::table("radio_multi_res") -> where('f_id',$radioId)->orderBy('id') -> offset($optionNum) -> limit(1) -> value("voter_id");
                                    $voter = $voter.",".$userId;
                                    $result &= DB::table("radio_multi_res") -> where('id',$resultId) -> update(["voter_id"=>$voter]);
                                }
                            }
                        }
                        //  数据验证
                        $arr = [
                            'val' => $val
                        ];

                        $rules = [
                            'val' => 'min:1'
                        ];
                        $num2 = $num1 + 1;
                        $message = [
                            'regex' => "请完成第{$num2}道多选选择"
                        ];
                        // 使用laravel的表单验证
                        $validator = \Validator::make($arr,$rules,$message);

                        if ($validator->passes()) {
                            break;
                        } else {
                            $validatorErrs = $validator->errors()->all();
                            $errMessages = ['status' => 422, 'msg' => $validatorErrs];
                            return $val;
                            return response()->json([ 'status'=>'422', 'msg' => $validator->errors()->first() ]);
                        }
                        break;
                    case 'gapFill' :

                        //  判断第几个
                        $num = 0;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value1) {
                            if($key < $page) {
                                foreach ($value1 as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        //$num = $num -1 ;
                        //  数据判断
                        $num2 = $num1 +1;
                        if($arrType['option'] == null) {
                            return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                        }
                        //  获取radioId
                        $radioId = DB::table("gapfill") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $voterId = DB::table("gapfill") ->  where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("voter_id");

                        $bool = strpos($voterId,(string)$userId);
                        //if ($num1 == 1) dd($num1,$bool);

                        //dd($arrType);
                        //dd($bool);
                        if($bool !== false) {
                            //  如果投票用户存在则直接修改数据
                            $result &= DB::table("gapfill_res") -> where('f_id',$radioId) -> update(['content'=>$arrType['option']]);
                        } else if($bool === false) {
                            //  如果投票用户不存在创建数据
                            $arr = [
                                'content' => $arrType['option'],
                                "f_id" => $radioId,
                                "voter_id" => $userId
                            ];
                            $result &=  $curId = DB::table("gapfill_res") -> insertGetId($arr);
                            $voterId .= ",".$userId;
                            $result &= DB::table("gapfill") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> update(["voter_id"=>$voterId]);
                        }

                        var_dump($curId,$num1);

                        break;
                    case "gapMultiFill" :
                        //  判断第几个
                        $num = -1;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value) {
                            if($key < $page) {
                                foreach ($value as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        //  获取radioId
                        $radioId = DB::table("gapfill_multi") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $num2 = $num1 +1;
                        foreach ($arrType as $options => $optionVal) {
                            if($optionVal == null) {
                                return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                            }
                            preg_match_all("/(option)/",$options,$option1);
                            $option1 = implode("",$option1[0]);
                            if($option1 == "option") {
                                preg_match("/\d+/",$options,$optionNum);
                                //$optionNum = implode("",$optionNum[0]);
                                $optionNum = $optionNum[0] - 1;
                                //var_dump($radioId);
                                $resultId = DB::table("gapfill_multi_res") -> where("f_id",$radioId)->orderBy('id') -> offset($optionNum) -> limit(1) -> value('id');
                                // 接受voter 看是否投过票 没有则创建 否则修改
                                $voterId = DB::table("gapfill_multi_res") -> where("f_id",$radioId)->orderBy('id') -> offset($optionNum) -> limit(1) -> value('voter_id');
                                $bool = strpos($voterId,",".$userId);
                                if($bool === false) {
                                    //  创建
                                    $arr = [
                                        "f_id" => $resultId,
                                        "content" => $optionVal,
                                        'voter_id' => $userId
                                    ];
                                    $voterId .= ",".$userId;
                                    $result &= DB::table("gapfill_multi_res")  -> where("id",$resultId) -> update(["voter_id"=>$voterId]);
                                    $result &= DB::table("gapfill_multi_content") -> insert($arr);
                                } elseif($bool !== false) {
                                    //  直接跟新数据
                                    $result &= DB::table("gapfill_multi_content") -> where("f_id",$resultId) -> where('voter_id',$userId) ->update(["content"=>$optionVal]);
                                }
                            }
                        }
                        break;
                    case 'score' :
                        //  判断第几个
                        $num = 0;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value1) {
                            if($key < $page) {
                                foreach ($value1 as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $arrType['sum'];
                        //$num = $num -1 ;
                        //  数据判断
                        $num2 = $num +1;
                        if($arrType['option'] == null) {
                            return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                        }
                        //  获取radioId
                        $radioId = DB::table("score") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $voterId = DB::table("score") ->  where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("voter_id");
                        $bool = strpos($voterId,(string)$userId);
                        var_dump($radioId,$bool);
                        if($bool !== false) {
                            //  如果投票用户存在则直接修改数据
                            var_dump("***");

                            $result &= DB::table("score_res") -> where('f_id',$radioId) ->limit(1)-> update(['content'=>$arrType['option']]);
                        } else{
                            //  如果投票用户不存在创建数据
                            $arr = [
                                'content' => $arrType['option'],
                                "f_id" => $radioId,
                                "voter_id" => $userId
                            ];
                            $result &= DB::table("score_res") -> insert($arr);
                            $voterId .= ",".$userId;
                            $curId = DB::table("score") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1)->value('id');
                            $result &= DB::table("score") -> where("id",$curId)->update(["voter_id"=>$voterId]);
                        }

                        break;
                    case 'name' :
                        //  判断第几个
                        $num = -1;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value) {
                            if($key < $page) {
                                foreach ($value as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        $num = $num - 1;
                        //  获取radioId
                        $radioId = DB::table("name") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $voterId = DB::table("name") ->  where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("voter_id");
                        $bool = strpos($voterId,",".$userId);
                        $num2 = $num1 +1;
                        if($arrType['option'] == null) {
                            return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                        }

                        if($bool !== false) {
                            //  如果投票用户存在则直接修改数据
                            $result &= DB::table("name_res") -> where('id',$userId) -> update(['content'=>$arrType['option']]);
                        } else if($bool === false){
                            //  如果投票用户不存在创建数据
                            $arr = [
                                'id' => $userId,
                                'content' => $arrType['option']
                            ];
                            $result &= DB::table("name_res") -> insertGetId($arr);
                            $voterId .= ",".$userId;
                            $result &= DB::table("name") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> update(["voter_id"=>$voterId]);
                        }
                        break;
                    case 'date' :

                        //  判断第几个
                        $num = 0;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value1) {
                            if($key < $page) {
                                foreach ($value1 as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        $num = $num -1 ;
                        //  数据判断
                        $num2 = $num1 +1;
                        if($arrType['option'] == null) {
                            return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                        }
                        //  获取radioId
                        $radioId = DB::table("date") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $voterId = DB::table("date") ->  where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("voter_id");
                        $bool = strpos($voterId,",".$userId);

                        if($bool !== false) {
                            //  如果投票用户存在则直接修改数据
                            $result &= DB::table("date_res") -> where('f_id',$radioId) -> update(['content'=>$arrType['option']]);
                        } else if($bool === false){
                            //  如果投票用户不存在创建数据
                            $arr = [
                                'content' => $arrType['option'],
                                "f_id" => $radioId,
                                "voter_id" => $userId
                            ];
                            $result &= DB::table("date_res") -> insertGetId($arr);
                            $voterId .= ",".$userId;
                            $result &= DB::table("date") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> update(["voter_id"=>$voterId]);
                        }

                        break;
                    case 'matrixRadio' :
                        //  判断第几个
                        $num = -1;
                        $val = 0;
                        $val2=0;
                        $typeArr = $this->typeNum($questId);

                        foreach ($typeArr as $key => $value) {
                            if($key < $page) {
                                foreach ($value as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        $num = $num + 1;

                        //  获取radioId
                        $radioId = DB::table("matrix_radio") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $voterId =  DB::table("matrix_radio") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("voter_id");
                        $bool = strpos($voterId,",".$userId);
                        if($bool === false) {
                            $voterId .= ",".$userId;
                            $result = DB::table('matrix_radio') -> where('id',$radioId) -> update(['voter_id'=>$voterId]);
                        }

                        //  清除数据
                        $result &= DB::table('matrix_radio_content') -> where('f_id',$radioId) -> where('voter_id',$userId) -> delete();
                        $maxRow = 0;
                        $maxCol = 0;
                        $countCol = 0;
                        //var_dump($arrType);
                        foreach ($arrType as $optionKey => $optionVal) {
                            preg_match_all("/\d+\.\d+/",$optionKey,$arr);
                            preg_match_all("/0\.\d+/",$optionKey,$val1);
                            $val1 = implode("",$val1[0]);
                            $arr = implode("",$arr[0]);
                            $arrCor = explode('.',$arr);

                            //var_dump($arr);


                            if(count($arrCor) == 2) {
                                if($maxRow <= $arrCor[0]) {
                                    $maxRow = $arrCor[0];
                                }
                                if($maxCol <= $arrCor[1]) {
                                    $maxCol = $arrCor[1];
                                }
                            }



                            /* if (count($val) == 2) {

                                    if($maxRow <= $val[0]) {
                                        $maxRow = $k;
                                    }
                                    if($maxCol <= $val[1]) {
                                        $maxCol = $val;
                                    }
                                }*/
                            //  开始存值

                            if(isset($arrType[$arr])) {
                                $val2++;
                                $content = [
                                    'coordinates' => $arr,
                                    'content' => $arrType[$arr],
                                    'f_id' => $radioId,
                                    'voter_id' => $userId
                                ];
                                //var_dump($arrType[$arr]);
                                if($arrType[$arr] == "1") {
                                    $countCol++;
                                    //var_dump("val1:".$countCol);
                                    $resultId = DB::table("matrix_radio_content") -> insert($content);
                                }

                            }
                        }
                        $num2 = $num1 +1;
                        //var_dump($maxCol.":".$countCol);
                        $maxCol1 = $maxCol + 1;
                        if($maxCol1 != $countCol) {
                            return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                        }
                        break;
                    case 'matrixGapFill' :
                        //  判断第几个
                        $num = -1;
                        $val = 0;
                        $val1 = 0;
                        $val2 = 0;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value) {
                            if($key < $page) {
                                foreach ($value as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        $num = $num + 1;
                        //  获取radioId
                        $radioId = DB::table("matrix_gapfill") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $voterId =  DB::table("matrix_gapfill") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("voter_id");
                        $bool = strpos($voterId,",".$userId);
                        if($bool === false) {
                            $voterId .= ",".$userId;
                            $result &= DB::table('matrix_gapfill') -> where('id',$radioId) -> update(['voter_id'=>$voterId]);
                        }
                        //  清除数据
                        $result &= DB::table('matrix_gapfill_content') -> where('f_id',$radioId) -> where('voter_id',$userId) -> delete();
                        foreach ($arrType as $optionKey => $optionVal) {
                            preg_match_all("/\d+\.\d+/",$optionKey,$arr);


                            $arr = implode("",$arr[0]);
                            //var_dump($arrType);
                            //  开始存值
                            if(isset($arrType[$arr])) {
                                $val2++;
                                $content = [
                                    'coordinates' => $arr,
                                    'content' => $arrType[$arr],
                                    'f_id' => $radioId,
                                    "voter_id" => $userId
                                ];
                                if($arrType[$arr] != "undefined" && $arrType[$arr] != null) {
                                    $val1++;
                                    $resultId = DB::table("matrix_gapfill_content") -> insert($content);
                                }
                            }

                        }
                        $num2 = $num1 +1;
                        if($val1 != $val2) {
                            return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                        }
                        break;
                    case 'matrixScore' :
                        //  判断第几个
                        $num = -1;
                        $val1 = 0;
                        $val2 =0;
                        $val = 0;
                        $typeArr = $this->typeNum($questId);
                        foreach ($typeArr as $key => $value) {
                            if($key < $page) {
                                foreach ($value as $val) {
                                    if($val == 1) {
                                        $num++;
                                    }
                                }
                            }
                        }
                        $num = $num+$arrType['sum'];
                        $num = $num + 1;
                        //  获取radioId
                        $radioId = DB::table("matrix_score") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("id");
                        $voterId =  DB::table("matrix_score") -> where("quest_id",$questId)->orderBy('id') -> offset($num) -> limit(1) -> value("voter_id");
                        $bool = strpos($voterId,",".$userId);
                        if($bool === false) {
                            $voterId .= ",".$userId;
                            $result &= DB::table('matrix_score') -> where('id',$radioId)  -> update(['voter_id'=>$voterId]);
                        }
                        //  清除数据
                        $result &= DB::table('matrix_score_content') -> where('f_id',$radioId) ->  where('voter_id',$userId) -> delete();
                        foreach ($arrType as $optionKey => $optionVal) {
                            preg_match_all("/\d+\.\d+/",$optionKey,$arr);
                            $arr = implode("",$arr[0]);
                            //  开始存值
                            if(isset($arrType[$arr])) {
                                $val2++;
                                $content = [
                                    'coordinates' => $arr,
                                    'content' => $arrType[$arr],
                                    'f_id' => $radioId,
                                    'voter_id' => $userId
                                ];
                                if($arrType[$arr] != "undefined" && $arrType[$arr] != null) {
                                    $val1++;
                                    $resultId = DB::table("matrix_score_content") -> insert($content);
                                }
                            }

                        }
                        //var_dump($val1.":".$val2);
                        $num2 = $num1 +1;
                        if($val1 != $val2) {
                            return response()->json([ 'status'=>'422', 'msg' => "请完成第{$num2}道题"]);
                        }
                        break;
                }
            }
        }
        //var_dump(111);
        return response()->json(["oldArr"=>$oldArr]);
    }

    public function typeNum($questId) {
        $type = DB::table("quest") -> where("id",$questId) -> value("quest");
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
