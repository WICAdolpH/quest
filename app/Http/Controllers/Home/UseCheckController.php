<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use App\Exports\UsersExport;

class UseCheckController extends Controller
{
    //使用调查问卷首页展示
    public function index(Request $request) {
        if (!$request->get('title')) {
            //查询问卷信息
            $userName = \Session::get('userInfo');
            $userId= DB::table('user') -> where('username',$userName) -> value('id');
            $checkInfo = DB::table('quest') -> where('user_id',$userId) -> orderBy('created_at')->paginate(5);
            return view('home.useCheck.index',compact('checkInfo'));
        } else {
            //查询问卷信息
            $userName = \Session::get('userInfo');
            $userId= DB::table('user') -> where('username',$userName) -> value('id');
            $checkInfo = DB::table('quest') -> where('user_id',$userId) -> where('title',"like",'%'.$request->get('title')."%") -> paginate(5);
            return view('home.useCheck.index',compact('checkInfo'));
        }


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

    //  试卷发布状态修改
    public function pub_status(Request $request) {
        //  数据接受
        $questId = $request->get('id');
        $pub_status = $request->get('pub_status');
        $statue = 1 - $pub_status;
        // 更新数据
        $result = \DB::table('quest') -> where('id',$questId) -> update(['statue'=>$statue]);

        if ($result ) {
            //  如果状态是从发布变为未发布 则数据全部删除
            $result = 1;
            if ($pub_status == 0) {
                //  单选数据删除
                $option = DB::table('radio') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('radio_res') -> where('f_id',$optionId) ->update(['voter_id'=>null]);
                }
                //  多选数据删除
                $option = DB::table('radio_multi') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('radio_multi_res') -> where('f_id',$optionId) ->update(['voter_id'=>null]);
                }
                //  填空题删除
                $option = DB::table('gapfill') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('gapfill_res') -> where('f_id',$optionId) ->delete();
                }
                //  多项填空题删除
                $option_res = DB::table('gapfill') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option_res as $optionId) {
                    $option_content_id = DB::table('gapfill_res') -> where('f_id',$optionId) -> pluck('id');
                    foreach ($option_content_id as $option_content) {
                        $result &= DB::table('gapfill_multi_content') -> where('f_id',$option_content) -> delete();
                    }
                }
                //  分数题删除
                $option = DB::table('score') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('score_res') -> where('f_id',$optionId) ->delete();
                }
                //  名字删除
                $option = DB::table('name') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('name_res') -> where('f_id',$optionId) ->delete();
                }
                //  矩阵填空
                $option = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('matrix_gapfill_content') -> where('f_id',$optionId) ->delete();
                }
                //  矩阵分数
                $option = DB::table('matrix_score') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('matrix_score_content') -> where('f_id',$optionId) ->delete();
                }
                //  矩阵单选
                $option = DB::table('matrix_radio') -> where('quest_id',$questId) -> pluck('id');
                foreach ($option as $optionId) {
                    $result &= DB::table('matrix_radio_content') -> where('f_id',$optionId) ->delete();
                }
                //  投票人删除
                $result &= DB::table('quest') -> where('id',$questId) -> update(['voter_id'=>null]);
            }
            return 1;
        } else {
            return response() -> json(['msg'=>"发生错误",'status'=>422]);
        }
    }

    //  试卷导出
    public function export_quest(Request $request) {
        $questId = $request -> get('id');
        //excel表格数据的数据内容（第一行是表头）
        return Excel::download(new UsersExport($questId),'users.xlsx');
    }
}
