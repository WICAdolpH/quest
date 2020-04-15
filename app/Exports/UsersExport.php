<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class UsersExport implements FromCollection,WithHeadings
{

    public function headings(): array
    {
        return [
            '序号',
            '题干',
            '分值',
            '选项',
            '正确答案',
            '添加时间'
        ];
    }
    public $quest = 0;
    public function __construct($questId)
    {
        $this->quest = $questId;
    }


    //  第几个进行判断
    public function typeNum($checkData,$type,$key) {
        $num = -1;
        foreach ($checkData as $typeKey => $tyeNum) {
            if ($typeKey <= $key && $tyeNum == $type) {
                $num++;
            }
        }
        return $num;
    }

    public function collection()
    {
        //  查询所有题
        $questId = $this->quest;
        $checkData = DB::table('quest') -> where('id',$questId) -> value('quest');
        $checkData = trim($checkData, ",");
        $checkData = explode(",", $checkData);
        $questData = [];
        foreach ($checkData as $questNum => $questType) {
            //  数据整合
            switch ($questType) {
                //  单选题
                case "1" :
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(单选题)";
                    $dataArr[] = "投票情况";
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $optionId = DB::table('radio_res') -> where('f_id',$resId) -> pluck('id');
                    foreach ($optionId as $optionKey => $option) {
                        $dataArr = [];
                        $dataArr[] = "";
                        $dataArr[] = $scort;
                        $dataArr[] = DB::table('radio_res') -> where('id', $option) -> value('content');
                        $voterNum = DB::table('radio_res') -> where('id', $option) -> value('voter_id');
                        $voterNum = count($voterNum);
                        $dataArr[] = $voterNum;
                        $questData[] = $dataArr;
                    }
                    break;
                case "2" :
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('radio_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(多选题)";
                    $dataArr[] = "投票情况";
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('radio_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $optionId = DB::table('radio_multi_res') -> where('f_id',$resId) -> pluck('id');
                    foreach ($optionId as $optionKey => $option) {
                        $dataArr = [];
                        $dataArr[] = "";
                        $dataArr[] = $scort;
                        $dataArr[] = DB::table('radio_multi_res') -> where('id', $option) -> value('content');
                        $voterNum = DB::table('radio_multi_res') -> where('id', $option) -> value('voter_id');
                        $voterNum = count($voterNum);
                        $dataArr[] = $voterNum;
                        $questData[] = $dataArr;
                    }
                    break;
                //  填空题
                case "7" :
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(填空题)";
                    $questData[] = $dataArr;
                    $dataArr = [
                        "",
                        "",
                        "答题情况"
                    ];
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('gapfill') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("id");
                    $optionId = DB::table('gapfill_res') -> where('f_id', $resId) -> pluck('id');
                    foreach ($optionId as $optionKey => $option) {
                        $dataArr = [];
                        $dataArr[] = "";
                        $dataArr[] = $scort;
                        $dataArr[] = DB::table('gapfill_res') -> where('id',$option) -> value('content');
                    }
                    break;
                case "8":
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(多项填空题)";
                    $questData[] = $dataArr;
                    //  小项整理
                    $resId = DB::table('gapfill_multi') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('id');
                    $resMultiId = DB::table('gapfill_multi_res') -> where('f_id',$resId)  -> pluck('id');
                    foreach ($resMultiId as $resMultiKey => $resMulti) {
                        $dataArr = [
                            "",
                            DB::table('gapfill_multi_res') -> where('id',$resMulti) -> value('content'),
                            "填空情况"
                        ];
                        $questData[] = $dataArr;
                        $optionId = DB::table('gapfill_multi_content') -> where('f_id',$resMulti) -> pluck('id');
                        foreach ($optionId as $optionKey => $option) {
                            $optionNum = $optionKey + 1;
                            $dataArr = [];
                            $dataArr[] = "";
                            $dataArr[] = $optionNum;
                            $dataArr[] = DB::table('gapfill_multi_content') -> where('id',$option) -> value('content');
                            $questData[] = $dataArr;
                        }
                    }
                    break;
                case "9" :
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(填空题)";
                    $questData[] = $dataArr;
                    $dataArr = [
                        "",
                        "",
                        "答题情况"
                    ];
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('score') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("id");
                    $optionId = DB::table('score_res') -> where('f_id', $resId) -> pluck('id');
                    foreach ($optionId as $optionKey => $option) {
                        $dataArr = [];
                        $dataArr[] = "";
                        $dataArr[] = $scort;
                        $dataArr[] = DB::table('score_res') -> where('id',$option) -> value('content');
                    }
                    break;
                case "15" :
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('name') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(名字)";
                    $questData[] = $dataArr;
                    $dataArr = [
                        "",
                        "",
                        "答题情况"
                    ];
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('name') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("id");
                    $optionId = DB::table('name_res') -> where('f_id', $resId) -> pluck('id');
                    foreach ($optionId as $optionKey => $option) {
                        $dataArr = [];
                        $dataArr[] = "";
                        $dataArr[] = $scort;
                        $dataArr[] = DB::table('name_res') -> where('id',$option) -> value('content');
                    }
                    break;
                case "19":
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('date') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(日期题)";
                    $questData[] = $dataArr;
                    $dataArr = [
                        "",
                        "",
                        "答题情况"
                    ];
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('date') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("id");
                    $optionId = DB::table('date_res') -> where('f_id', $resId) -> pluck('id');
                    foreach ($optionId as $optionKey => $option) {
                        $dataArr = [];
                        $dataArr[] = "";
                        $dataArr[] = $scort;
                        $dataArr[] = DB::table('name_res') -> where('id',$option) -> value('content');
                    }
                    break;
                case "23":
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('matrix_radio') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(矩阵单选题)";
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('matrix_radio') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("id");
                    $optionId = DB::table('matrix_radio_content') -> where('f_id', $resId) -> pluck('id');
                    $dataArr = [];
                    $dataArr1 = [];
                    foreach ($optionId as $option) {
                        $cooridinates = DB::table('matrix_radio_content') -> where('id',$option) -> value('coordinates');
                        $corContent = DB::table('matrix_radio_content') -> where('id',$option) -> value('content');
                        $cooridinates = explode(".",$cooridinates);
                        $titleRow = DB::table('matrix_radio_row') -> where('f_id',$resId) -> offset($cooridinates[0]) -> limit(1) ->value("content");
                        $titleCol = DB::table('matrix_radio_col') -> where('f_id',$resId) -> offset($cooridinates[1]) -> limit(1) ->value("content");
                        $dataArr[] = "{$titleRow}_{$titleCol}";
                        $dataArr1[] = "$corContent";
                    }
                    $questData[] = $dataArr;
                    $questData[] = $dataArr1;
                    break;
                case "24":
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('matrix_score') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(矩阵分数题)";
                    $questData[] = $dataArr;
                    //  遍历选项
                    $resId = DB::table('matrix_score') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("id");
                    $optionId = DB::table('matrix_score_content') -> where('f_id', $resId) -> pluck('id');
                    $dataArr = [];
                    $dataArr1 = [];
                    foreach ($optionId as $option) {
                        $cooridinates = DB::table('matrix_score_content') -> where('id',$option) -> value('coordinates');
                        $corContent = DB::table('matrix_score_content') -> where('id',$option) -> value('content');
                        $cooridinates = explode(".",$cooridinates);
                        $titleRow = DB::table('matrix_score_row') -> where('f_id',$resId) -> offset($cooridinates[0]) -> limit(1) ->value("content");
                        $titleCol = DB::table('matrix_score_col') -> where('f_id',$resId) -> offset($cooridinates[1]) -> limit(1) ->value("content");
                        $dataArr[] = "{$titleRow}_{$titleCol}";
                        $dataArr1[] = "$corContent";
                    }
                    $questData[] = $dataArr;
                    $questData[] = $dataArr1;
                    break;
                case "25":
                    $scort = $questNum + 1;
                    $dataArr = [];
                    $dataArr[] = "Q{$scort}";
                    $dataArr[] = "选项";
                    $num = $this -> typeNum($checkData,$questType,$questNum);
                    $title = DB::table('matrix_gapfill') -> where('quest_id',$questId) -> offset($num) -> limit(1) -> value('title');
                    $dataArr[] = "{$title}(矩阵填空题)";
                    $questData[] = $dataArr;
                    $resId = DB::table('matrix_gapfill') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("id");
                    $optionId = DB::table('matrix_gapfill_content') -> where('f_id', $resId) -> pluck('content');
                    //  将标题添加进来顺序是0.0 0.1 0.2 1.0 1.1 1.2等等
                    $colContent = DB::table('matrix_gapfill_col') -> where('f_id',$resId) -> pluck('content');
                    $rowContent = DB::table('matrix_gapfill_row') -> where('f_id',$resId) -> pluck('content');
                    $dataArr = [];
                    foreach ($rowContent as $rowKey => $rowOption) {
                        foreach ($colContent as $colKey => $colOption) {
                            $dataArr["{$rowKey}.{$colKey}"] = "{$rowOption}.{$colOption}";

                        }
                    }
                    $questData[] = $dataArr;
                    /*  根据voter不同遍历数据
                     *  获取用户
                     *
                    */
                    $voterIds = DB::table('matrix_gapfill') -> where('quest_id', $questId) -> offset($num) -> limit(1) -> value("voter_id");
                    $voterIds = ltrim($voterIds,",");
                    $voterIds = explode(",",$voterIds);
                    for ($i=0; $i<count($voterIds);$i++) {
                        $maxCol = 0;
                        $dataArr = [];
                        $userGap = DB::table('matrix_gapfill_content') -> select("coordinates","content")  -> where('f_id',$resId) -> where('voter_id',$voterIds[$i]) -> get();
                        foreach ($userGap as $optionGap) {
                            $cor = $optionGap->coordinates;
                            $corVal = $optionGap->content;
                            $corArr = explode(".",$cor);
                            $maxCol = $maxCol <= (Int)$corArr[1] ? ((Int)$corArr[1] + 1) : $maxCol;
                        }
                        foreach ($userGap as $optionGap) {
                            $cor = $optionGap->coordinates;
                            $corVal = $optionGap->content;
                            $corArr = explode(".",$cor);
                            $corPlace = $maxCol * (Int)$corArr[0] + (Int)$corArr[1];
                            $dataArr[$corPlace] = $corVal;
                        }
                        //dd($userGap);
                        $questData[] = $dataArr;
                    }
                    break;
            }
        }
        return collect($questData);
    }


}
