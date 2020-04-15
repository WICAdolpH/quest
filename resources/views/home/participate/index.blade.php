<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>使用</title>
    <!-- css引入 -->
    <link rel="stylesheet" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/home/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/home/css/index.css">
    <link rel="stylesheet" href="/home/css/use-check.css">
    <!-- JQuery插件css引入 -->
    <link rel="stylesheet" href="/home/css/jquery.easy_slides.css">

    <!-- js引入 -->
    <script type="text/javascript" src="/home/js/jquery.min.js"></script>
    <script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
    <script src="/script/layer/layer.js"></script>
    <!-- JQuery插件JS引入 -->
    {{--<script src="/home/js/jquery-1.11.0.min.js"></script>--}}
    <script src="/home/js/jquery.easy_slides.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse "  >
    <div class="container-fluid "  >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="/home/login">小猪问卷网</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ><a href="/home/usecheck">我的项目 <span class="sr-only">(current)</span></a></li>
                {{--<li><a >我发起的投票</a></li>--}}
                <li class="active"><a href="/home/participate">参与调查</a></li>
                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">企业帮助 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>--}}
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if( !\Session::get('userInfo') )
                    <li><a href="/home/login">登陆</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!--头像   -->{{\Session::get('userInfo')}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">个人信息</a></li>
                            <li><a href="#">我发起的投票</a></li>
                            <li><a href="#">参与投票</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/home/logout">退出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="list-box" style="width: 1020px;height: 312px; margin: 0 auto;">
    {{ csrf_field() }}
    @foreach($quest as $value)
        <div class=" col-md-4 col-sm-6 col-xs-12">
            <li class="list">
                <input type="hidden" name="id" value="{{ $value->id }}" >
                <a href="#" data-toggle="modal" data-target="#myModal{{$value->id}}" onclick="test(this)" class="survey-name" style="text-decoration: none" target="_blank" ></span>{{ $value -> title }}</a><br/>
                <span ><span color='3B7CB9'>{{ $value -> name }}</span>&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><br/>
                <div class="time" style="margin-top: 30px;">日期</div>
            </li>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center">密码(如果密码为空直接确定)</h4>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <input type="hidden" class="quest_id" name="id"  value="{{ $value->id }}">
                        <input type="password" class="pass">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary" onclick="toPart(this)">确定</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

        <div style="clear: both; margin-left: 30px;">
            {{ $quest->links() }}
        </div>
    {{--<li class="list">--}}
    {{--<a href="#" class="survey-name" style="text-decoration: none" target="_blank"></span>2</a><br/>--}}
    {{--<span><span color='3B7CB9'>已审核</span>&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><br/>--}}
    {{--<span><button type='button' class='btn btn-primary glyphicon glyphicon-trash' ></button></span>--}}
    {{--<span><button type='button' class='btn btn-primary' >导出</button></span>--}}
    {{--<span><button type='button' class='btn btn-primary' >analysis</button></span>--}}
    {{--<div class="time">日期</div>--}}
    {{--</li>--}}
    {{--<li class="list">--}}
    {{--<a href="#" class="survey-name" style="text-decoration: none" target="_blank"></span>2</a><br/>--}}
    {{--<span><span color='3B7CB9'>已审核</span>&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><br/>--}}
    {{--<span><button type='button' class='btn btn-primary glyphicon glyphicon-trash' ></button></span>--}}
    {{--<span><button type='button' class='btn btn-primary' >导出</button></span>--}}
    {{--<span><button type='button' class='btn btn-primary' >analysis</button></span>--}}
    {{--<div class="time">日期</div>--}}
    {{--</li>--}}
    <script>
        function test(obj) {
            //console.log($(obj).parent().find('input').attr("value"));
        }
        function toPart(obj) {
            var pass = $(obj).parents(".modal").find('.pass').val();
            console.log(pass);
            var quest_id = $(obj).parents(".modal").find('.quest_id').attr('value');
            console.log(quest_id)
            //  AJax请求 想后台传送数据
            $.ajax({
                type: 'POST',
                url: '/home/passcheck',
                dataType: "json",
                data:{
                    'quest_id' : quest_id,
                    'pass' : pass,
                    '_token':$('input[name=_token]').val(),
                },
                complete : function(data) {


                },
                success : function(data) {
                    if (data.status == 422) {
                        layer.alert(data.msg,{title:'错误提示',icon: 5});
                    } else {
                        $.each(data,function(idx,obj){

                            obj.forEach(function(item,index){
                                if(item['questId'] == questId) {
                                    oldArr.push(item);
                                }
                            });


                        });
                        if(data === 1 ){
                            window.location.href="/home/toparticiate?id="+quest_id;
                        }
                    }

                    /*oldArr = $.parseJSON(data);
                    oldArr.forEach(function(index,item){
                        console.log(index);
                    });*/
                }
            });
        }
    </script>
</div>
</body>
</html>