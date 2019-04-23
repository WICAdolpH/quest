<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>创建</title>
    <!-- css引入 -->
    <link rel="stylesheet" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/home/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/home/css/all/base.css">
    <link rel="stylesheet" href="/home/css/all/blue.css">
    <link rel="stylesheet" href="/home/css/all/content.css">
    <link rel="stylesheet" href="/script/layui/css/layui.css">
    <!-- Bootstrap -->


    <link rel="stylesheet" href="/home/css/use-check.css">

    <!-- js引入 -->
    <script src="/home/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
    <script src="/script/layer/layer.js"></script>
    <script src="/script/layui/layui.js"></script>
    <script src="/home/js/common/public.js"></script>

    <!-- 垂直导航条 -->
    <link rel="stylesheet" href="/home/css/leftnav.css" media="screen" type="text/css"/>
    <!-- 模板 -->
    <link href="/home/css/create.css" rel="stylesheet">
    <script type="text/javascript" src="/home/js/configBase.js"></script>

</head>
<body >

<div class="header-top">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="logo" style="float: left; margin-left: 30px">
                    <a href="#" style="font-size: 24px;">小猪问卷网<span class="sr-only">(current)</span></a>
                </div>
                <ul class="nav navbar-nav" style="float: right;margin-right: 30px">
                    <li>
                        <a href="create.php" style="font-size: 18px;">首页</a>

                    </li>
                    <li>
                        <a href="./user.php" style="font-size: 18px;">我的问卷</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 18px;">帮助中心</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
<!--主体框架开始-->
<div class="pagebox" id="pageContentId">
    <div class="home-desktop" id="desktop_scroll">
        <div style="width:1025px; position: relative;">
            <div class="title">
                <div class="name left" style="font-size: 18px">创建问卷&nbsp;&nbsp;<font size="2px"></font></div>
                <div class="function left">
                    <!--[&nbsp;<a href="javascript:;" onclick="definedLayer('/addTeacherData.html',{},'html');">添加</a>&nbsp;]-->
                </div>
                <div class="clear"></div>
            </div>
            <div class="create-questions-content">
                <div class="exam-nav" style="float: left;display: block;">
                    <div class="exam-item">
                        <div class="account-l fl " style="display: block;">
                            <span class="list-title">题型</span>
                            <ul id="accordion" class="accordion">
                                <li>
                                    <div class="link"><span >选择题</span><i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li id="radioQuest" class="quest"><a data-checkType="1" >单选题</a></li>
                                        <li id="radioMultiQuest" class="quest"><a>多选题</a></li>
                                        <!-- <li id="productlists"><a>图片选择</a></li> -->
                                        <!-- <li id="mysaled"><a>文字投票</a></li> -->
                                        <!-- <li id="mysaled"><a>下拉题</a></li> -->
                                    </ul>
                                </li>
                                <li>
                                    <div class="link"><span>填空题</span><i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li id="gapFillQuest" class="quest"><a>填空题</a></li>
                                        <li id="gapFillMultiQuest" class="quest"><a>多项填空</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link"><span>打分排序</span><i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li id="scoreQuest" class="quest"><a>打分题</a></li>
                                        <!-- <li id="publishrequire"><a>NPS题</a></li> -->
                                        <!-- <li id="scortQuest"><a>排序题</a></li> -->
                                    </ul>
                                </li>

                                <li>
                                    <div class="link"><span>备注说明</span><i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li id="descrQuest" class="quest"><a>备注说明</a></li>
                                        <li id="pageQuest" class="quest"><a>分页</a></li>
                                        <li id="hrQuest" class="quest"><a>分割线</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link"><span>个人信息</span><i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li id="nameQuest" class="quest"><a>姓名</a></li>
                                        <li id="phoneQuest" class="quest"><a>手机</a></li>
                                        <li id="emailQuest" class="quest"><a>邮箱</a></li>
                                        <li id="sexQuest" class="quest"><a>性别</a></li>
                                        <li id="dateQuest" class="quest"><a>日期</a></li>
                                        <li id="timeQuest" class="quest"><a>时间</a></li>
                                        <li id="cityQuest" class="quest"><a>城市/地址</a></li>
                                        <li id="addressQuest" class="quest"><a>地理位置</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link"><span>其他题型</span><i class="fa fa-chevron-down"></i></div>
                                    <ul class="submenu">
                                        <li id="usercomments" class="quest"><a>上传题</a></li>
                                        <li id="matrixRadioQuest" class="quest"><a>矩阵选择</a></li>
                                        <li id="matrixScoreQuest" class="quest"><a>矩阵打分</a></li>
                                        <li id="matrixGapFillQuest" class="quest"><a>矩阵填空</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <script src='/home/js/leftnav.js'></script>

                        </div>

                    </div>
                </div>
            </div>
            <form action="/home/checksave" class="create-form " id="create-form" >
                <a type="submit" class="btn btn-primary" value="保存" style="text-decoration: none;float:right;position: relative;margin-top: -45px;" id="sub" href="/home/usecheck">保存</a>
                <div  class="create-title right " style="background: white; display: inline; margin-bottom: 20px;">
                    <input type="text" name="title" value="问卷标题" onchange="Edit(this)">
                    <input type="text" name="title1" value="感谢您能抽出几分钟时间来参加本次答题，现在我们就马上开始吧！"
                           style="font-size: 20px; margin-top: -15px;" onchange="Edit(this)">
                    <input type="text" name="password" placeholder="密码（问卷密码权限）"
                           style="font-size: 20px; margin-top: -15px;"   onchange="Edit(this)">

                </div>
                {{ csrf_field() }}
            </form>
            <script src="/home/js/area/getArea.js"></script>
            <!-- 选择题单选选项 -->
            <script type="text\html" id="radio-option">
				<div class="options">
					<input name="" type="radio" value="1" style="cursor: pointer;">
					<input type="text" class="option"  name="" value="选项" onblur="mBlur(this)" onchange="toEdit(this)" id="option" >
					<span class="glyphicon glyphicon-minus-sign hide del" onclick="del(this)" style="width: 30px; height: 25px ; cursor: pointer;"></span>
				</div>
			</script>
            <!-- 选择题多选选项 -->
            <script type="text\html" id="radioMulti-option">
                <div class="options">
                    <input name="" type="checkbox" value="1" style="cursor: pointer;">
                    <input type="text" class="option"  name="" value="选项" onblur="mBlur(this)"   onchange="toEdit(this)" id="option">
                    <span class="glyphicon glyphicon-minus-sign hide del" onclick="del(this)" style="width: 30px; height: 25px ; cursor: pointer;"></span>
                </div>
            </script>
            <!-- 填空题增加选项 -->
            <script type="text\html" id="gapFill-option">
                <div class="allFormate options">
                        <input class="gapInput-title"  type="text" value="选项1" placeholder="选项1"  onchange="toEdit(this)" id="option">
                        <br>
                        <input type="text " class="gapInput" name=""  class="allFormate-input" readonly="true" >
                        <span class="glyphicon glyphicon-minus-sign hide" onclick="del(this)" style="width: 30px; height: 25px; cursor: pointer;"></span>
                </div>
            </script>
            <!-- 选择题单选 -->
            <script type="text\html" id="radio">
            	<!--选择题-->
                <div class="xxk_xzqh_box dxuan create create-radio allStyle radio create-option" name="" id="" draggable="true"  onmouseover="mOver(this)" onmouseout="mOut(this)"   >
                    <div class="radioId idStyle" style="display: inline;"><input type="hidden" value="" name=""><li style="display:inline;">1</li></div>
                    <div style="display: inline;"><input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" value="请输入标题" onchange="toEdit(this)" id="title"></div>

                    <div style="display:inline;"><span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)"></span></div>
                    <div class="options">
                        <input name="radio1-option1" value="1" type="radio" value="optionId" style="cursor: pointer;" readonly="true">
                        <input type="text" class="option"  name="radio1-option1-title" value="选项" onblur="mBlur(this)"  onchange="toEdit(this)" id="option">
                        <span class="glyphicon glyphicon-minus-sign hide del" onclick="del(this)" style="width: 30px; height: 25px; cursor: pointer;"></span>
                    </div>
                    <div class="options">
                        <input name="radio1-option1" type="radio" value="2" style="cursor: pointer;" readonly="true">
                        <input type="text" class="option"  name="radio1-option2-title" value="选项" onblur="mBlur(this)"  onchange="toEdit(this)" id="option">
                        <span class="glyphicon glyphicon-minus-sign hide del" onclick="del(this)" style="width: 30px; height: 25px ; cursor: pointer;"></span>
                    </div>
                    <div class="add-option" style="cursor: pointer;" onclick="add(this)">
                        <span  class="glyphicon glyphicon-plus-sign hide"></span>
                        <span class="hide" style="margin-left: 5px;margin-top: -5px;"  >添加选项</span>
                    </div>
                </div>
			</script>
            <!-- 选择题多选 -->
            <script type="text\html" id="radioMulti">
                <!--选择题-->
                <div class="xxk_xzqh_box dxuan create create-radio allStyle radioMulti create-option " name="" id=""  onmouseover="mOver(this)" onmouseout="mOut(this)"   >
                    <div class="radioId idStyle" style="display: inline;"><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;"><input type="text" class="radio-title" placeholder="请输入标题" value="请输入标题" onblur="mBlur(this)"  onchange="toEdit(this)" id="title"></div>

                    <div style="display:inline;"><span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)"></span></div>

                    <div class="options">
                        <input name="radioMulti1-option1" value="1" type="checkbox" value="optionId" style="cursor: pointer;" readonly="true">
                        <input type="text" class="option"  name="radioMulti1-option1" value="选项" onblur="mBlur(this)"  onchange="toEdit(this)" id="option">
                        <span class="glyphicon glyphicon-minus-sign hide del" onclick="del(this)" style="width: 30px; height: 25px; cursor: pointer;"></span>
                    </div>
                    <div class="options" >
                        <input name="radioMulti1-option1" type="checkbox" value="2" style="cursor: pointer;" readonly="true">
                        <input type="text" class="option"  name="radioMulti1-option2" value="选项" onblur="mBlur(this)"  onchange="toEdit(this)" id="option">
                        <span class="glyphicon glyphicon-minus-sign hide del" onclick="del(this)" style="width: 30px; height: 25px ; cursor: pointer;"></span>
                    </div>
                    <div class="add-option" style="cursor: pointer;" onclick="addMulti(this)">
                        <span  class="glyphicon glyphicon-plus-sign hide"></span>
                        <span class="hide" style="margin-left: 5px;margin-top: 15px;  "  >添加选项</span>
                    </div>
                </div>
            </script>
            <!-- 填空题 -->
            <script type="text\html" id="gapFill">
                <!-- 填空题 -->
                <div class="gapFill allStyle create create-option" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="gapFillId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="请输入标题"  onchange="toEdit(this)" id="title">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate gapInput">
                        <input type="text" name="" placeholder="" class="allFormate-input" readonly="true">
                    </div>
                </div>
            </script>
            <!-- 填空题（多项） -->
            <script type="text\html" id="gapMultiFill">
                <!-- 填空题 -->
                <div class="gapMultiFill allStyle create create-option" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="gapFillId idStyle" style="display: inline;"><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" value="请输入标题"  onchange="toEdit(this)" id="title">
                        {{--<span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">--}}
                        {{--</span>--}}
                    </div>
                    <div style="display:inline;"><span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)"></span></div>
                    <div class="allFormate gapMultiFill options">
                        <input class="gapInput-title"  type="text" value="选项1" placeholder="选项1" name=""  onchange="toEdit(this)" id="option">
                        <br>
                        <input type="text " class="gapInput" name=""  class="allFormate-input" readonly="true" >
                        <span class="glyphicon glyphicon-minus-sign hide" onclick="del(this)" style="width: 30px; height: 25px; cursor: pointer;"></span>
                    </div>
                    <div class="allFormate options">
                        <input class="gapInput-title"  type="text" value="选项2" placeholder="选项2" name=""  onchange="toEdit(this)" id="option">
                        <br>
                        <input type="text" class="gapInput" name=""  class="allFormate-input" readonly="true">
                        <span class="glyphicon glyphicon-minus-sign hide" onclick="del(this)" style="width: 30px; height: 25px; cursor: pointer;"></span>
                    </div>
                    <div class="add-option" style="cursor: pointer;" onclick="addGapFill(this)">
                        <span  class="glyphicon glyphicon-plus-sign hide"></span>
                        <span class="hide" style="margin-left: 5px;margin-top: 15px;  "  >添加选项</span>
                    </div>
                </div>
            </script>
            <!-- 矩阵填空题 -->
            <script type="text\html" id="matrixGapFill">
                <div class="matrixGapFill allStyle create create-option"  onmouseover="mOver(this)" onmouseout="mOut(this)" name="" id="">
                    <div class="matrixRadioId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="矩阵填空题"  onchange="toEdit(this)" id="title">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>
                    <div class="allFormate table-responsive" style="width:600px;">
                            <table class="table table-bordered  "    >
                              <thead >
                                <tr >
                                    <th style="width:122px;"></th>
                                    <th class="table_title tableCol1" style="">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " name="" value="选项1" style="width: 80px;float: left;"  onchange="toEdit(this)" id="option" direction="row">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                                            <li onclick="gapFillTableAddCol(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <th class="table_title tableCol1" style="">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " name="" value="选项2" style="width: 80px;float: left;"  onchange="toEdit(this)" id="option" direction="row">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                                            <li onclick="gapFillTableAddCol(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                </tr>

                              </thead>

                              <tbody>
                                <tr>
                                    <th class="table_title tableRow" style="width: 140px;">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " name="ppp" value="矩阵1" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                                            <li onclick="gapFillTableAddRow(this)" "><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <td align="center">
                                        <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" readonly="true" >
                                    </td>
                                    <td align="center">
                                        <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" readonly="true">
                                    </td>

                                </tr>
                                <tr>
                                    <th class="table_title tableRow">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " name="ppp" value="矩阵2" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                                            <li onclick="gapFillTableAddRow(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <td align="center" >
                                        <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" readonly="true">
                                    </td>
                                    <td align="center" >
                                        <input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" readonly="true">
                                    </td>

                                </tr>


                              </tbody>
                            </table>
                    </div>
                </div>
            </script>
            <!-- 矩阵分数题 -->
            <script type="text\html" id="matrixScore">
                <div class="matrixScore allStyle create create-option"  onmouseover="mOver(this)" onmouseout="mOut(this)" name="matrixRadio" id="matrixRadio">
                    <div class="matrixRadioId idStyle" style="display: inline;" name=""><li style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="矩阵分数题"  onchange="toEdit(this)" id="title" >
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>
                    <div class="allFormate table-responsive" style="width:600px;">
                            <table class="table table-bordered  "    >
                              <thead >
                                <tr >
                                    <th style="width:122px;"></th>
                                    <th class="table_title tableCol1" style="">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " name="" value="选项1" style="width: 80px;float: left;"  onchange="toEdit(this)" id="option" direction="row">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                                            <li onclick="scoreTableAddCol(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <th class="table_title tableCol1" style="">

                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " value="选项2" style="width: 80px;float: left;"  onchange="toEdit(this)" id="option" direction="row">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                                            <li onclick="scoreTableAddCol(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                </tr>

                              </thead>

                              <tbody>
                                <tr>
                                    <th class="table_title tableRow" style="width: 140px;">

                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " name="" value="矩阵1" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                                            <li onclick="scoreTableAddRow(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <td align="center">
                                        <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" readonly="true">
                                    </td>
                                    <td align="center">
                                        <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" readonly="true">
                                    </td>

                                </tr>
                                <tr>
                                    <th class="table_title tableRow">

                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " name="" value="矩阵2" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                                            <li onclick="scoreTableAddRow(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <td align="center" >
                                        <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" readonly="true">
                                    </td>
                                    <td align="center" >
                                        <input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" readonly="true">
                                    </td>

                                </tr>


                              </tbody>
                            </table>
                    </div>
                </div>
            </script>
            <!-- 矩阵分数行添加 -->
            <script type="text\html" id="matrixScoreRow">
                <tr>
                    <th class="table_title tableRow">
                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                            <input type="text" class="btn " value="矩阵2" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                            <li class="caret"></li>
                            <li class="sr-only">Toggle Dropdown</li>
                          </button>
                          <ul class="dropdown-menu" style="margin-top: 20px;">
                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                            <li onclick="scoreTableAddRow(this)"><a href="#">添加</a></li>
                          </ul>
                        </div>
                    </th>
                </tr>
            </script>
            <!-- 矩阵分数列添加 -->
            <script type="text\html" id="matrixScoreCol">
                <th class="table_title tableCol1" style="">
                    <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                        <input type="text" class="btn " value="选项1" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="row">
                      <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" style="margin-top: 20px;">
                        <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                        <li onclick="scoreTableAddCol(this)"><a href="#">添加</a></li>
                      </ul>
                    </div>
                </th>
            </script>
            <!-- 矩阵填空行添加 -->
            <script type="text\html" id="matrixGapFillRow">
                <tr>
                    <th class="table_title tableRow">
                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                            <input type="text" class="btn " value="矩阵2" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                            <li class="caret"></li>
                            <li class="sr-only">Toggle Dropdown</li>
                          </button>
                          <ul class="dropdown-menu" style="margin-top: 20px;">
                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                            <li onclick="gapFillTableAddRow(this)"><a href="#">添加</a></li>
                          </ul>
                        </div>
                    </th>
                </tr>
            </script>
            <!-- 矩阵填空列添加 -->
            <script type="text\html" id="matrixGapFillCol">
                <th class="table_title tableCol1" style="">
                    <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                        <input type="text" class="btn " value="选项1" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="row">
                      <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" style="margin-top: 20px;">
                        <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                        <li onclick="gapFillTableAddCol(this)"><a href="#">添加</a></li>
                      </ul>
                    </div>
                </th>
            </script>
            <!-- 矩阵单选列添加 -->
            <script type="text\html" id="matrixRadioRow">
                <tr>
                    <th class="table_title tableRow">
                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                            <input type="text" class="btn " value="矩阵2" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                            <li class="caret"></li>
                            <li class="sr-only">Toggle Dropdown</li>
                          </button>
                          <ul class="dropdown-menu" style="margin-top: 20px;">
                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                            <li onclick="radioTableAddRow(this)"><a href="#">添加</a></li>
                          </ul>
                        </div>
                    </th>
                </tr>
            </script>
            <!-- 矩阵单选排添加 -->
            <script type="text\html" id="matrixRadioCol">
                <th class="table_title tableCol1" style="">
                    <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                        <input type="text" class="btn " value="选项1" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="row">
                      <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" style="margin-top: 20px;">
                        <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                        <li onclick="radioTableAddCol(this)"><a href="#">添加</a></li>
                      </ul>
                    </div>
                </th>
            </script>
            <!-- 点击矩阵单选题 -->
            <script type="text\html" id="matrixRadio">
                <div class="matrixRadio allStyle create create-option"  onmouseover="mOver(this)" onmouseout="mOut(this)"  name="matrixRadio" id="matrixRadio">
                    <div class="matrixRadioId idStyle" style="display: inline;" name=""><input type="hidden" value="" name="" ><li style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="矩阵单选题"  onchange="toEdit(this)" id="title">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>
                    <div class="allFormate table-responsive" style="width:600px;">
                            <table class="table table-bordered  "    >
                              <thead >
                                <tr >
                                    <th style="width:122px;"></th>
                                    <th class="table_title tableCol1" style="">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " value="选项1" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="row">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                                            <li onclick="radioTableAddCol(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <th class="table_title tableCol1" style="">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " value="选项2" style="width: 80px;float: left;"  onchange="toEdit(this)" id="option" direction="row">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelCol(this)" name="row"><a href="#">删除</a></li>
                                            <li onclick="radioTableAddCol(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                </tr>

                              </thead>

                              <tbody>
                                <tr>
                                    <th class="table_title tableRow" style="width: 140px;">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " value="矩阵1" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                                            <li onclick="radioTableAddRow(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <td align="center">
                                        <li class="icon_radio" ></li>
                                    </td>
                                    <td align="center">
                                        <li class="icon_radio" ></li>
                                    </td>

                                </tr>
                                <tr>
                                    <th class="table_title tableRow">
                                        <div class="btn-group" style="margin-top: 0px; padding-top: -20px; height: 10px;width: 122px;">
                                            <input type="text" class="btn " value="矩阵2" style="width: 80px;"  onchange="toEdit(this)" id="option" direction="col">
                                          <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: white;">
                                            <li class="caret"></li>
                                            <li class="sr-only">Toggle Dropdown</li>
                                          </button>
                                          <ul class="dropdown-menu" style="margin-top: 20px;">
                                            <li onclick="tableDelRow(this)" name="col"><a href="#">删除</a></li>
                                            <li onclick="radioTableAddRow(this)"><a href="#">添加</a></li>
                                          </ul>
                                        </div>
                                    </th>
                                    <td align="center" >
                                        <li class="icon_radio" ></li>
                                    </td>
                                    <td align="center" >
                                        <li class="icon_radio" ></li>
                                    </td>

                                </tr>


                              </tbody>
                            </table>
                    </div>
                </div>
            </script>

            <!-- 分数题 -->
            <script type="text\html" id="score">
                <div class="score allStyle create-option create " onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="gapFillId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" value="请输入标题" name=""  onchange="toEdit(this)" id="title">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>
                    <div class="allFormate">
                        <div class="nps_radius">0</div>
                        <div class="nps_radius">1</div>
                        <div class="nps_radius">2</div>
                        <div class="nps_radius">3</div>
                        <div class="nps_radius">4</div>
                        <div class="nps_radius">5</div>
                        <div class="nps_radius">6</div>
                        <div class="nps_radius">7</div>
                        <div class="nps_radius">8</div>
                        <div class="nps_radius">9</div>
                        <div class="nps_radius">10</div>
                    </div>
                </div>
            </script>
            <!-- 备注说明 -->
            <script type="text\html" id="descr">
                <div class="descr allStyle create-option  create " onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="gapFillId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text " class="descrContent" placeholder="备注说明"  name="" value="备注说明"  onchange="toEdit(this)" >
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 300px;cursor: pointer; " onclick="delAll(this)">
                        </span>
                    </div>

                </div>
            </script>
            <!-- 分页 -->
            <script type="text\html" id="page">
                <div class="page allStyle create-option create  "  onmouseover="mOver(this)" onmouseout="mOut(this)" name="" id="">
                    <div class="gapFillId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <p style="font-size: 16px;color: #484848;display: inline;">分页</p>
                        <input type="text " class="descrContent" placeholder="分页1/1"  name="" value="1/1" readonly="true">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 160px;cursor: pointer; " onclick="delAll(this)">
                        </span>
                    </div>
                </div>
            </script>
            <!-- 分割线 -->
            <script type="text\html" id="hr">
                <div class="hr allStyle create-option  create "  onmouseover="mOver(this)" onmouseout="mOut(this)" name="" id="">
                    <div class="hrId idStyle" style="float:left;margin-top:-20px;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;margin-left:100px;padding-left:100px; ">
                        <hr class="hrStyle" style="margin-left: 80px; margin-top:-50px;width:300px;"/>
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; cursor: pointer; margin-top: 15px;margin-left:280px;" onclick="delAll(this)">
                        </span>
                    </div>
                </div>
            </script>
            <!-- 姓名 -->
            <script type="text\html" id="name">
                <div class="name allStyle create create-option " onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="nameId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="姓名"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate gapInput">
                        <input type="text" name="" placeholder="" class="allFormate-input" readonly="true">
                    </div>
                </div>
            </script>
            <!-- 手机 -->
            <script type="text\html" id="phone">
                <div class="phone allStyle create create-option phone" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="phoneId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="手机"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate gapInput">
                        <input type="text" name="" placeholder="" class="allFormate-input" readonly="true">
                    </div>
                </div>
            </script>
            <!-- 邮箱 -->
            <script type="text\html" id="email">
                <div class="email allStyle create create-option email" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="emailId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="邮箱"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate gapInput">
                        <input type="text" name="" placeholder="" class="allFormate-input" readonly="true">
                    </div>
                </div>
            </script>
            <!-- 性别 -->
            <script type="text\html" id="sex">
                <div class="sex allStyle create create-option sex" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="sexId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="性别"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate gapInput">
                        <input type="text" name="" placeholder="" class="allFormate-input" readonly="true">
                    </div>
                </div>
            </script>
            <!-- 日期 -->
            <script type="text\html" id="date">
                <div class="date allStyle create create-option date" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="dateId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="请选择日期"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate gapInput">
                        <input type="text" name="" placeholder="" class="allFormate-input" readonly="true">
                    </div>
                </div>
            </script>
            <!-- 时间 -->
            <script type="text\html" id="time">
                <div class="time allStyle create create-option time" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="timeId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="请选择时间"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate ">
                        <select name="hour" id="" class="timeQuestStyle" disabled="disabled">
                            <option value="-1">小时</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>

                        </select> :
                        <select name="minute"  class="timeQuestStyle" disabled="disabled" >
                            <option value="-1">分钟</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option></select>
                    </div>
                </div>
            </script>
            <!-- 城市/地址 -->
            <script type="text\html" id="city">
                <div class="name allStyle create create-option city" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="nameId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="城市地址"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate ">
                        <li class="select-box" style="width:110px; margin-bottom: 10px;">
                            <select class="select" name="country_id" size="1" style="height: 30px;width: 400px;">
                                <option value="0">国家</option>
                                @foreach($country as $val)
                                 <option value="{{$val -> id}}">{{$val -> area}}</option>
                                @endforeach
                            </select>
                         </li>
                         <li class="select-box" style="width:110px;margin-bottom: 10px;">
                            <select class="select" name="province_id" size="1" style="height: 30px;width: 400px;">
                                <option value="0">省份/州</option>
                            </select>
                         </li>
                         <li class="select-box" style="width:110px;margin-bottom: 10px;">
                            <select class="select" name="city_id" size="1" style="height: 30px;width: 400px;">
                                <option value="0">城市</option>
                            </select>
                        </li>
                        <li class="select-box" style="width:110px;margin-bottom: 10px;">
                            <select class="select" name="county_id" size="1" style="height: 30px;width: 400px;">
                                <option value="0">县区</option>
                            </select>
                        </li>
                    </div>
                </div>
</script>
            <!-- 位置 -->
            <script type="text\html" id="address">
                <div class="address allStyle create create-option address" onmouseover="mOver(this)" onmouseout="mOut(this)"  name="" id="">
                    <div class="addressId idStyle" style="display: inline;" name=""><input type="hidden" value="" name=""><li  style="display:inline;">1</li></div>
                    <div style="display: inline;">
                        <input type="text" class="radio-title" placeholder="请输入标题" onblur="mBlur(this)" name="" value="获取当前位置信息"  onchange="toEdit(this)">
                        <span class="glyphicon glyphicon-trash hide" style="width: 30px; height: 30px; margin-left: 80px;cursor: pointer;" onclick="delAll(this)">
                        </span>
                    </div>

                    <div class="allFormate gapInput">
                        <i class="layui-icon layui-icon-location"></i>
                        <input type="text" name="" placeholder="" class="allFormate-input" readonly="true" value="获取位置"  onchange="toEdit(this)">
                    </div>
                </div>
            </script>
            <!--请在下方写此页面业务相关的脚本-->
            <script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
            <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
            <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
            <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
            <script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
            <script src="/home/js/score/jquery.barrating.js"></script>
            <script src="/home/js/score/examples.js"></script>
            <script src="/home/js/use-check.js"></script>
        </div>
    </div>
</div>

<script>
    $(function(){

        //在选择国家之后列出省份的数据
        $('select[name=country_id]').change(function(){
            //获取当前国家id
            var id = $(this).val();
            $.get('/admin/user/getareabyid',{id:id},function(data){
                //jQuery的循环操作
                var str = '';
                $.each(data,function(index,el){
                    str += "<option value='" + el.id + "'>" + el.area + "</option>";
                });
                //在追加之前先清除之前的二级下的数据
                $('select[name=province_id]').find('option:gt(0)').remove();
                $('select[name=city_id]').find('option:gt(0)').remove();
                $('select[name=county_id]').find('option:gt(0)').remove();
                //将数据放到对应的option之后
                $('select[name=province_id]').append(str);
            },'json');
        });

        //在选择省份/州之后列出城市的数据
        $('select[name=province_id]').change(function(){
            //获取当前省份/州id
            var id = $(this).val();
            $.get('/admin/user/getareabyid',{id: id},function(data){
                //jQuery的循环操作
                var str = '';
                $.each(data,function(index,el){
                    str += "<option value='" + el.id + "'>" + el.area + "</option>";
                });
                //在追加之前先清除之前的三级之后的数据
                $('select[name=city_id]').find('option:gt(0)').remove();
                $('select[name=county_id]').find('option:gt(0)').remove();
                //将数据放到对应的option之后
                $('select[name=city_id]').append(str);
            },'json');
        });

        //在选择城市之后列出省份的数据
        $('select[name=city_id]').change(function(){
            //获取当前城市id
            var id = $(this).val();
            $.get('/admin/user/getareabyid',{id: id},function(data){
                //jQuery的循环操作
                var str = '';
                $.each(data,function(index,el){
                    str += "<option value='" + el.id + "'>" + el.area + "</option>";
                });
                //在追加之前先清除之前的二级下的数据
                $('select[name=county_id]').find('option:gt(0)').remove();
                //将数据放到对应的option之后
                $('select[name=county_id]').append(str);
            },'json');
        });

    });
    var list = "";
    var save = 0;
    var newData = "";
    var isClick = 0;



    function Edit(obj) {
        var type = $(obj).attr('name');
        var content = $(obj).val();

        $.ajax({
            type: 'POST',
            url: '/home/edit',
            dataType: "json",
            data:{
                "type" : type,
                "content" : content,
                "password" : content,
                '_token':$('input[name=_token]').val(),
            },
            complete : function(msg) {
                if (msg.status == 422) {
                    var json=JSON.parse(msg.responseText);
                    json = json.errors;
                    for ( var item in json) {
                        for ( var i = 0; i < json[item].length; i++) {
                            //alert(json[item][i]);
                            layer.alert(json[item][i],{title:'错误提示',icon: 5});
                            return ; //遇到验证错误，就退出
                        }
                    }

                }
            },
            success : function(data) {
                alert(111);
            }
        });
    }
    var divSum = 0;
    //  判断数据来源  如果是1就是刷新来的页面 是0就是新创建的
    @if ($statue == 1)
        var quest = "{{ $questionnaire }}";
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
            });
            switch (arrType['type']) {
                case 'radio' :
                    var _html = document.getElementById('radio').innerHTML;
                    $('.create-form').append(_html);

                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','radio'+index1);
                    obj.attr('id','radio'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    obj.children(".options").remove();
                    //  追加心得元素
                    var optionHtml = document.getElementById('radio-option').innerHTML;
                    for ( key in arrType ) {
                        if (key.replace(/[^a-z]+/ig,"") === "option") {
                            obj.children("div:last-child").before(optionHtml);
                            obj.children("div:last-child").prev().find('input:eq(1)').attr("value",arrType[key]);
                        }
                    }
                    break;
                case 'radioMulti' :
                    var _html = document.getElementById('radioMulti').innerHTML;
                    $('.create-form').append(_html);

                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','radioMulti'+index1);
                    obj.attr('id','radioMulti'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    obj.children(".options").remove();
                    //  追加心得元素
                    var optionHtml = document.getElementById('radioMulti-option').innerHTML;
                    for ( key in arrType ) {
                        if (key.replace(/[^a-z]+/ig,"") === "option") {
                            obj.children("div:last-child").before(optionHtml);
                            obj.children("div:last-child").prev().find('input:eq(1)').attr("value",arrType[key]);
                        }
                    }
                    break;
                case 'gapFill' :
                    var _html = document.getElementById('gapFill').innerHTML;
                    $('.create-form').append(_html);

                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','gapFill'+index1);
                    obj.attr('id','gapFill'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    obj.children(".options").remove();
                    break;
                case 'gapMultiFill' :
                    var _html = document.getElementById('gapMultiFill').innerHTML;
                    $('.create-form').append(_html);

                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','gapMultiFill'+index1);
                    obj.attr('id','gapMultiFill'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    obj.children(".options").remove();
                    //  追加心得元素
                    var optionHtml = document.getElementById('gapFill-option').innerHTML;
                    for ( key in arrType ) {
                        if (key.replace(/[^a-z]+/ig,"") === "option") {
                            obj.children("div:last-child").before(optionHtml);
                            obj.children("div:last-child").prev().find('input:eq(0)').attr("value",arrType[key]);
                        }
                    }
                    break;
                case 'score' :
                    var _html = document.getElementById('score').innerHTML;
                    $('.create-form').append(_html);

                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','score'+index1);
                    obj.attr('id','score'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    obj.children(".options").remove();
                    break;
                case 'descr' :
                    var _html = document.getElementById('descr').innerHTML;
                    $('.create-form').append(_html);

                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','descr'+index1);
                    obj.attr('id','descr'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    obj.children(".options").remove();
                    break;
                case 'page' :
                    var _html = document.getElementById('page').innerHTML;

                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','descr'+index1);
                    obj.attr('id','descr'+index1);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);

                    var num = arrType['num']+"/"+arrType['typeNum'];
                    obj.find('input').attr('value',num);
                    break;
                case 'hr' :
                    var _html = document.getElementById('hr').innerHTML;
                    $('.create-form').append(_html);

                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','hr'+index1);
                    obj.attr('id','hr'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);

                    break;
                case 'name' :
                    var _html = document.getElementById('name').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','name'+index1);
                    obj.attr('id','name'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'email' :
                    var _html = document.getElementById('email').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','email'+index1);
                    obj.attr('id','email'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'phone' :
                    var _html = document.getElementById('phone').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','phone'+index1);
                    obj.attr('id','phone'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'sex' :
                    var _html = document.getElementById('sex').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','sex'+index1);
                    obj.attr('id','sex'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'date' :
                    var _html = document.getElementById('date').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','date'+index1);
                    obj.attr('id','date'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'time' :
                    var _html = document.getElementById('time').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','time'+index1);
                    obj.attr('id','time'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'city' :
                    var _html = document.getElementById('city').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','city'+index1);
                    obj.attr('id','city'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'address' :
                    var _html = document.getElementById('address').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','address'+index1);
                    obj.attr('id','address'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    break;
                case 'matrixRadio' :
                    var _html = document.getElementById('matrixRadio').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    console.log("index:"+index);
                    obj.attr('name','matrixRadio'+index1);
                    obj.attr('id','matrixRadio'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    //  移除row方向元素和col方向元素
                    obj.find("thead").find("th:eq(1)").remove();
                    obj.find("thead").find("th:eq(1)").remove();
                    obj.find("tbody").find("tr").remove();
                    //  追加心得元素
                    var numTr = 0;
                    for ( key in arrType ) {
                        if (key.replace(/[^a-z]+/ig,"") === "row") {
                            //  获取th个数
                            var th = obj.find('thead').find('th').length ;
                            numTr++;
                            var optionHtml = document.getElementById('matrixRadioCol').innerHTML;
                            obj.find('thead').find('tr').append(optionHtml);
                            obj.find('thead').find('th:last-child').find('input').attr("value",arrType[key]);
                            obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                        }
                        if (key.replace(/[^a-z]+/ig,"") === "col") {
                            var td = '<td align=\"center\">\n '+
                                '<li class=\"icon_radio\" ></li>\n' +
                                '</td>';
                            //  获取tr个数
                            var trLen = obj.find('tbody').find('tr').length  + 1;
                            var optionHtml = document.getElementById('matrixRadioRow').innerHTML;
                            obj.find('tbody').append(optionHtml);
                            obj.find('tbody').find('tr:last-child').find('input').attr("value",arrType[key]);
                            obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                            for(var i = 0; i<numTr; i++) {
                                obj.find('tbody').find('tr:last-child').find('th').after(td);
                            }
                        }
                    }
                    break;
                case 'matrixScore' :
                    var _html = document.getElementById('matrixScore').innerHTML;
                    $('.create-form').append(_html);
                    var obj = $(".create-option:last-child");
                    var index1 = index + 1;
                    obj.attr('name','matrixScore'+index1);
                    obj.attr('id','matrixScore'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    //  移除row方向元素和col方向元素
                    obj.find("thead").find("th:eq(1)").remove();
                    obj.find("thead").find("th:eq(1)").remove();
                    obj.find("tbody").find("tr").remove();
                    //  追加心得元素
                    var numTr = 0;
                    for ( key in arrType ) {
                        if (key.replace(/[^a-z]+/ig,"") === "row") {
                            //  获取th个数
                            var th = obj.find('thead').find('th').length ;
                            numTr++;
                            var optionHtml = document.getElementById('matrixScoreCol').innerHTML;
                            obj.find('thead').find('tr').append(optionHtml);
                            obj.find('thead').find('th:last-child').find('input').attr("value",arrType[key]);
                            obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                        }
                        if (key.replace(/[^a-z]+/ig,"") === "col") {
                            var td = '<td align="center">'+
                                '<input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" readonly="true">'+
                                '</td>';
                            //  获取tr个数
                            var trLen = obj.find('tbody').find('tr').length  + 1;
                            var optionHtml = document.getElementById('matrixScoreRow').innerHTML;
                            obj.find('tbody').append(optionHtml);
                            obj.find('tbody').find('tr:last-child').find('input').attr("value",arrType[key]);
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
                    var index1 = index + 1;
                    obj.attr('name','matrixGapFill'+index1);
                    obj.attr('id','matrixGapFill'+index1);
                    $(".create-option:last-child").children("div:eq(0)").find('li').html(index1);
                    obj.children("div:eq(1)").find("input").attr("value",arrType['title']);
                    //  移除row方向元素和col方向元素
                    obj.find("thead").find("th:eq(1)").remove();
                    obj.find("thead").find("th:eq(1)").remove();
                    obj.find("tbody").find("tr").remove();
                    //  追加心得元素
                    var numTr = 0;
                    for ( key in arrType ) {
                        if (key.replace(/[^a-z]+/ig,"") === "row") {
                            //  获取th个数
                            var th = obj.find('thead').find('th').length ;
                            numTr++;
                            var optionHtml = document.getElementById('matrixGapFillCol').innerHTML;
                            obj.find('thead').find('tr').append(optionHtml);
                            obj.find('thead').find('th:last-child').find('input').attr("value",arrType[key]);
                            obj.find('thead').find('th:last-child').find('input').attr("name","row"+th);
                        }
                        if (key.replace(/[^a-z]+/ig,"") === "col") {
                            var td = '<td align="center">'+
                                '<input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" readonly="true">'+
                                '</td>';
                            //  获取tr个数
                            var trLen = obj.find('tbody').find('tr').length  + 1;
                            var optionHtml = document.getElementById('matrixGapFillRow').innerHTML;
                            obj.find('tbody').append(optionHtml);
                            obj.find('tbody').find('tr:last-child').find('input').attr("value",arrType[key]);
                            obj.find('tbody').find('tr:last-child').find('input').attr("name","col"+trLen);
                            for(var i = 0; i<numTr; i++) {
                                obj.find('tbody').find('tr:last-child').find('th').after(td);
                            }
                        }
                    }
                    break;
            }

        });

    @endif


</script>

</body>
</html>