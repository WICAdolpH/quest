<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin\Quest;

class QuestController extends Controller
{

    public function show(Request $request)
    {
        return view('admin.quest.index');
    }

    public function list(Request $request)
    {
        $limit = $request->input('limit');
        $name = $request->input('name');
        $quest = Quest::query();
        if ($name) {
            $quest = $quest->where('title', 'like', "%{$name}%");
        }
        $quest= $quest->paginate($limit);
        $data = [
            'code' => 0,
            'msg' => '',
            'count' => $quest->total(),
            'data' => $quest->toArray()['data']
        ];
//        dd($data);
        return response()->json($data);
        dd($quest);
    }

    public function del(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'code' => 0,
            'msg' => '',
            'count' => 0,
            'data' => []
        ];

        try {
            Quest::find($id)->delete();
        } catch (Exception $e) {
            $data['code'] = 1;
            $data['msg'] = "删除失败 请重试";
        }
        return response()->json($data);

    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $statue = $request->input('statue');
        $password = $request->input('password');

        $quest = Quest::find($id);
        $quest->statue = $statue;
        $quest->password = $statue;
        $quest->save();
    }

    public function questAnalysis()
    {
        $quest = Quest::all();
        $arr = [];
        foreach ($quest as $k => $v) {
            $arr[$k][] = $v->title ?? "";
            $voterId = trim($v->voter_id, ",");
            $voterId = explode(',', $voterId);
            if ($voterId == "") $arr[$k]['count'] = 0;
            $voterCount = count($voterId);
            $arr[$k][] = $voterCount;

        }
        $countArr = array_column($arr,'1');
        array_multisort($countArr,SORT_DESC,$arr);
        $data = array_slice($arr,0,10);

        $param = [
            'data' => json_encode($data)
        ];
        return view('admin.quest.analysis',$param);
    }

    public function questAnalysis1(Request $request)
    {
        $quest = Quest::all();
        $arr = [];
        foreach ($quest as $k => $v) {
            $arr[$k]['name'] = $v->title ?? "";
            $voterId = trim($v->voter_id, ",");
            $voterId = explode(',', $voterId);
            if ($voterId == "") $arr[$k]['count'] = 0;
            $voterCount = count($voterId);
            $arr[$k]['count'] = $voterCount;

        }
        $countArr = array_column($arr,'count');
        array_multisort($countArr,SORT_DESC,$arr);
        $data = array_slice($arr,0,10);
        return response()->json($data);
    }
}
