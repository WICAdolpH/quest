<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>创建</title>

    <!-- css引入 -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/home/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/home/css/checkdata/checkdata.css">


    <!-- js引入 -->
    <script src="/home/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
    <script src="/script/layer/layer.js"></script>
    <!-- 选择插件 -->
    <script type="text/javascript" src="/home/js/radio/jsapi.js"></script>
    <script type="text/javascript" src="/home/js/radio/corechart.js"></script>
    <script type="text/javascript" src="/home/js/radio/jquery.gvChart-1.0.1.min.js"></script>
    <script type="text/javascript" src="/home/js/radio/jquery.ba-resize.min.js"></script>
    <!-- 矩阵选择/分数插件 -->
    <script src="http://cdn.highcharts.com.cn/highcharts/highcharts.js"></script>
    {{-- 分页插件 --}}
    <script src="/home/js/page/myPagination.js"></script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }




        .pageBox {
            padding: 10px 0 0 0;
            margin-left: 5%;
        }

        .pageBox span {
            display: inline-block;
            width: 60px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            color: #fff;
            background: 	#77DDFF;

        }

        .pageNav {
            display: inline-block;
        }

        .pageNav a {
            display: inline-block;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            color: #3a87ad;
            text-decoration: none;
        }

        .pageNav a.active, .pageNav a:hover {
            background: #3a87ad;
            color: #EFEFEF;
        }

        .prev:hover {
            cursor: pointer;
        }

        .next:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="question_content">

    </div>
</body>
<!-- 单选 -->
<script type="text/html" id="radio">
    <div class="divStyle " name="111">
        <div><input type="hidden" value=""></div>
        <div class="anshed">
                <span class="spanlh fL" title="请选择一个选项">
                Q1:请选择一个选项(单选题)
                </span>
        </div>
        <div class="show">
            <!-- 圆饼图数据 -->
            <div style="width:600px;margin:0 auto;">
                <table class='radio'>
                    <!-- <caption>会员地区分布</caption> -->
                    <thead>
                    <tr>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1200</th>

                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- 表格数据 -->
            <div class="chart_table" >
                <table class="table">
                    <tr>
                        <td style="width:60px">选项</td>
                        <td class="lbn">&nbsp;</td>
                        <td style="width:80px">回复情况</td>
                        <td class="lbn">&nbsp;</td>
                    </tr>
                    {{--<tr>--}}
                    {{--<td style="width:60px">选项1</td>--}}
                    {{--<td class="lbn">&nbsp;</td>--}}
                    {{--<td style="width:80px">100.00%</td>--}}
                    {{--<td class="lbn">&nbsp;</td>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                    {{--<td align="left" colspan="4"> 回答人数：1</td>--}}
                    {{--</tr>--}}
                </table>

            </div>



        </div>
    </div>

</script>
<!-- 多选 -->
<script type="text/html" id="radioMulti">
    <div class="divStyle " name="111">
        <div><input type="hidden" value=""></div>
        <div class="anshed">
                <span class="spanlh fL" title="请选择一个选项">
                Q1:请选择一个选项(单选题)
                </span>
        </div>
        <div class="show">
            <!-- 圆饼图数据 -->
            <div style="width:600px;margin:0 auto;">
                <table class='radio'>
                    <!-- <caption>会员地区分布</caption> -->
                    <thead>
                    <tr>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>1200</th>

                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- 表格数据 -->
            <div class="chart_table" >
                <table class="table">
                    <tr>
                        <td style="width:60px">选项</td>
                        <td class="lbn">&nbsp;</td>
                        <td style="width:80px">回复情况</td>
                        <td class="lbn">&nbsp;</td>
                    </tr>
                    {{--<tr>--}}
                    {{--<td style="width:60px">选项1</td>--}}
                    {{--<td class="lbn">&nbsp;</td>--}}
                    {{--<td style="width:80px">100.00%</td>--}}
                    {{--<td class="lbn">&nbsp;</td>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                    {{--<td align="left" colspan="4"> 回答人数：1</td>--}}
                    {{--</tr>--}}
                </table>

            </div>



        </div>
    </div>

</script>
{{-- 矩阵单选题 --}}
<script type="text/html" id="matrixRadio">
    <!-- 矩阵单选题题 -->
    <div class="divStyle fill matrixRadio">
        <div class="anshed">
                <span class="spanlh fL" title="请选择一个选项">
                Q3:请填空(矩阵单选题)
                </span>
        </div>
        <div class="show">
            <!-- 图标数据 -->
            <div  style="min-width:400px;height:400px"></div>
<!-- 表格数据 -->
            <div class="tableHtml">
                <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th></th>
                        {{--<th>First Name</th>--}}
                        {{--<th>Last Name</th>--}}
                        {{--<th>Username</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    {{--<tr>--}}
                    {{--<th scope="row">1</th>--}}
                    {{--<td>Mark</td>--}}
                    {{--<td>Otto</td>--}}
                    {{--<td>@mdo</td>--}}
                    {{--</tr>--}}

                    </tbody>
                </table>
            </div>

    </div>
</div>
</script>
{{-- 矩阵分数提 --}}
<script type="text/html" id="matrixScore">
    <!-- 矩阵分数题题 -->
    <div class="divStyle fill gapFill">
        <div class="anshed">
                <span class="spanlh fL" title="请选择一个选项">
                Q3:请填空(矩阵题)
                </span>
        </div>
        <div class="show">
            <table class="table table-bordered" >
                <thead>
                <tr>
                    <th></th>
                    {{--<th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>--}}
                </tr>
                </thead>
                <tbody>
                {{--<tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>--}}

                </tbody>
            </table>
        </div>
    </div>
</script>
{{-- 填空题 --}}
<script type="text/html" id="gapFill">
    <div class="divStyle fill gapFill">
        <div class="anshed">
                <span class="spanlh fL" title="请选择一个选项">
                Q2:请填空(填空题)
                </span>
        </div>
        <div class="show">
            <table class="table " >
                <thead>
                <tr>

                </tr>
                </thead>
                <tbody>
                {{--<tr>
                    <th scope="row">1</th>
                </tr>--}}
                </tbody>

            </table>
            <div id="pageBox" class="pageBox">
                <span id="prev" class="prev">上一页</span>
                <ul id="pageNav" class="pageNav"></ul>
                <span id="next" class="next">下一页</span>
            </div>
        </div>

    </div>
</script>
<script>
    var radioScript = 0;
    var checkdata = "{{ $checkData }}";
    console.log(checkdata);
    checkdata = checkdata.split(",");
    checkdata.shift();
    checkdata.forEach(function(item,index){
        var arrType = [];
        var data = item.split("|");
        data.forEach(function(data1,dataKey){
            data1 = data1.split(":");
            arrType[data1[0]] = data1[1];
        });
        switch (arrType['type']) {
            case "radio" :
                var _html = document.getElementById('radio').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","radio"+num);
                obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(1)").find("span").html("Q"+num1+":"+arrType['title']+"(单选题)");

                //  数据整理
                // obj.find("#radioTable"+num).find("thead").find("th:gt(0)").delete();
                // obj.find("#radioTable"+num).find("thead").find("tr").append("<td></td>");

                var sum = 0;
                var sum1 = 0;
                for (k in arrType) {
                    if (k.replace(/[^a-z]+/ig,"") === "optionNum") {
                        //  图修改
                        sum1 = Number(sum1) + Number(arrType[k]);
                    }
                }
                for (k in arrType) {
                    if (k.replace(/[^a-z]+/ig,"") === "option" && k.replace(/[^a-z]+/ig,"") !== "optionNum") {
                        //  图修改
                        obj.find("#radioTable"+num).find("thead").find("tr").append("<th>"+arrType[k]+"</th>");
                        //  表格修改
                        var trHtml = "<tr>\n" +
                            "                    <td style=\"width:60px\">选项1</td>\n" +
                            "                    <td class=\"lbn\">&nbsp;</td>\n" +
                            "                    <td style=\"width:80px\">100.00%</td>\n" +
                            "                    <td class=\"lbn\">&nbsp;</td>\n" +
                            "                </tr>";
                        obj.find(".table ").append(trHtml);
                        obj.find(".table").find("tr:last-child").find("td:eq(0)").html(arrType[k]);
                    }
                    if (k.replace(/[^a-z]+/ig,"") === "optionNum") {
                        //  图修改
                        sum = Number(sum) + Number(arrType[k]);
                        obj.find("#radioTable"+num).find("tbody").find("tr").append("<td>"+arrType[k]+"</td>");
                        //  表格修改
                        var percent = (Number(arrType[k])*1.00)/Number(sum1);
                        percent = percent.toFixed(2) * 100;
                        if (percent) {
                            percent = percent + "%";
                        } else {
                            percent = "0";
                        }

                        obj.find(".table").find("tr:last-child").find("td:eq(2)").html(percent);
                    }
                }
                obj.find("#radioTable"+num).find("tbody").find("th:eq(0)").html(sum);
                if(radioScript === 0) {
                    gvChartInit();
                }
                $('#radioTable'+num).gvChart({
                    chartType: 'PieChart',
                    gvSettings: {
                        vAxis: {title: 'No of players'},
                        hAxis: {title: 'Month'},
                        width: 600,
                        height: 350
                    }
                });
                radioScript = 1;
                break;
            case "radioMulti" :
                var _html = document.getElementById('radioMulti').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","radioMulti"+num);
                obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(1)").find("span").html("Q"+num1+":"+arrType['title']+"(多选题)");

                //  数据整理
                // obj.find("#radioTable"+num).find("thead").find("th:gt(0)").delete();
                // obj.find("#radioTable"+num).find("thead").find("tr").append("<td></td>");

                var sum = 0;
                var sum1 = 0;
                for (var k in arrType) {
                    if (k.replace(/[^a-z]+/ig,"") === "optionNum") {
                        //  图修改
                        sum1 = Number(sum1) + Number(arrType[k]);
                    }
                }
                for (k in arrType) {
                    if (k.replace(/[^a-z]+/ig,"") === "option" && k.replace(/[^a-z]+/ig,"") !== "optionNum") {
                        //  图修改
                        obj.find("#radioTable"+num).find("thead").find("tr").append("<th>"+arrType[k]+"</th>");
                        //  表格修改
                        var trHtml = "<tr>\n" +
                            "                    <td style=\"width:60px\">选项1</td>\n" +
                            "                    <td class=\"lbn\">&nbsp;</td>\n" +
                            "                    <td style=\"width:80px\">100.00%</td>\n" +
                            "                    <td class=\"lbn\">&nbsp;</td>\n" +
                            "                </tr>";
                        obj.find(".table ").append(trHtml);
                        obj.find(".table").find("tr:last-child").find("td:eq(0)").html(arrType[k]);
                    }
                    if (k.replace(/[^a-z]+/ig,"") === "optionNum") {
                        //  图修改
                        sum = Number(sum) + Number(arrType[k]);
                        obj.find("#radioTable"+num).find("tbody").find("tr").append("<td>"+arrType[k]+"</td>");
                        //  表格修改
                        var percent = (Number(arrType[k])*1.00)/Number(sum1);
                        percent = percent.toFixed(2) * 100;
                        if (percent) {
                            percent = percent + "%";
                        } else {
                            percent = "0";
                        }

                        obj.find(".table").find("tr:last-child").find("td:eq(2)").html(percent);
                    }
                }
                obj.find("#radioTable"+num).find("tbody").find("th:eq(0)").html(sum);
                if(radioScript === 0) {
                    gvChartInit();
                }
                $('#radioTable'+num).gvChart({
                    chartType: 'PieChart',
                    gvSettings: {
                        vAxis: {title: 'No of players'},
                        hAxis: {title: 'Month'},
                        width: 600,
                        height: 350
                    }
                });
                radioScript = 1;
                break;
            case "gapFill" :
                var _html = document.getElementById('gapFill').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","gapFill"+num);
                //obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(0)").find("span").html("Q"+num1+":"+arrType['title']+"(填空题)");
                obj.find("thead").find("th").html(arrType['title']);
                //  分页处理
                obj.find("tbody").attr("id","pageMain"+num);
                obj.find(".show").find("div:eq(0)").attr("id","pageBox"+num);
                obj.find(".show").find("div:eq(0)").find("span:eq(0)").attr('id',"prev"+num);
                obj.find(".show").find("div:eq(0)").find("span:eq(1)").attr('id',"next"+num);
                obj.find(".show").find("div:eq(0)").find("ul").attr("id","pageNav"+num);
                var sum = 0;
                for (var k in arrType) {
                    if (k.replace(/[^a-z]+/ig,"") === "option") {
                        //  表格数据修改
                        var trHtml = "<tr>\n" +
                            "                    <th >1</th>\n" +
                            "                </tr>";
                        obj.find("tbody").append(trHtml);
                        obj.find("tbody").find("tr:last-child").find("th").html(arrType[k]);
                    }
                }
                /*分页数据*/
                $(function () {
                    tabPage({
                        pageMain: '#pageMain'+num,
                        pageNav: '#pageNav'+num,
                        pagePrev: '#prev'+num,
                        pageNext: '#next'+num,
                        curNum: 1, /*每页显示的条数*/
                        activeClass: 'active', /*高亮显示的class*/
                        ini: 0/*初始化显示的页面*/
                    });
                    function tabPage(tabPage) {
                        var pageMain = $(tabPage.pageMain);
                        /*获取内容列表*/
                        var pageNav = $(tabPage.pageNav);
                        /*获取分页*/
                        var pagePrev = $(tabPage.pagePrev);
                        /*上一页*/
                        var pageNext = $(tabPage.pageNext);
                        /*下一页*/


                        var curNum = tabPage.curNum;
                        /*每页显示数*/
                        var len = Math.ceil(pageMain.find("tr").length / curNum);
                        /*计算总页数*/
                        console.log(len);
                        var pageList = '';
                        /*生成页码*/
                        var iNum = 0;
                        /*当前的索引值*/

                        for (var i = 0; i < len; i++) {
                            pageList += '<a href="javascript:;">' + (i + 1) + '</a>';
                        }
                        pageNav.html(pageList);
                        /*头一页加高亮显示*/
                        pageNav.find("a:first").addClass(tabPage.activeClass);

                        /*******标签页的点击事件*******/
                        pageNav.find("a").each(function(){
                            $(this).click(function () {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                $(this).addClass(tabPage.activeClass);
                                iNum = $(this).index();
                                $(pageMain).find("tr").hide();
                                for (var i = ($(this).html() - 1) * curNum; i < ($(this).html()) * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }

                            });
                        })


                        $(pageMain).find("tr").hide();
                        /************首页的显示*********/
                        for (var i = 0; i < curNum; i++) {
                            $(pageMain).find("tr").eq(i).show()
                        }


                        /*下一页*/
                        pageNext.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == len - 1) {
                                //alert('已经是最后一页');
                                for (var i = (len - 1) * curNum; i < len * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum++;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
//                    ini(iNum);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        });
                        /*上一页*/
                        pagePrev.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == 0) {
                                //alert('当前是第一页');
                                for (var i = 0; i < curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum--;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        })

                    }


                });
                break;
            case "gapMultiFill" :
                var _html = document.getElementById('gapFill').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","gapFill"+num);
                //obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(0)").find("span").html("Q"+num1+":"+arrType['title']+"(多项填空题)");
                //  分页处理
                obj.find("tbody").attr("id","pageMain"+num);
                obj.find(".show").find("div").attr("id","pageBox"+num);
                obj.find(".show").find("div").find("span:eq(0)").attr('id',"prev"+num);
                obj.find(".show").find("div").find("span:eq(1)").attr('id',"next"+num);
                obj.find(".show").find("div").find("ul").attr("id","pageNav"+num);
                var trSign = 0;
                for (var k in arrType) {
                    if (k.replace(/[^a-z]+/ig,"") === "title" ) {
                        obj.find("thead").find("tr").append("<th></th>");
                        obj.find("thead").find("th:last-child").html(arrType[k]);
                    }
                    if (k.replace(/[^a-z]+/ig,"") === "option") {

                        var optionArr = arrType[k].split(".");
                        optionArr.pop();
                        if(trSign === 0) {
                            var trLen = optionArr.length;
                            for (var k1=0; k1<trLen;k1++) {
                                obj.find("tbody").append("<tr></tr>");
                            }
                            trSign = 1;
                        }
                        for (var k2 in optionArr) {
                            obj.find("tbody").find("tr").eq(k2).append("<th>"+optionArr[k2]+"</th>");
                        }
                    }

                }
                obj.find("thead").find("th:first-child").remove();
                $(function () {
                    tabPage({
                        pageMain: '#pageMain'+num,
                        pageNav: '#pageNav'+num,
                        pagePrev: '#prev'+num,
                        pageNext: '#next'+num,
                        curNum: 1, /*每页显示的条数*/
                        activeClass: 'active', /*高亮显示的class*/
                        ini: 0/*初始化显示的页面*/
                    });
                    function tabPage(tabPage) {
                        var pageMain = $(tabPage.pageMain);
                        /*获取内容列表*/
                        var pageNav = $(tabPage.pageNav);
                        /*获取分页*/
                        var pagePrev = $(tabPage.pagePrev);
                        /*上一页*/
                        var pageNext = $(tabPage.pageNext);
                        /*下一页*/


                        var curNum = tabPage.curNum;
                        /*每页显示数*/
                        var len = Math.ceil(pageMain.find("tr").length / curNum);
                        /*计算总页数*/
                        console.log(len);
                        var pageList = '';
                        /*生成页码*/
                        var iNum = 0;
                        /*当前的索引值*/

                        for (var i = 0; i < len; i++) {
                            pageList += '<a href="javascript:;">' + (i + 1) + '</a>';
                        }
                        pageNav.html(pageList);
                        /*头一页加高亮显示*/
                        pageNav.find("a:first").addClass(tabPage.activeClass);

                        /*******标签页的点击事件*******/
                        pageNav.find("a").each(function(){
                            $(this).click(function () {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                $(this).addClass(tabPage.activeClass);
                                iNum = $(this).index();
                                $(pageMain).find("tr").hide();
                                for (var i = ($(this).html() - 1) * curNum; i < ($(this).html()) * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }

                            });
                        })


                        $(pageMain).find("tr").hide();
                        /************首页的显示*********/
                        for (var i = 0; i < curNum; i++) {
                            $(pageMain).find("tr").eq(i).show()
                        }


                        /*下一页*/
                        pageNext.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == len - 1) {
                                //alert('已经是最后一页');
                                for (var i = (len - 1) * curNum; i < len * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum++;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
//                    ini(iNum);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        });
                        /*上一页*/
                        pagePrev.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == 0) {
                                //alert('当前是第一页');
                                for (var i = 0; i < curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum--;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        })

                    }


                });
                break;
            case "name" :
                var _html = document.getElementById('gapFill').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","gapFill"+num);
                //obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(0)").find("span").html("Q"+num1+":"+arrType['title']+"(姓名)");
                obj.find("thead").find("th").html(arrType['title']);
                //  分页处理
                obj.find("tbody").attr("id","pageMain"+num);
                obj.find(".show").find("div:eq(0)").attr("id","pageBox"+num);
                obj.find(".show").find("div:eq(0)").find("span:eq(0)").attr('id',"prev"+num);
                obj.find(".show").find("div:eq(0)").find("span:eq(1)").attr('id',"next"+num);
                obj.find(".show").find("div:eq(0)").find("ul").attr("id","pageNav"+num);
                var sum = 0;
                for (var k in arrType) {
                    if (k.replace(/[^a-z]+/ig,"") === "option") {
                        //  表格数据修改
                        var trHtml = "<tr>\n" +
                            "                    <th >1</th>\n" +
                            "                </tr>";
                        obj.find("tbody").append(trHtml);
                        obj.find("tbody").find("tr:last-child").find("th").html(arrType[k]);
                    }
                }
                /*分页数据*/
                $(function () {
                    tabPage({
                        pageMain: '#pageMain'+num,
                        pageNav: '#pageNav'+num,
                        pagePrev: '#prev'+num,
                        pageNext: '#next'+num,
                        curNum: 1, /*每页显示的条数*/
                        activeClass: 'active', /*高亮显示的class*/
                        ini: 0/*初始化显示的页面*/
                    });
                    function tabPage(tabPage) {
                        var pageMain = $(tabPage.pageMain);
                        /*获取内容列表*/
                        var pageNav = $(tabPage.pageNav);
                        /*获取分页*/
                        var pagePrev = $(tabPage.pagePrev);
                        /*上一页*/
                        var pageNext = $(tabPage.pageNext);
                        /*下一页*/


                        var curNum = tabPage.curNum;
                        /*每页显示数*/
                        var len = Math.ceil(pageMain.find("tr").length / curNum);
                        /*计算总页数*/
                        console.log(len);
                        var pageList = '';
                        /*生成页码*/
                        var iNum = 0;
                        /*当前的索引值*/

                        for (var i = 0; i < len; i++) {
                            pageList += '<a href="javascript:;">' + (i + 1) + '</a>';
                        }
                        pageNav.html(pageList);
                        /*头一页加高亮显示*/
                        pageNav.find("a:first").addClass(tabPage.activeClass);

                        /*******标签页的点击事件*******/
                        pageNav.find("a").each(function(){
                            $(this).click(function () {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                $(this).addClass(tabPage.activeClass);
                                iNum = $(this).index();
                                $(pageMain).find("tr").hide();
                                for (var i = ($(this).html() - 1) * curNum; i < ($(this).html()) * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }

                            });
                        })


                        $(pageMain).find("tr").hide();
                        /************首页的显示*********/
                        for (var i = 0; i < curNum; i++) {
                            $(pageMain).find("tr").eq(i).show()
                        }


                        /*下一页*/
                        pageNext.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == len - 1) {
                                //alert('已经是最后一页');
                                for (var i = (len - 1) * curNum; i < len * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum++;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
//                    ini(iNum);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        });
                        /*上一页*/
                        pagePrev.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == 0) {
                                //alert('当前是第一页');
                                for (var i = 0; i < curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum--;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        })

                    }


                });
                break;
            case "date" :
            var _html = document.getElementById('gapFill').innerHTML;
            $(".question_content").append(_html);
            var obj =  $(".divStyle:last-child");
            var num = obj.index(".divStyle");
            obj.children("div:eq(0)").find("input").attr('value',num);
            obj.attr("id","gapFill"+num);
            //obj.find(".radio").attr("id","radioTable"+num);
            var spanTitle = arrType['title'];
            var num1 = num + 1;
            obj.children("div:eq(0)").find("span").html("Q"+num1+":"+arrType['title']+"(日期)");
            obj.find("thead").find("th").html(arrType['title']);
            //  分页处理
            obj.find("tbody").attr("id","pageMain"+num);
            obj.find(".show").find("div:eq(0)").attr("id","pageBox"+num);
            obj.find(".show").find("div:eq(0)").find("span:eq(0)").attr('id',"prev"+num);
            obj.find(".show").find("div:eq(0)").find("span:eq(1)").attr('id',"next"+num);
            obj.find(".show").find("div:eq(0)").find("ul").attr("id","pageNav"+num);
            var sum = 0;
            for (var k in arrType) {
                if (k.replace(/[^a-z]+/ig,"") === "option") {
                    //  表格数据修改
                    var trHtml = "<tr>\n" +
                        "                    <th >1</th>\n" +
                        "                </tr>";
                    obj.find("tbody").append(trHtml);
                    obj.find("tbody").find("tr:last-child").find("th").html(arrType[k]);
                }
            }
            /*分页数据*/
            $(function () {
                tabPage({
                    pageMain: '#pageMain'+num,
                    pageNav: '#pageNav'+num,
                    pagePrev: '#prev'+num,
                    pageNext: '#next'+num,
                    curNum: 1, /*每页显示的条数*/
                    activeClass: 'active', /*高亮显示的class*/
                    ini: 0/*初始化显示的页面*/
                });
                function tabPage(tabPage) {
                    var pageMain = $(tabPage.pageMain);
                    /*获取内容列表*/
                    var pageNav = $(tabPage.pageNav);
                    /*获取分页*/
                    var pagePrev = $(tabPage.pagePrev);
                    /*上一页*/
                    var pageNext = $(tabPage.pageNext);
                    /*下一页*/


                    var curNum = tabPage.curNum;
                    /*每页显示数*/
                    var len = Math.ceil(pageMain.find("tr").length / curNum);
                    /*计算总页数*/
                    console.log(len);
                    var pageList = '';
                    /*生成页码*/
                    var iNum = 0;
                    /*当前的索引值*/

                    for (var i = 0; i < len; i++) {
                        pageList += '<a href="javascript:;">' + (i + 1) + '</a>';
                    }
                    pageNav.html(pageList);
                    /*头一页加高亮显示*/
                    pageNav.find("a:first").addClass(tabPage.activeClass);

                    /*******标签页的点击事件*******/
                    pageNav.find("a").each(function(){
                        $(this).click(function () {
                            pageNav.find("a").removeClass(tabPage.activeClass);
                            $(this).addClass(tabPage.activeClass);
                            iNum = $(this).index();
                            $(pageMain).find("tr").hide();
                            for (var i = ($(this).html() - 1) * curNum; i < ($(this).html()) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }

                        });
                    })


                    $(pageMain).find("tr").hide();
                    /************首页的显示*********/
                    for (var i = 0; i < curNum; i++) {
                        $(pageMain).find("tr").eq(i).show()
                    }


                    /*下一页*/
                    pageNext.click(function () {
                        $(pageMain).find("tr").hide();
                        if (iNum == len - 1) {
                            //alert('已经是最后一页');
                            for (var i = (len - 1) * curNum; i < len * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                            return false;
                        } else {
                            pageNav.find("a").removeClass(tabPage.activeClass);
                            iNum++;
                            pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
//                    ini(iNum);
                        }
                        for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                            $(pageMain).find("tr").eq(i).show()
                        }
                    });
                    /*上一页*/
                    pagePrev.click(function () {
                        $(pageMain).find("tr").hide();
                        if (iNum == 0) {
                            //alert('当前是第一页');
                            for (var i = 0; i < curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                            return false;
                        } else {
                            pageNav.find("a").removeClass(tabPage.activeClass);
                            iNum--;
                            pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
                        }
                        for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                            $(pageMain).find("tr").eq(i).show()
                        }
                    })

                }


            });
            break;
            case "matrixRadio" :
                var _html = document.getElementById('matrixRadio').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","matrixRadio"+num);
                obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(1)").find("span").html("Q"+num1+":"+arrType['title']+"(矩阵单选题)");
                var rowNum = -1;
                var colData = [];
                var rowData = [];
                var dataArr = [];
                for (var k  in arrType) {
                    if ( k.replace(/[^a-z]+/ig,"") === "col" ) {
                        var serialCol = k.match(/[0-9]+/g);
                        var colHtml = "<tr><th scope='row'></th></tr>";
                        obj.find("tbody").append(colHtml);
                        obj.find("tbody").find("tr:last-child").find("th").html(arrType[k]);
                        colData.push(arrType[k]);

                    }
                    if ( k.replace(/[^a-z]+/ig,"") === "row" ) {
                        rowNum++;
                        obj.find("thead").find("tr").append("<th>"+arrType[k]+"</th>");


                    }
                }
                var rowSign = 0;
                for (k in arrType) {
                    if (rowSign === 0) {
                        obj.find("tbody").find("tr").each(function(trIndex,trItem){
                            for (k=0; k<=rowNum; k++){
                                $(trItem).append("<td>0</td>");
                            }
                            rowSign = 1;
                        });
                    } else {
                        var matrixData = k.match(/[0-9].[0-9]/);
                        if (matrixData) {
                            var matrixDataArr = matrixData[0].split(".");
                            obj.find("tbody").find("tr").eq(matrixDataArr[1]).find("td").eq(matrixDataArr[0]).html(arrType[matrixData]);
                        }

                    }

                }
                obj.find("thead").find("th:gt(0)").each(function(thIndex,thItem){
                    var arr = [];
                    obj.find("tbody").find("tr").each(function(trIndex,trItem){

                        var str = $(trItem).find("td").eq(thIndex).html();
                        str = Number(str[0]);
                        arr.push(str);
                    });
                    var rowName = $(thItem).html();
                    var JSON = {
                        name: rowName,
                        data : arr
                    };
                    dataArr.push(JSON);
                });
                var tableHtml = obj.find(".tableHtml").html();
                //  图数据
                var options = {
                    chart: {
                      type: 'bar'
                    },
                    title: {
                        text: arrType['title']
                    },
                    xAxis: {
                        categories: colData
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: '水果消费总量'
                        }
                    },
                    legend: {
                        /* 图例显示顺序反转
                         * 这是因为堆叠的顺序默认是反转的，可以设置
                         * yAxis.reversedStacks = false 来达到类似的效果
                         */
                        reversed: true
                    },
                    plotOptions: {
                        series: {
                            stacking: 'normal'
                        }
                    },
                    series: dataArr
                };
                obj.find(".show").attr("id","container"+num);
                var chart = Highcharts.chart("container"+num,options);
                obj.find(".show").append(tableHtml);
                break;
            case 'matrixSCore':
                var _html = document.getElementById('matrixScore').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","matrixScore"+num);
                obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(1)").find("span").html("Q"+num1+":"+arrType['title']+"(矩阵单选题)");
                var rowNum = -1;
                var colData = [];
                var rowData = [];
                var dataArr = [];
                for (var k  in arrType) {
                    if ( k.replace(/[^a-z]+/ig,"") === "col" ) {
                        var serialCol = k.match(/[0-9]+/g);
                        var colHtml = "<tr><th scope='row'></th></tr>";
                        obj.find("tbody").append(colHtml);
                        obj.find("tbody").find("tr:last-child").find("th").html(arrType[k]);
                        colData.push(arrType[k]);

                    }
                    if ( k.replace(/[^a-z]+/ig,"") === "row" ) {
                        rowNum++;
                        obj.find("thead").find("tr").append("<th>"+arrType[k]+"</th>");


                    }
                }
                var rowSign = 0;
                for (k in arrType) {
                    if (rowSign === 0) {
                        obj.find("tbody").find("tr").each(function(trIndex,trItem){
                            for (k=0; k<=rowNum; k++){
                                $(trItem).append("<td>0</td>");
                            }
                            rowSign = 1;
                        });
                    } else {
                        var matrixData = k.match(/[0-9].[0-9]/);
                        if (matrixData) {
                            var matrixDataArr = matrixData[0].split(".");
                            obj.find("tbody").find("tr").eq(matrixDataArr[1]).find("td").eq(matrixDataArr[0]).html(arrType[matrixData]);
                        }

                    }

                }
                break;
            case 'matrixGapFill':
                var _html = document.getElementById('matrixGapFill').innerHTML;
                $(".question_content").append(_html);
                var obj =  $(".divStyle:last-child");
                var num = obj.index(".divStyle");
                obj.children("div:eq(0)").find("input").attr('value',num);
                obj.attr("id","matrixGapFill"+num);
                obj.find(".radio").attr("id","radioTable"+num);
                var spanTitle = arrType['title'];
                var num1 = num + 1;
                obj.children("div:eq(1)").find("span").html("Q"+num1+":"+arrType['title']+"(矩阵单选题)");
                var rowNum = -1;
                var colData = [];
                var rowData = [];
                var dataArr = [];
                for (var k  in arrType) {
                    if ( k.replace(/[^a-z]+/ig,"") === "col" ) {
                        var serialCol = k.match(/[0-9]+/g);
                        var colHtml = "<tr><th scope='row'></th></tr>";
                        obj.find("tbody").append(colHtml);
                        obj.find("tbody").find("tr:last-child").find("th").html(arrType[k]);
                        colData.push(arrType[k]);

                    }
                    if ( k.replace(/[^a-z]+/ig,"") === "row" ) {
                        rowNum++;
                        obj.find("thead").find("tr").append("<th>"+arrType[k]+"</th>");


                    }
                }
                var rowSign = 0;
                for (k in arrType) {
                    if (rowSign === 0) {
                        obj.find("tbody").find("tr").each(function(trIndex,trItem){
                            for (k=0; k<=rowNum; k++){
                                $(trItem).append("<td>0</td>");
                            }
                            rowSign = 1;
                        });
                    } else {
                        var matrixData = k.match(/[0-9].[0-9]/);
                        if (matrixData) {
                            var matrixDataArr = matrixData[0].split(".");
                            obj.find("tbody").find("tr").eq(matrixDataArr[1]).find("td").eq(matrixDataArr[0]).html(arrType[matrixData]);
                        }

                    }

                }
                //  分页处理
                obj.find("tbody").attr("id","pageMain"+num);
                obj.find(".show").find("div").attr("id","pageBox"+num);
                obj.find(".show").find("div").find("span:eq(0)").attr('id',"prev"+num);
                obj.find(".show").find("div").find("span:eq(1)").attr('id',"next"+num);
                obj.find(".show").find("div").find("ul").attr("id","pageNav"+num);
                $(function () {
                    tabPage({
                        pageMain: '#pageMain'+num,
                        pageNav: '#pageNav'+num,
                        pagePrev: '#prev'+num,
                        pageNext: '#next'+num,
                        curNum: 1, /*每页显示的条数*/
                        activeClass: 'active', /*高亮显示的class*/
                        ini: 0/*初始化显示的页面*/
                    });
                    function tabPage(tabPage) {
                        var pageMain = $(tabPage.pageMain);
                        /*获取内容列表*/
                        var pageNav = $(tabPage.pageNav);
                        /*获取分页*/
                        var pagePrev = $(tabPage.pagePrev);
                        /*上一页*/
                        var pageNext = $(tabPage.pageNext);
                        /*下一页*/


                        var curNum = tabPage.curNum;
                        /*每页显示数*/
                        var len = Math.ceil(pageMain.find("tr").length / curNum);
                        /*计算总页数*/
                        console.log(len);
                        var pageList = '';
                        /*生成页码*/
                        var iNum = 0;
                        /*当前的索引值*/

                        for (var i = 0; i < len; i++) {
                            pageList += '<a href="javascript:;">' + (i + 1) + '</a>';
                        }
                        pageNav.html(pageList);
                        /*头一页加高亮显示*/
                        pageNav.find("a:first").addClass(tabPage.activeClass);

                        /*******标签页的点击事件*******/
                        pageNav.find("a").each(function(){
                            $(this).click(function () {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                $(this).addClass(tabPage.activeClass);
                                iNum = $(this).index();
                                $(pageMain).find("tr").hide();
                                for (var i = ($(this).html() - 1) * curNum; i < ($(this).html()) * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }

                            });
                        })


                        $(pageMain).find("tr").hide();
                        /************首页的显示*********/
                        for (var i = 0; i < curNum; i++) {
                            $(pageMain).find("tr").eq(i).show()
                        }


                        /*下一页*/
                        pageNext.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == len - 1) {
                                //alert('已经是最后一页');
                                for (var i = (len - 1) * curNum; i < len * curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum++;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
//                    ini(iNum);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        });
                        /*上一页*/
                        pagePrev.click(function () {
                            $(pageMain).find("tr").hide();
                            if (iNum == 0) {
                                //alert('当前是第一页');
                                for (var i = 0; i < curNum; i++) {
                                    $(pageMain).find("tr").eq(i).show()
                                }
                                return false;
                            } else {
                                pageNav.find("a").removeClass(tabPage.activeClass);
                                iNum--;
                                pageNav.find("a").eq(iNum).addClass(tabPage.activeClass);
                            }
                            for (var i = iNum * curNum; i < (iNum + 1) * curNum; i++) {
                                $(pageMain).find("tr").eq(i).show()
                            }
                        })

                    }


                });
                break;
        }
    });
</script>

</html>