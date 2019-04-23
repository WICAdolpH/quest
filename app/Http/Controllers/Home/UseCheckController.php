<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UseCheckController extends Controller
{
    //使用调查问卷首页展示
    public function index() {

        //查询问卷信息
        $userName = \Session::get('userInfo');
        $userId= DB::table('user') -> where('username','test') -> value('id');
        $checkInfo = DB::table('quest') -> where('user_id',$userId) -> paginate(5);
        return view('home.useCheck.index',compact('checkInfo'));
    }

    //  创建新页面
    public function create (Request $request) {
        \Session::forget("questId");
        return redirect("/home/createcheck");
    }

    //  对已有的页面进行编辑
    public function editCheck (Request $request) {
        //  更改SEssion中的值
        \Session::put('questId',$request -> get('id'));
        return redirect("/home/createcheck");
    }

    //  删除试卷
    public function delAll(Request $request){
        //  接受要删除的试卷ID
        $id = $request -> get('id');
        //  获取题型进行相应的删除操作
        $quest = DB::table('quest') -> where('id',$id) -> get() -> toArray();
        $quest = $quest[0];
        $typeId = $quest->quest;
        //  整理数据
        $type = ltrim($typeId,",");
        $typeId = explode(',',$type);
        $result = 1;
        $result &= DB::table('quest') -> where('id',$id) -> delete();
        foreach ($typeId as $value) {
            //  进行判断然后删除
            $type = DB::table('type') -> where('id',$value) -> value('title');
            switch ($type) {
                case "radio" :
                    $resultId = DB::table('radio') -> where('quest_id',$id) -> pluck('id');
                    $result &= DB::table('radio') -> where('quest_id',$id) -> delete();
                    foreach ($resultId as $val) {
                        $result &= DB::table('radio_res') -> where('f_id',$val) -> delete();
                    }
                    break;
            }
        }
        return $result;
    }
}
