<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>参与调查</title>
    {{--  layui插件  --}}
{{--    <link rel="stylesheet" href="/script/layui/css/layui.css">--}}
{{--    <script src="/script/layui/layui.js"></script>--}}
    <!-- css引入 -->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/home/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/home/css/index.css">
    <link rel="stylesheet" href="/home/css/participate/show-check.css">
    <link rel="stylesheet" href="/home/css/participate/participate.css">
    <link rel="stylesheet" href="/home/css/participate/demo.css">
    <link rel="stylesheet" href="./css/page/myPagination.css">
    <!-- JQuery插件css引入 -->
    <link rel="stylesheet" href="/home/css/jquery.easy_slides.css">

    <!-- js引入 -->
    <script type="text/javascript" src="/home/js/jquery.min.js"></script>
    <script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
    <script src="/script/layer/layer.js"></script>
    <!-- JQuery插件JS引入 -->
    <script src="/home/js/jquery-1.11.0.min.js"></script>
    <script src="/home/js/jquery.easy_slides.js"></script>
    <!-- 时间选择器 -->
    <link rel="stylesheet" href="/home/css/participate/demo.css">
    <script src="/home/js/participate/date-time-picker.min.js"></script>
{{--    <script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.4/??flexible_css.js,flexible.js"></script>--}}

    <style>
        .create li {
            font-size: 20px;
        }

    </style>
</head>
<body style="background-color: #f5f5f5;">
<button class="btn btn-primary" style="margin-left: 60%;" onclick="save();">保存</button>
<button  class="btn btn-primary" onclick="sub()">提交</button>

    <form action="" class="create-form quest col-md-8 col-xs-12 page-container" style="width: 60%;">

        <div class="quest-title">
            <div class="title">欢迎使用小猪问卷网</div>
            <div class="title1">感谢您能抽出几分钟时间来参加本次答题，现在我们就马上开始吧！</div>
            <div class="wjhr"></div>
        </div>
    {{ csrf_field() }}
    </form>

    <div id="pagination" class="pagination" style="margin-left: 20%;">
    </div>
    <!-- 选择题单选选项 -->
    <script type="text\html" id="radio-option">
        <div class="options" class="create-form  ">
            <label for="option"></label>

            <input name="radio1-option1" type="radio" value="1" style="cursor: pointer;" >

            <input type="text" class="option"  name="radio1-option2-title" value="选项"  id="option" readonly="true" disabled style="background-color: white" onclick="check()">
            <span class="glyphicon glyphicon-minus-sign hide del"  style="width: 30px; height: 25px ; cursor: pointer;"></span>
        </div>
    </script>
    <!--选择题-->
    <script id="radio" type="text\html">
        <div class="  create create-radio create-option radio " name="" id="">
            <div class="radioId idStyle" style="display: inline;">
                <li style="display:inline;">1</li>
            </div>
            <div style="display: inline;">
                <input type="text" class="option-title " placeholder="请输入标题"  value="请输入标题"  id="title" readonly="true" disabled style="background-color: white">
            </div>
        </div>
    </script>
    <!--多项选择-->
    <script id="radioMulti" type="text\html">
        <div class="  create create-radio create-option radioMulti " name="" id="">
            <div class="radioId idStyle" style="display: inline;">
                <li style="display:inline;">1</li>
            </div>
            <div style="display: inline;">
                <input type="text" class="option-title " placeholder="请输入标题"  value="请输入标题"  id="title" readonly="true"  disabled style="background-color: white">
            </div>
        </div>
    </script>
    <!-- 选择题多选选项 -->
    <script type="text\html" id="radioMulti-option">
        <div class="options" class="create-form ">
            <label for="option"></label>
            <input name="radio1-option1" type="checkbox" value="1" style="cursor: pointer;" >
            <input type="text" class="option"  name="radio1-option2-title" value="选项"  id="option" readonly="true" disabled style="background-color: white" onclick="check()">
            <span class="glyphicon glyphicon-minus-sign hide del"  style="width: 30px; height: 25px ; cursor: pointer;"></span>
        </div>

    </script>
    {{-- 填空题 --}}
    <script type="text/html" id="gapFill">
        <!-- 填空和多项填空 -->
        <div class="gapFill  create create-option "   name="" id="">
            <div class="gapFillId idStyle" style="display: inline;">
                <input type="hidden" value="" name="">
                <li  style="display:inline;">2</li>
            </div>

            <div style="display: inline;">
                <input type="text" class="option-title" value="请输入标题"  id="title" readonly="true" disabled style="background-color: white" />
            </div>

            <div class="  options">
                <input type="text " class="gapInput allFormate-input" name=""  >
            </div>
        </div>
    </script>
    {{-- 多项填空 --}}
    <script type="text/html" id="gapMultiFill">
        <div class="gapMultiFill  create create-option"   name="" id="">
            <div class="gapFillId idStyle" style="display: inline;">
            <input type="hidden" value="" name="">
            <li  style="display:inline;">2</li>
            </div>

            <div style="display: inline;">
            <input type="text" class="option-title" value="请输入标题"  id="title" readonly="true"  disabled style=""/>
            </div>

            <div class="  options">
            <input class="gapInput-title"  type="text" value="选项1" placeholder="选项1" name=""   id="option" readonly="true" disabled style="background-color: white;width: 60%;">
            <br>
            <input type="text " class="gapInput" name=""  class="allFormate-input" >
            <span class="glyphicon glyphicon-minus-sign hide"  style="width: 30px; height: 25px; cursor: pointer;"></span>
            </div>

            <div class=" options">
            <input class="gapInput-title"  type="text" value="选项2" placeholder="选项2" name=""  id="option" readonly="true" disabled style="background-color: white;width: 60%;">
            <br>
            <input type="text" class="gapInput" name=""  class="allFormate-input" >
            <span class="glyphicon glyphicon-minus-sign hide"  style="width: 30px; height: 25px; cursor: pointer;"></span>
            </div>
            </div>
    </script>
    {{-- 多项填空选项 --}}
    <script type="text/html" id="gapFill-option">
        <div class=" options" style="">
            <input class="gapInput-title"  type="text" value="选项2" placeholder="选项2" name=""  id="option" readonly="true" disabled style="background-color: white;width: 60%;">
            <br>
            <input type="text" class="gapInput " name=""  style="width: 80%;">
            <span class="glyphicon glyphicon-minus-sign hide"  style="width: 30px; height: 25px; cursor: pointer;"></span>
        </div>
    </script>
    {{-- 分数提 --}}
    <script type="text/html" id="score">
        <div class="score allStyle  create-option create "  style="height: 200px;" name="" id="">
            <div class="gapFillId idStyle" style="display: inline;" name="">
                <input type="hidden" value="" name="">
                <li  style="display:inline;">3</li>
            </div>
            <div style="display: inline;">
                <input type="text" class="option-title" placeholder="请输入标题" value="请输入标题" name=""  disabled style="background-color: white" >
            </div>
            <div class="allFormate">
                <div class="nps_radius " onclick="score(this)">0</div>
                <div class="nps_radius" onclick="score(this)">1</div>
                <div class="nps_radius" onclick="score(this)">2</div>
                <div class="nps_radius" onclick="score(this)">3</div>
                <div class="nps_radius" onclick="score(this)">4</div>
                <div class="nps_radius" onclick="score(this)">5</div>
                <div class="nps_radius" onclick="score(this)">6</div>
                <div class="nps_radius" onclick="score(this)">7</div>
                <div class="nps_radius" onclick="score(this)">8</div>
                <div class="nps_radius" onclick="score(this)">9</div>
                <div class="nps_radius" onclick="score(this)">10</div>
                <input type="hidden" name="score">
            </div>
        </div>
    </script>
    {{-- 备注说明 --}}
    <script type="text/html" id="descr">
        <div class="descr allStyle create-option  create "   name="" id="">
            <div class="gapFillId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">4</li></div>
            <div style="display: inline;">
                <input type="text " class="descrContent" placeholder="备注说明"  name="" value="备注说明"   disabled style="background-color: white"  >
            </div>
        </div>
    </script>
    {{-- 分页 --}}
    <script type="text/html" id="page">
        <div class="page allStyle create-option create  "   name="" id="">
            <div class="gapFillId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">5</li></div>
            <div style="display: inline;">
                <p style="font-size: 16px;color: #484848;display: inline;">分页</p>
                <input type="text " class="descrContent" placeholder="分页1/1"  name="" value="1/1" readonly="true"  disabled style="background-color: white">
            </div>
        </div>
    </script>
    {{-- 横线 --}}
    <script type="text/html" id="hr">
        <div class="hr allStyle create-option  create " style="height: 80px;" name="" id="">
            <div class="hrId idStyle"  name=""><input type="hidden" value="" name=""><li  style="display:inline;">6</li></div>
            <div style="margin-left:80px; margin-top: -2%; ">
                <hr class="hrStyle"/>
            </div>
        </div>
    </script>
    {{-- 姓名 --}}
    <script id="name" type="text/html">
        <div class="allStyle name  create create-option"   name="" id="">
            <div class="gapFillId idStyle" style="display: inline;">
                <li  style="display:inline;">7</li>
            </div>
            <div style="display: inline;">
                <input type="text" class="option-title" value="姓名"  id="title" readonly="true"  disabled style="background-color: white"/>
            </div>
            <div class="  options">
                <input type="text " class="gapInput allFormate-input" name=""  >
            </div>
        </div>
    </script>
    {{-- 日期 --}}
    <script id="date" type="text/html">
        <div class="date allStyle create create-option "   name="" id=""  >
            <div class="dateId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">8</li></div>
            <div style="display: inline;">
                <input type="text" class="option-title" placeholder="请输入标题"  name="" value="请选择日期"   disabled style="background-color: white">
            </div>
            <div class="container col-md-12 col-xs-12" style="width: 85%;height: inherit;">
                <div class="mt20px demo-div">
                    <input type="text" class="mt10px input  gapInput"  id="J-demo-06"  style="margin-left: 15%; width: 100%; ">
                </div>
            </div>
        </div>
    </script>
    {{-- 日期JS事件 --}}

    {{-- 矩阵单选 --}}
    <script type="text/html" id="matrixRadio">
        <div class="matrixRadio  create create-option"    name="matrixRadio" id="matrixRadio">
            <div class="matrixRadioId idStyle" style="display: inline;" name=""><input type="hidden" value="" name="" ><li style="display:inline;">9</li></div>
            <div style="display: inline;">
                <input type="text" class="option-title" placeholder="请输入标题"  name="" value="矩阵单选题" readonly="true"  id="title" disabled style="background-color: white">
                <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" >
                        </span>
            </div>
            <div class="allFormate table-responsive " >
                <table class="table table-border table-bordered  "    >
                    <thead >
                    <tr >
                        <th style="width:122px;"></th>
                        <th class="table_title tableCol1" style="">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="选项1" style="width: 80px;"  readonly="true" id="option" direction="row" >

                            </div>
                        </th>
                        <th class="table_title tableCol1" style="">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" readonly="true" class="btn " value="选项2" style="width: 80px;float: left;"   id="option" direction="row">

                            </div>
                        </th>
                    </tr>

                    </thead>

                    <tbody>
                    <tr>
                        <th class="table_title tableRow" style="width: 140px;">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="矩阵1" style="width: 80px;" readonly="true"  id="option" direction="col">
                            </div>
                        </th>
                        <td align="center">
                            <label>
                                <input type="radio" name="" id="" class="a-radio" >
                                <span class="b-radio"></span>
                            </label>
                        </td>
                        <td align="center">
                            <label>
                                <input type="radio" name="" id="" class="a-radio" >
                                <span class="b-radio"></span>
                            </label>
                        </td>

                    </tr>
                    <tr>
                        <th class="table_title tableRow">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="矩阵2" style="width: 80px;"  readonly="true" id="option" direction="col">
                            </div>
                        </th>
                        <td align="center" >
                            <label onclick="radioClick(this)">
                                <input type="radio" name="1" id="" class="a-radio" >
                                <span class="b-radio"></span>
                            </label>
                        </td>
                        <td align="center" onclick="radioClick(this)">
                            <label>
                                <input type="radio" name="1" id="" class="a-radio" >
                                <span class="b-radio"></span>
                            </label>
                        </td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </script>
    <script type="text/html" id="matrixRadio1">
    <div class="matrixRadio  create create-option"    name="matrixRadio" id="matrixRadio">
        <div class="matrixRadioId idStyle" style="display: inline;" name=""><input type="hidden" value="" name="" ><li style="display:inline;">9</li></div>
        <div style="display: inline;">
            <input type="text" class="option-title" placeholder="请输入标题"  name="" value="矩阵单选题" readonly="true"  id="title" disabled style="background-color: white">
            <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" >
                        </span>
        </div>
        <div class="allFormate table-responsive" style="width:90%;">
            <table class="table table-bordered  "    >
                <thead >
                <tr >
                    <th style="width:122px;"></th>
                    <th class="table_title tableCol1" style="">
                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                            <input type="text" class="btn " value="选项1" style="width: 80px;"  readonly="true" id="option" direction="row" >

                        </div>
                    </th>
                    <th class="table_title tableCol1" style="">
                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                            <input type="text" readonly="true" class="btn " value="选项2" style="width: 80px;float: left;"   id="option" direction="row">

                        </div>
                    </th>
                </tr>

                </thead>

                <tbody>
                <tr>
                    <th class="table_title tableRow" style="width: 140px;">
                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                            <input type="text" class="btn " value="矩阵1" style="width: 80px;" readonly="true"  id="option" direction="col">
                        </div>
                    </th>
                    <td align="center">
                        <label>
                            <input type="radio" name="" id="" class="a-radio" >
                            <span class="b-radio"></span>
                        </label>
                    </td>
                    <td align="center">
                        <label>
                            <input type="radio" name="" id="" class="a-radio" >
                            <span class="b-radio"></span>
                        </label>
                    </td>

                </tr>
                <tr>
                    <th class="table_title tableRow">
                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                            <input type="text" class="btn " value="矩阵2" style="width: 80px;"  readonly="true" id="option" direction="col">
                        </div>
                    </th>
                    <td align="center" >
                        <label onclick="radioClick(this)">
                            <input type="radio" name="1" id="" class="a-radio" >
                            <span class="b-radio"></span>
                        </label>
                    </td>
                    <td align="center" onclick="radioClick(this)">
                        <label>
                            <input type="radio" name="1" id="" class="a-radio" >
                            <span class="b-radio"></span>
                        </label>
                    </td>

                </tr>


                </tbody>
            </table>
        </div>
    </div>
</script>
    {{-- 矩阵单选横添加 --}}
    <script type="text/html" id="matrixRadioRow">
        <th class="table_title tableCol1" style="">
            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                <input type="text" class="btn " value="选项1" style="width: 80px;" readonly="true"  id="option" direction="row" >

            </div>
        </th>
    </script>
    {{-- 矩阵列添加 --}}
    <script type="text/html" id="matrixRadioCol">
        <tr>
            <th class="table_title tableRow" style="width: 140px;">
                <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                    <input type="text" class="btn " value="矩阵1" style="width: 80px;" readonly="true"  id="option" direction="col" >
                </div>
            </th>

        </tr>
    </script>
    {{-- 矩阵填空题 --}}
    <script type="text/html" id="matrixGapFill">
        <div class="matrixGapFill  create create-option"    name="matrixRadio" id="matrixRadio">
            <div class="matrixRadioId idStyle" style="display: inline;" name=""><input type="hidden" value="" name="" ><li style="display:inline;">10</li></div>
            <div style="display: inline;">
                <input type="text" class="option-title" placeholder="请输入标题"  name="" value="矩阵填空题" readonly="true"  id="title" disabled style="background-color: white">
                <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" >
                        </span>
            </div>
            <div class="allFormate table-responsive" >
                <table class="table table-bordered  "    >
                    <thead >
                    <tr >
                        <th style="width:122px;"></th>
                        <th class="table_title tableCol1" style="">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="选项1" style="width: 80px;" readonly="true"  id="option" direction="row" >

                            </div>
                        </th>
                        <th class="table_title tableCol1" style="">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="选项2" style="width: 80px;float: left;" readonly="true"  id="option" direction="row">

                            </div>
                        </th>
                    </tr>

                    </thead>

                    <tbody>
                    <tr>
                        <th class="table_title tableRow" style="width: 140px;">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="矩阵1" style="width: 80px;" readonly="true"  id="option" direction="col">
                            </div>
                        </th>
                        <td align="center" >
                            <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" >
                        </td>
                        <td align="center" >
                            <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" >
                        </td>

                    </tr>
                    <tr>
                        <th class="table_title tableRow">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="矩阵2" style="width: 80px;"  readonly="true" id="option" direction="col">
                            </div>
                        </th>
                        <td align="center" >
                            <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" >
                        </td>
                        <td align="center" >
                            <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" >
                        </td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </script>
    {{-- 矩阵填空横向添加 --}}
    <script type="text/html" id="matrixGapFillRow">
        <th class="table_title tableCol1" style="">
            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                <input type="text" class="btn " value="选项2" style="width: 80px;float: left;" readonly="true"  id="option" direction="row" >

            </div>
        </th>
    </script>
    {{-- 矩阵填空竖向添加 --}}
    <script id="matrixGapFillCol" type="text/html">
        <tr>
            <th class="table_title tableRow" style="width: 140px;">
                <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                    <input type="text" class="btn " value="矩阵1" style="width: 80px;" readonly="true"  id="option" direction="col" >
                </div>
            </th>


        </tr>
    </script>
    {{-- 矩阵分数题 --}}
    <script type="text/html" id="matrixScore">
        <div class="matrixScore  create create-option"    name="matrixRadio" id="matrixRadio">
            <div class="matrixRadioId idStyle" style="display: inline;" name=""><input type="hidden" value="" name="" ><li style="display:inline;">11</li></div>
            <div style="display: inline;">
                <input type="text" class="option-title" placeholder="请输入标题"  name="" value="矩阵填空题" readonly="true"  id="title" disabled style="background-color: white">
                <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" >
                        </span>
            </div>
            <div class="allFormate table-responsive">
                <table class="table table-bordered  "    >
                    <thead >
                    <tr >
                        <th style="width:122px;"></th>
                        <th class="table_title tableCol1" style="">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="选项1" style="width: 80px;" readonly="true"  id="option" direction="row" >

                            </div>
                        </th>
                        <th class="table_title tableCol1" style="">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="选项2" style="width: 80px;float: left;" readonly="true"  id="option" direction="row">

                            </div>
                        </th>
                    </tr>

                    </thead>

                    <tbody>
                    <tr>
                        <th class="table_title tableRow" style="width: 140px;">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="矩阵1" style="width: 80px;" readonly="true"  id="option" direction="col">
                            </div>
                        </th>
                        <td align="center" >
                            <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" oninput = "value=value.replace(/[^\d]/g,'')">
                        </td>
                        <td align="center" >
                            <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;"oninput = "value=value.replace(/[^\d]/g,'')" >
                        </td>

                    </tr>
                    <tr>
                        <th class="table_title tableRow">
                            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                <input type="text" class="btn " value="矩阵2" style="width: 80px;"  readonly="true" id="option" direction="col">
                            </div>
                        </th>
                        <td align="center" >
                            <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" oninput = "value=value.replace(/[^\d]/g,'')">
                        </td>
                        <td align="center" >
                            <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" oninput = "value=value.replace(/[^\d]/g,'')" >
                        </td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </script>
    {{--   矩阵分数横添加 --}}
    <script type="text/html" id="matrixScoreRow">
        <th class="table_title tableCol1" style="">
            <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                <input type="text" class="btn " value="选项2" style="width: 80px;float: left;" readonly="true"  id="option" direction="row" >

            </div>
        </th>
    </script>
    <script type="text/html" id="matrixScoreCol">
        <tr>
            <th class="table_title tableRow" style="width: 140px;">
                <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                    <input type="text" class="btn " value="矩阵1" style="width: 80px;" readonly="true"  id="option" direction="col" >
                </div>
            </th>


        </tr>
    </script>
    <script src="/home/js/page/myPagination.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script>
        //  对缓存的数据进行处理 将old('checkInfo')里面数据重新整合
        var oldCheck =  "";
        var oldArr = [];
        var oldCheckArr = [];
        var url = window.location.search;
        var questId = url.replace(/[^0-9]+/ig,"");
        var typeNum = "{{ $typeNum }}"
        /*if( oldCheck ) {
            var oldCheckArr = oldCheck.trim(",");
        }*/


        //定时器30s自动保存一次  还需要些清除定时器
        //var saveInterval  = setInterval(save(),30000);

        //分页
        window.onload = function () {

            new Page({
                id: 'pagination',
                pageTotal: typeNum, //必填,总页数
                pageAmount: 1,  //每页多少条
                dataTotal: 500, //总共多少条数据
                curPage:1, //初始页码,不填默认为1
                pageSize: 5, //分页个数,不填默认为5
                showPageTotalFlag:true, //是否显示数据统计,不填默认不显示
                showSkipInputFlag:true, //是否支持跳转,不填默认不显示
                getPage: function (page) {
                    save();
                    // 内容清除
                    $(".create-form").children("div:gt(0)").remove();

                    var oldCheckInfo = [];
                    scort = 0;
                    page1 = page -1;
                    console.log(oldArr);
                    //  还原缓存数据
                    if(oldArr.length > 0) {
                        oldArr.forEach(function(item,index){
                            if(item['page'] == page1) {
                                oldCheckArr = item;
                            }
                        });
                        if(oldCheckArr['checkInfo']) {
                            oldCheckArr = oldCheckArr['checkInfo'].trim();
                            oldCheckArr = oldCheckArr.split(",");
                            oldCheckArr.shift();
                            oldCheckArr.forEach(function(item,index){
                                var oldCheckInfo1 = [];
                                var option  = item.split("|");
                                option.pop();

                                option.forEach(function(value,key){
                                    value = value.split(":");
                                    oldCheckInfo1[value[0]] = value[1];
                                });
                                oldCheckInfo.push(oldCheckInfo1);
                            });

                            }
                        }


                    questPage[page1].forEach(function(index3,item){
                            switch (index3['type']) {
                                case 'radio' :
                                    var _html = document.getElementById('radio').innerHTML;

                                    $('.create-form').append(_html);

                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','radio'+index1);
                                    obj.attr('id','radio'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    obj.children(".options").remove();
                                    //  追加心得元素
                                    var optionHtml = document.getElementById('radio-option').innerHTML;
                                    var oldCheck = index1 - 1;
                                    for ( key in index3 ) {
                                        if (key.replace(/[^a-z]+/ig,"") === "option") {
                                            obj.children("div:last-child").after(optionHtml);
                                            obj.children("div:last-child").find('input:eq(1)').attr("value",index3[key]);
                                            obj.children("div:last-child").find('input:eq(0)').attr("name",'radio'+index1);
                                            //  数据还原
                                            if(oldCheckInfo[scort]) {
                                                var optionNum = obj.children(".options").length ;
                                                for(idx in oldCheckInfo[oldCheck]) {
                                                    if(idx.replace(/[^a-z]+/ig,"") == "option") {
                                                        var oldCheckNum = 0;
                                                        if(oldCheckInfo[oldCheck][idx] == 1) {
                                                            //  获取option末尾的数字
                                                            oldCheckNum = idx.match(/\d+/);
                                                            if(oldCheckNum[0] == optionNum) {
                                                                var optionNum1 = optionNum - 1;
                                                                obj.children(".options").eq(optionNum1).find('input:eq(0)').attr('checked','true');
                                                            }
                                                        }
                                                    }
                                                }
                                            }


                                        }
                                    }
                                    break;
                                case 'radioMulti' :
                                    var _html = document.getElementById('radioMulti').innerHTML;
                                    $('.create-form').append(_html);

                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    var oldCheck = index1 -1;
                                    obj.attr('name','radioMulti'+index1);
                                    obj.attr('id','radioMulti'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    obj.children(".options").remove();
                                    //  追加心得元素
                                    var optionHtml = document.getElementById('radioMulti-option').innerHTML;
                                    for ( key in index3 ) {
                                        console.log(index3[key],629)
                                        if (key.replace(/[^a-z]+/ig,"") === "option") {
                                            obj.children("div:last-child").after(optionHtml);
                                            obj.children("div:last-child").find('input:eq(1)').attr("value",index3[key]);
                                            console.log(index3,663)
                                            obj.children("div:last-child").find('input:eq(0)').attr("name",'radioMulti'+index1);
                                            //  数据还原
                                            if(oldCheckInfo) {
                                                var optionNum = obj.children(".options").length ;
                                                for(idx in oldCheckInfo[oldCheck]) {
                                                    if(idx.replace(/[^a-z]+/ig,"") == "option") {
                                                        var oldCheckNum = 0;
                                                        if(oldCheckInfo[oldCheck][idx] == 1) {
                                                            //  获取option末尾的数字
                                                            oldCheckNum = idx.match(/\d+/);
                                                            if(oldCheckNum[0] == optionNum) {
                                                                var optionNum1 = optionNum - 1;
                                                                obj.children(".options").eq(optionNum1).find('input:eq(0)').attr('checked','true');
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    break;
                                case 'gapFill' :
                                    var _html = document.getElementById('gapFill').innerHTML;
                                    $('.create-form').append(_html);

                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    var oldCheck = index1 - 1;
                                    obj.attr('name','gapFill'+index1);
                                    obj.attr('id','gapFill'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    //obj.children(".options").remove();
                                    if(oldCheckInfo[scort]) {

                                        obj.find(".options").find("input").attr("value",oldCheckInfo[oldCheck]['option'])
                                    }
                                    break;
                                case 'gapMultiFill' :
                                    var _html = document.getElementById('gapMultiFill').innerHTML;
                                    $('.create-form').append(_html);

                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','gapMultiFill'+index1);
                                    obj.attr('id','gapMultiFill'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);

                                    obj.children(".options").remove();
                                    //  追加心得元素
                                    var optionHtml = document.getElementById('gapFill-option').innerHTML;
                                    for ( key in index3 ) {
                                        if (key.replace(/[^a-z]+/ig,"") === "option") {
                                            obj.children("div:last-child").after(optionHtml);
                                            obj.children("div:last-child").find('input:eq(0)').attr("value",index3[key]);
                                            //  数据还原
                                            if(oldCheckInfo[scort]) {
                                                var optionNum = obj.children(".options").length ;
                                                for(idx in oldCheckInfo[scort]) {
                                                    if(idx.replace(/[^a-z]+/ig,"") == "option") {
                                                        var oldCheckNum = 0;
                                                        //  获取option末尾的数字
                                                        oldCheckNum = idx.match(/\d+/);
                                                        if(oldCheckInfo[scort]) {
                                                            var optionNum1 = optionNum - 1;
                                                            obj.children(".options").eq(optionNum1).find('input:eq(1)').attr('value',oldCheckInfo[scort][idx]);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    break;
                                case 'score' :
                                    var _html = document.getElementById('score').innerHTML;
                                    $('.create-form').append(_html);

                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','score'+index1);
                                    obj.attr('id','score'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    if(oldCheckInfo) {
                                        var optionNum = obj.children(".options").length ;
                                        for(idx in oldCheckInfo[oldCheck]) {
                                            if(idx.replace(/[^a-z]+/ig,"") == "option") {
                                                var oldCheckNum = 0;
                                                //if(oldCheckInfo[oldCheck][idx] == 1) {
                                                //  获取option末尾的数字
                                                oldCheckNum = idx.match(/\d+/);
                                                if(oldCheckNum[0] == optionNum) {
                                                    var optionNum1 = optionNum - 1;
                                                    var oldCheckNum = oldCheckInfo[oldCheck][idx]-1;
                                                    obj.find(".nps_radius").eq(oldCheckNum).trigger("click");
                                                }
                                                //}
                                            }
                                        }
                                    }
                                    break;
                                case 'descr' :
                                    var _html = document.getElementById('descr').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','descr'+index1);
                                    obj.attr('id','descr'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    obj.children(".options").remove();
                                    break;
                                case 'page' :
                                    var _html = document.getElementById('page').innerHTML;

                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','descr'+index1);
                                    obj.attr('id','descr'+index1);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);

                                    var num = index3['num']+"/"+index3['typeNum'];
                                    obj.find('input').attr('value',num);
                                    break;
                                case 'hr' :
                                    var _html = document.getElementById('hr').innerHTML;
                                    $('.create-form').append(_html);

                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','hr'+index1);
                                    obj.attr('id','hr'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);

                                    break;
                                case 'name' :
                                    var _html = document.getElementById('name').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    var oldCheck = index1 - 1;
                                    obj.attr('name','name'+index1);
                                    obj.attr('id','name'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    if(oldCheckInfo[scort]){

                                        obj.find(".options").find("input").attr("value",oldCheckInfo[oldCheck]['option'])
                                    }
                                    break;
                                case 'email' :
                                    var _html = document.getElementById('email').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','email'+index1);
                                    obj.attr('id','email'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    break;
                                case 'phone' :
                                    var _html = document.getElementById('phone').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','phone'+index1);
                                    obj.attr('id','phone'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    break;
                                case 'sex' :
                                    var _html = document.getElementById('sex').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','sex'+index1);
                                    obj.attr('id','sex'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    break;
                                case 'date' :
                                    var _html = document.getElementById('date').innerHTML;

                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','date'+index1);
                                    obj.attr('id','date'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    obj.find(".mt10px").attr("id","J-demo-"+index1);
                                    $("#J-demo-"+index1).dateTimePicker({
                                        mode: 'dateTime',
                                        format: 'yyyy/MM/dd HH:mm:ss'
                                    });
                                    break;
                                /*case 'time' :
                                    var _html = document.getElementById('time').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','time'+index1);
                                    obj.attr('id','time'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    break;*/
                                case 'city' :
                                    var _html = document.getElementById('city').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','city'+index1);
                                    obj.attr('id','city'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    break;
                                case 'address' :
                                    var _html = document.getElementById('address').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','address'+index1);
                                    obj.attr('id','address'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    break;
                                case 'matrixRadio1' :
                                    var _html = document.getElementById('matrixRadio').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','matrixRadio'+index1);
                                    obj.attr('id','matrixRadio'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    //  移除row方向元素和col方向元素
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("tbody").find("tr").remove();
                                    //  追加心得元素
                                    var numTr = 0;
                                    var nameVal = 0;
                                    for ( key in index3 ) {
                                        if (key.replace(/[^a-z]+/ig,"") === "row") {
                                            //  获取th个数
                                            var th = obj.find('thead').find('th').length ;
                                            numTr++;
                                            var optionHtml = document.getElementById('matrixRadioRow').innerHTML;
                                            obj.find('thead').find('tr').append(optionHtml);
                                            obj.find('thead').find('th:last-child').find('input').attr("value",index3[key]);
                                            obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                                        }
                                        if (key.replace(/[^a-z]+/ig,"") === "col") {
                                            var td = "<td align=\"center\">\n" +
                                                "  <label>\n" +
                                                "   <input type=\"radio\" name=\"1\" id=\"\" class=\"a-radio\" >\n" +
                                                "   <span class=\"b-radio\"></span>\n" +
                                                " </label>\n" +
                                                "</td>";
                                            //  获取tr个数
                                            var trLen = obj.find('tbody').find('tr').length  + 1;
                                            var optionHtml = document.getElementById('matrixRadioCol').innerHTML;
                                            obj.find('tbody').append(optionHtml);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("value",index3[key]);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                                            for(var i = 0; i<numTr; i++) {
                                                obj.find('tbody').find('tr:last-child').find('th').after(td);
                                                obj.find('tbody').find('tr:last-child').find("td").find("input").attr("name",nameVal);
                                            }
                                            nameVal++;
                                        }
                                    }
                                    break;
                                case 'matrixRadio' :
                                    var _html = document.getElementById('matrixRadio').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','matrixRadio'+index1);
                                    obj.attr('id','matrixRadio'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    //  移除row方向元素和col方向元素
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("tbody").find("tr").remove();
                                    //  追加心得元素
                                    var numTr = 0;
                                    var nameVal = 0;
                                    for ( key in index3 ) {
                                        if (key.replace(/[^a-z]+/ig,"") === "row") {
                                            //  获取th个数
                                            var th = obj.find('thead').find('th').length ;
                                            numTr++;
                                            var optionHtml = document.getElementById('matrixRadioRow').innerHTML;
                                            obj.find('thead').find('tr').append(optionHtml);
                                            obj.find('thead').find('th:last-child').find('input').attr("value",index3[key]);
                                            obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                                        }
                                        if (key.replace(/[^a-z]+/ig,"") === "col") {
                                            var td = "<td align=\"center\">\n" +
                                                "  <label onclick=\"radioClick(this)\">\n" +
                                                "   <input type=\"radio\" name=\"\" id=\"\" value=\"1\" class=\"a-radio\" >\n" +
                                                "   <span class=\"b-radio\"></span>\n" +
                                                " </label>\n" +
                                                "</td>";
                                            //  获取tr个数
                                            var trLen = obj.find('tbody').find('tr').length  + 1;
                                            var optionHtml = document.getElementById('matrixRadioCol').innerHTML;
                                            obj.find('tbody').append(optionHtml);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("value",index3[key]);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                                            for(var i = 0; i<numTr; i++) {
                                                obj.find('tbody').find('tr:last-child').find('th').after(td);
                                                obj.find('tbody').find('tr:last-child').find("td").find("input").attr("name",'matrixRadio'+index1+nameVal);
                                            }
                                            nameVal++;
                                        }
                                        if(oldCheckInfo[scort]) {
                                            var optionNum = obj.children(".options").length ;
                                            for(idx in oldCheckInfo[scort]) {
                                                var oldCheckNum = 0;
                                                /*if(oldCheckInfo[scort][idx] == 1) {
                                                    //  获取option末尾的数字
                                                    oldCheckNum = idx.match(/\d+/);
                                                    var optionNum1 = optionNum - 1;
                                                    obj.children(".options").eq(optionNum1).find('input:eq(0)').attr('checked','true');
                                                }*/
                                                oldCheckNum = idx.match(/\d+.\d+/);
                                                if(oldCheckNum) {
                                                    var oldCoordinates = oldCheckNum[0];
                                                    //console.log(oldCoordinates);

                                                    var oldCor = oldCoordinates.split(".");
                                                    /*var oldRow = key;
                                                    var oldCol = oldCoordinates[key];*/
                                                    if(oldCheckInfo[scort][idx] == 1) {
                                                        obj.find('tbody').find("tr").eq(oldCor[1]).children("td").eq(oldCor[0]).find("label").click();
                                                    }



                                                }
                                            }
                                        }
                                    }
                                    break;
                                case 'matrixScore' :
                                    var _html = document.getElementById('matrixScore').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','matrixScore'+index1);
                                    obj.attr('id','matrixScore'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    //  移除row方向元素和col方向元素
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("tbody").find("tr").remove();
                                    //  追加心得元素
                                    var numTr = 0;
                                    for ( key in index3 ) {
                                        if (key.replace(/[^a-z]+/ig,"") === "row") {
                                            //  获取th个数
                                            var th = obj.find('thead').find('th').length ;
                                            numTr++;
                                            var optionHtml = document.getElementById('matrixScoreRow').innerHTML;
                                            obj.find('thead').find('tr').append(optionHtml);
                                            obj.find('thead').find('th:last-child').find('input').attr("value",index3[key]);
                                            obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                                        }
                                        if (key.replace(/[^a-z]+/ig,"") === "col") {
                                            var td = " <td align=\"center\" >\n" +
                                                "                <input type=\"text\" class=\"btn \" placeholder=\"分数\" style=\"width: 80px;border: 1px solid #2672ff;\" oninput = \"value=value.replace(/[^\\d]/g,'')\">\n" +
                                                "            </td>";
                                            //  获取tr个数
                                            var trLen = obj.find('tbody').find('tr').length  + 1;
                                            var optionHtml = document.getElementById('matrixScoreCol').innerHTML;
                                            obj.find('tbody').append(optionHtml);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("value",index3[key]);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                                            for(var i = 0; i<numTr; i++) {
                                                obj.find('tbody').find('tr:last-child').find('th').after(td);
                                            }
                                        }

                                        if(oldCheckInfo[scort]) {
                                            var optionNum = obj.children(".options").length ;
                                            for(idx in oldCheckInfo[scort]) {
                                                var oldCheckNum = 0;
                                                /*if(oldCheckInfo[scort][idx] == 1) {
                                                    //  获取option末尾的数字
                                                    oldCheckNum = idx.match(/\d+/);
                                                    var optionNum1 = optionNum - 1;
                                                    obj.children(".options").eq(optionNum1).find('input:eq(0)').attr('checked','true');
                                                }*/
                                                oldCheckNum = idx.match(/\d+.\d+/);
                                                if(oldCheckNum) {
                                                    var oldCoordinates = oldCheckNum[0].split(".");
                                                    obj.find('tbody').find("tr").eq(oldCoordinates[1]).children("td").eq(oldCoordinates[0]).children("input").attr("value",oldCheckInfo[scort][idx]);
                                                }
                                            }
                                        }
                                    }
                                    break;
                                case 'matrixGapFill' :
                                    var _html = document.getElementById('matrixGapFill').innerHTML;
                                    $('.create-form').append(_html);
                                    var obj = $(".create-option:last-child");
                                    var index1 = scort + 1;
                                    obj.attr('name','matrixGapFill'+index1);
                                    obj.attr('id','matrixGapFill'+index1);
                                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                                    obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                                    //  移除row方向元素和col方向元素
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("thead").find("th:eq(1)").remove();
                                    obj.find("tbody").find("tr").remove();
                                    //  追加心得元素
                                    var numTr = 0;
                                    for ( key in index3 ) {
                                        if (key.replace(/[^a-z]+/ig,"") === "row") {
                                            //  获取th个数
                                            var th = obj.find('thead').find('th').length ;
                                            numTr++;
                                            var optionHtml = document.getElementById('matrixGapFillRow').innerHTML;
                                            obj.find('thead').find('tr').append(optionHtml);
                                            obj.find('thead').find('th:last-child').find('input').attr("value",index3[key]);
                                            obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                                        }
                                        if (key.replace(/[^a-z]+/ig,"") === "col") {
                                            var td = '<td align="center">'+
                                                '<input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" >'+
                                                '</td>';
                                            //  获取tr个数
                                            var trLen = obj.find('tbody').find('tr').length  + 1;
                                            var optionHtml = document.getElementById('matrixGapFillCol').innerHTML;
                                            obj.find('tbody').append(optionHtml);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("value",index3[key]);
                                            obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                                            for(var i = 0; i<numTr; i++) {
                                                obj.find('tbody').find('tr:last-child').find('th').after(td);
                                            }
                                        }
                                        if(oldCheckInfo[scort]) {
                                            var optionNum = obj.children(".options").length ;
                                            for(idx in oldCheckInfo[scort]) {
                                                var oldCheckNum = 0;
                                                /*if(oldCheckInfo[scort][idx] == 1) {
                                                    //  获取option末尾的数字
                                                    oldCheckNum = idx.match(/\d+/);
                                                    var optionNum1 = optionNum - 1;
                                                    obj.children(".options").eq(optionNum1).find('input:eq(0)').attr('checked','true');
                                                }*/
                                                oldCheckNum = idx.match(/\d+.\d+/);
                                                if(oldCheckNum) {
                                                    var oldCoordinates = oldCheckNum[0].split(".");
                                                    obj.find('tbody').find("tr").eq(oldCoordinates[1]).children("td").eq(oldCoordinates[0]).children("input").attr("value",oldCheckInfo[scort][idx]);
                                                }
                                            }
                                        }
                                    }
                                    break;
                            }
                            scort++;
                        });



                    //获取当前页数
                        console.log(page);
                }
            })
        }

        //启用滚动条
        $(document.body).css({
            "overflow-x":"auto",
            "overflow-y":"auto"
        });

        function radioClick(obj) {
            $(obj).parents("tr").find('input:gt(0)').attr('value', "0");
            $(obj).find("input").attr("value","1");
        }


        function score(obj) {
            $(obj).parents('.allFormate').children('div').each(function(){
                $(this).removeClass('bg');
            });
            $(obj).addClass('bg');
            var num = $(obj).html();
            $(obj).parent().children('input').attr('value',num);
        }

        var scort = 0;
        var keyItem = 0;
        var keyItem1 = 0;
        var questPage = new Array();
        var page1 = 0;  //  默认页数为0
        var quest = "{{ $questionnaire }}";
        var quest_title = "{{ $quest_title }}";
        var quest_title1 = "{{ $quest_title1 }}";
        $(".create-form div:first-child").find('.title').html(quest_title);
        $(".create-form div:first-child").find('.title1').html(quest_title1);
        //  开始拆分字符串 重新组合
        var questType = quest.trim();
        questType = questType.split(",");
        questType.pop();
        questType.forEach(function(item,index){
            var arrType = [];
            var option  = item.split("|");
            option.forEach(function(value,key){
                value = value.split(":");
                arrType[value[0]] = value[1];
                questPage[index] = new Array();
            });
            if(arrType['type'] == "page") {
                keyItem1++;
            } else {
                questPage[keyItem1][keyItem] = arrType;
            }
            keyItem ++;
        });
        //  分页逻辑
        if(questPage.length !== 0) {

            questPage[0].forEach(function(index3,item){

                switch (index3['type']) {
                    case 'radio' :
                        var _html = document.getElementById('radio').innerHTML;

                        $('.create-form').append(_html);

                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','radio'+index1);
                        obj.attr('id','radio'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        obj.children(".options").remove();
                        //  追加心得元素
                        var optionHtml = document.getElementById('radio-option').innerHTML;
                        for ( key in index3 ) {
                            if (key.replace(/[^a-z]+/ig,"") === "option") {
                                obj.children("div:last-child").after(optionHtml);
                                obj.children("div:last-child").find('input:eq(1)').attr("value",index3[key]);
                                console.log(index3[key])
                                obj.children("div:last-child").find('input:eq(0)').attr("name",'radio'+index1);
                            }
                        }
                        break;
                    case 'radioMulti' :
                        var _html = document.getElementById('radioMulti').innerHTML;
                        $('.create-form').append(_html);

                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','radioMulti'+index1);
                        obj.attr('id','radioMulti'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);

                        obj.children(".options").remove();
                        //  追加心得元素
                        var optionHtml = document.getElementById('radioMulti-option').innerHTML;
                        for ( key in index3 ) {

                            if (key.replace(/[^a-z]+/ig,"") === "option") {
                                console.log(index3[key],obj)
                                obj.children("div:last-child").after(optionHtml);
                                obj.children("div:last-child").find('input:eq(1)').attr("value",index3[key]);
                                obj.children("div:last-child").find('input:eq(0)').attr("name",'radio'+index1);
                            }
                        }
                        break;
                    case 'gapFill' :
                        var _html = document.getElementById('gapFill').innerHTML;
                        $('.create-form').append(_html);

                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','gapFill'+index1);
                        obj.attr('id','gapFill'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        //obj.children(".options").remove();
                        break;
                    case 'gapMultiFill' :
                        var _html = document.getElementById('gapMultiFill').innerHTML;
                        $('.create-form').append(_html);

                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','gapMultiFill'+index1);
                        obj.attr('id','gapMultiFill'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        obj.children(".options").remove();
                        //  追加心得元素
                        var optionHtml = document.getElementById('gapFill-option').innerHTML;
                        for ( key in index3 ) {
                            if (key.replace(/[^a-z]+/ig,"") === "option") {
                                obj.children("div:last-child").after(optionHtml);
                                obj.children("div:last-child").find('input:eq(0)').attr("value",index3[key]);
                            }
                        }
                        break;
                    case 'score' :
                        var _html = document.getElementById('score').innerHTML;
                        $('.create-form').append(_html);

                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','score'+index1);
                        obj.attr('id','score'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);

                        break;
                    case 'descr' :
                        var _html = document.getElementById('descr').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','descr'+index1);
                        obj.attr('id','descr'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        obj.children(".options").remove();
                        break;
                    case 'page' :
                        var _html = document.getElementById('page').innerHTML;

                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','descr'+index1);
                        obj.attr('id','descr'+index1);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);

                        var num = index3['num']+"/"+index3['typeNum'];
                        obj.find('input').attr('value',num);
                        break;
                    case 'hr' :
                        var _html = document.getElementById('hr').innerHTML;
                        $('.create-form').append(_html);

                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','hr'+index1);
                        obj.attr('id','hr'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);

                        break;
                    case 'name' :
                        var _html = document.getElementById('name').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','name'+index1);
                        obj.attr('id','name'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;
                    case 'email' :
                        var _html = document.getElementById('email').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','email'+index1);
                        obj.attr('id','email'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;
                    case 'phone' :
                        var _html = document.getElementById('phone').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','phone'+index1);
                        obj.attr('id','phone'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;
                    case 'sex' :
                        var _html = document.getElementById('sex').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','sex'+index1);
                        obj.attr('id','sex'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;
                    case 'date' :
                        var _html = document.getElementById('date').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','date'+index1);
                        obj.attr('id','date'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;
                    /*case 'time' :
                        var _html = document.getElementById('time').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','time'+index1);
                        obj.attr('id','time'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;*/
                    case 'city' :
                        var _html = document.getElementById('city').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','city'+index1);
                        obj.attr('id','city'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;
                    case 'address' :
                        var _html = document.getElementById('address').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','address'+index1);
                        obj.attr('id','address'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        break;
                    case 'matrixRadio' :
                        var _html = document.getElementById('matrixRadio').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','matrixRadio'+index1);
                        obj.attr('id','matrixRadio'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        //  移除row方向元素和col方向元素
                        obj.find("thead").find("th:eq(1)").remove();
                        obj.find("thead").find("th:eq(1)").remove();
                        obj.find("tbody").find("tr").remove();
                        //  追加心得元素
                        var numTr = 0;
                        var nameVal = 0;
                        for ( key in index3 ) {
                            if (key.replace(/[^a-z]+/ig,"") === "row") {
                                //  获取th个数
                                var th = obj.find('thead').find('th').length ;
                                numTr++;
                                var optionHtml = document.getElementById('matrixRadioRow').innerHTML;
                                obj.find('thead').find('tr').append(optionHtml);
                                obj.find('thead').find('th:last-child').find('input').attr("value",index3[key]);
                                obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                            }
                            if (key.replace(/[^a-z]+/ig,"") === "col") {
                                var td = "<td align=\"center\">\n" +
                                    "  <label onclick=\"radioClick(this)\">\n" +
                                    "   <input type=\"radio\" name=\"\" id=\"\" value=\"0\" class=\"a-radio\" >\n" +
                                    "   <span class=\"b-radio\"></span>\n" +
                                    " </label>\n" +
                                    "</td>";
                                //  获取tr个数
                                var trLen = obj.find('tbody').find('tr').length  + 1;
                                var optionHtml = document.getElementById('matrixRadioCol').innerHTML;
                                obj.find('tbody').append(optionHtml);
                                obj.find('tbody').find('tr:last-child').find('input').attr("value",index3[key]);
                                obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                                for(var i = 0; i<numTr; i++) {
                                    obj.find('tbody').find('tr:last-child').find('th').after(td);
                                    obj.find('tbody').find('tr:last-child').find("td").find("input").attr("name",'matrixRadio'+index1+nameVal);
                                }
                                nameVal++;
                            }
                        }
                        break;
                    case 'matrixScore' :
                        var _html = document.getElementById('matrixScore').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','matrixScore'+index1);
                        obj.attr('id','matrixScore'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        //  移除row方向元素和col方向元素
                        obj.find("thead").find("th:eq(1)").remove();
                        obj.find("thead").find("th:eq(1)").remove();
                        obj.find("tbody").find("tr").remove();
                        //  追加心得元素
                        var numTr = 0;
                        var nameVal = 0;
                        for ( key in index3 ) {
                            if (key.replace(/[^a-z]+/ig,"") === "row") {
                                //  获取th个数
                                var th = obj.find('thead').find('th').length ;
                                numTr++;
                                var optionHtml = document.getElementById('matrixScoreRow').innerHTML;
                                obj.find('thead').find('tr').append(optionHtml);
                                obj.find('thead').find('th:last-child').find('input').attr("value",index3[key]);
                                obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                            }
                            if (key.replace(/[^a-z]+/ig,"") === "col") {
                                var td = " <td align=\"center\" >\n" +
                                    "                <input type=\"text\" class=\"btn \" placeholder='' =\"分数\" style=\"width: 80px;border: 1px solid #2672ff;\" oninput = \"value=value.replace(/[^\\d]/g,'')\">\n" +
                                    "            </td>";
                                //  获取tr个数
                                var trLen = obj.find('tbody').find('tr').length  + 1;
                                var optionHtml = document.getElementById('matrixScoreCol').innerHTML;
                                obj.find('tbody').append(optionHtml);
                                obj.find('tbody').find('tr:last-child').find('input').attr("value",index3[key]);
                                obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                                for(var i = 0; i<numTr; i++) {
                                    obj.find('tbody').find('tr:last-child').find('th').after(td);
                                }
                            }
                        }
                        break;
                    case 'matrixGapFill' :
                        var _html = document.getElementById('matrixGapFill').innerHTML;
                        $('.create-form').append(_html);
                        var obj = $(".create-option:last-child");
                        var index1 = scort + 1;
                        obj.attr('name','matrixGapFill'+index1);
                        obj.attr('id','matrixGapFill'+index1);
                        $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                        obj.children("div:eq(1)").find("input").attr("value",index3['title']);
                        //  移除row方向元素和col方向元素
                        obj.find("thead").find("th:eq(1)").remove();
                        obj.find("thead").find("th:eq(1)").remove();
                        obj.find("tbody").find("tr").remove();
                        //  追加心得元素
                        var numTr = 0;
                        for ( key in index3 ) {
                            if (key.replace(/[^a-z]+/ig,"") === "row") {
                                //  获取th个数
                                var th = obj.find('thead').find('th').length ;
                                numTr++;
                                var optionHtml = document.getElementById('matrixGapFillRow').innerHTML;
                                obj.find('thead').find('tr').append(optionHtml);
                                obj.find('thead').find('th:last-child').find('input').attr("value",index3[key]);
                                obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                            }
                            if (key.replace(/[^a-z]+/ig,"") === "col") {
                                var td = '<td align="center">'+
                                    '<input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" >'+
                                    '</td>';
                                //  获取tr个数
                                var trLen = obj.find('tbody').find('tr').length  + 1;
                                var optionHtml = document.getElementById('matrixGapFillCol').innerHTML;
                                obj.find('tbody').append(optionHtml);
                                obj.find('tbody').find('tr:last-child').find('input').attr("value",index3[key]);
                                obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                                for(var i = 0; i<numTr; i++) {
                                    obj.find('tbody').find('tr:last-child').find('th').after(td);
                                }
                            }
                        }
                        break;

                }
                scort++;
            });
        }
        var userId = "{{ $userId }}";
        //console.log(questPage);
        //保存处理
        function save(res) {

            var checkInfo = "";
            $(".create-form").children("div:gt(0)").each(function(item,obj){
                var type = $(obj).attr('name');
                var typeName = type.replace(/[^a-z]+/ig,"");
                var num = $(obj).children("div:eq(0)").find("li").html();
                var sum = $(obj).index("."+typeName);

                switch(typeName){
                    case "radio" :
                        checkInfo += ",type:radio|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";
                        //  获取值
                        $(obj).children(".options").each(function(key,index){
                            var key1 = key + 1;
                            var val = $(index).children("input:eq(0):checked").val();

                            checkInfo += "option" + key1+":"+val+"|";
                        });


                        break;
                    case "radioMulti" :
                        checkInfo += ",type:radioMulti|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";
                        //  获取值
                        $(obj).children(".options").each(function(key,index){
                            var key1 = key + 1;
                            var val = $(index).children("input:eq(0):checked").val();

                            checkInfo += "option" + key1+":"+val+"|";
                        });


                        break;
                    case "gapFill" :
                        checkInfo += ",type:gapFill|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";
                        //  获取内容
                        var option = $(obj).children(".options").children("input").val();
                        checkInfo += "option:"+option+"|";


                        break;
                    case "gapMultiFill" :
                        checkInfo += ",type:gapMultiFill|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";
                        //  获取值
                        $(obj).children(".options").each(function(key,index){
                            var key1 = key + 1;
                            var val = $(index).children("input:eq(1)").val();

                            checkInfo += "option" + key1+":"+val+"|";
                        });
                        break;
                    case "score" :
                        checkInfo += ",type:score|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";
                        //  获取内容
                        var option = $(obj).children(".allFormate").children("input").val();
                        checkInfo += "option:"+option+"|";
                        break;
                    case "name" :
                        checkInfo += ",type:name|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";
                        //  获取内容
                        var option = $(obj).find(".allFormate-input").val();
                        checkInfo += "option:"+option+"|";
                        break;
                    case "date" :
                        checkInfo += ",type:date|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";
                        //  获取内容
                        var option = $(obj).find(".mt20px").children("input").val();
                        option = option.replace(/:/g,"\.");
                        checkInfo += "option:"+option+"|";
                        break;
                    case "matrixRadio" :
                        checkInfo += ",type:matrixRadio|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";

                        var key = 1;
                        //  获取tr个数
                        var row = 0;
                        var trSum = $(obj).find('thead').find('th').length - 1;
                        //console.log(obj);
                        $(obj).find('tbody').find("tr").each(function(key1,index1){

                            for(row=0;row<trSum;row++) {
                                var val = $(index1).find("td").eq(row).find("input").attr('value');
                                checkInfo += row+"."+key1+":"+val+"|";
                            }
                        });

                        break;
                    case "matrixGapFill" :
                        checkInfo += ",type:matrixGapFill|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";

                        var key = 1;
                        //  获取tr个数
                        var row = 0;
                        var trSum = $(obj).find('thead').find('th').length -1 ;
                        //console.log("111"+trSum);
                        $(obj).find('tbody').find("tr").each(function(key1,index1){

                            for(row=0;row<trSum;row++) {
                                var val = $(index1).find("td").eq(row).find("input").val();
                                //console.log(row);
                                checkInfo += row+"."+key1+":"+val+"|";
                            }
                        });

                        break;
                    case "matrixScore" :
                        checkInfo += ",type:matrixScore|";
                        checkInfo += "page:0|";
                        checkInfo += "sum:"+sum+"|";

                        var key = 1;
                        //  获取tr个数
                        var row = 0;
                        var trSum = $(obj).find('thead').find('th').length -1;
                        //console.log("111"+trSum);
                        $(obj).find('tbody').find("tr").each(function(key1,index1){

                            for(row=0;row<trSum;row++) {
                                var val = $(index1).find("td").eq(row).find("input").val();
                                //console.log(row);
                                checkInfo += row+"."+key1+":"+val+"|";
                            }
                        });

                        break;
                    case 'descr' :
                        checkInfo += ",type:descr|";
                        break;
                    case 'hr' :
                        checkInfo += ",type:hr|";
                        break;
                }
            });

            console.log(checkInfo);
            //  AJax请求 想后台传送数据
            $.ajax({
                type: 'POST',
                url: '/home/savecheck',
                dataType: "json",
                data:{
                    "checkInfo" : checkInfo,
                    'userId' : userId,
                    'questId' : questId,
                    'page' : page1,
                    '_token':$('input[name=_token]').val(),
                },
                complete : function(data) {


                },
                success : function(data) {
                    console.log(data);
                    result = data.status;
                    if (data.status == 422) {
                        layer.alert(data.msg,{title:'错误提示',icon: 5});

                    } else {
                        $.each(data,function(idx,obj){
                            console.log(obj);
                            obj.forEach(function(item,index){
                                if(item['questId'] == questId) {
                                    oldArr.push(item);
                                }
                            });
                        });

                    }

                    /*oldArr = $.parseJSON(data);
                    oldArr.forEach(function(index,item){
                        console.log(index);
                    });*/
                }
            });
        }
        var result = 0;
        function sub() {

            //询问框

            layer.confirm('您确定答完题了吗？', {
                btn: ['是','否'] //按钮
            }, function(){
                $.ajax({
                    type: 'POST',
                    url: '/home/add_user_quest',
                    dataType: "json",
                    data:{
                        'userId' : userId,
                        'questId' : questId,
                        '_token':$('input[name=_token]').val(),
                    },
                    complete : function(data) {


                    },
                    success : function(data) {
                        if (data != 1) {
                            layer.alert(data.msg,{title:data,icon: 5});
                        }

                        /*oldArr = $.parseJSON(data);
                        oldArr.forEach(function(index,item){
                            console.log(index);
                        });*/
                    }
                });
                window.location.href = "/home/participate";
            }, function(){
                layer.msg('请继续作答', {
                    time: 20000, //20s后自动关闭
                    btn: ['OK']
                });
            });
            // if ( result != 422 ) {
            //     window.location.href = "/home/participate"
            // }

        }

    </script>

</body>
</html>