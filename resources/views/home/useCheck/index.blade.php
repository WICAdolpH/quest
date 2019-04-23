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
    <!-- JQuery插件JS引入 -->
    <script src="/home/js/jquery-1.11.0.min.js"></script>
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
                <li class="active"><a href="/home/usecheck">我的项目 <span class="sr-only">(current)</span></a></li>
                {{--<li ><a >创建模板</a></li>--}}
                <li><a href="/home/participate">参与投票</a></li>
                <li class="dropdown">
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
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
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

    <li class="list">
        <span class="list-create"  ><a href="/home/create" style="text-decoration: none"><p >+</p>&nbsp;创建</a></span>&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><br/>

    </li>
    @foreach($checkInfo as $value)
        <li class="list"><input type="hidden" name="id" value="{{ $value->id }}">{{ csrf_field() }}
        <a href="/home/editcheck?id={{ $value -> id }}" class="survey-name" style="text-decoration: none" target="_blank" onclick="editCheck(this)"></span>{{ $value -> title }}</a><br/>
        <span><span color='3B7CB9'>已审核</span>&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><br/>
        <span><button type='button' class='btn btn-primary glyphicon glyphicon-trash' onclick="dellAll(this)"></button></span>
        <span><button type='button' class='btn btn-primary' >导出</button></span>
        <span><button type='button' class='btn btn-primary' onclick="analysis(this)">analysis</button></span>
        <div class="time">日期</div>
        </li>
    @endforeach
    <div style="clear: both; margin-left: 30px;">
        {{ $checkInfo->links() }}
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
        //  删除某一个调查问卷
        function dellAll(obj) {
            //  获取ID
            var id = $(obj).parents("li").find('input').attr('value');
            $.ajax({
                type: 'POST',
                url: '/home/delall',
                dataType: "json",
                data:{
                    'id' : id,
                    '_token':$('input[name=_token]').val(),
                },
                complete : function(msg) {

                },
                success : function(data) {
                    $(obj).parents('li').remove();
                }
            });
        }
        //  试卷分析
        function analysis(obj) {

        }

    </script>
</div>
</body>
</html>