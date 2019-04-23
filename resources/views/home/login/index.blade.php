<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="/home/style/login_style.css"/>
    <script type="text/javascript">

    </script>
</head>
<body>
<div class="container">
    <nav>
        <div class="logo" style="float: left"><a href="../index.php">小猪问卷网</a></div>
        <ul style="float: right;margin:20px 30px 0 0">
            <li><a href="../index.php">首页</a></li>
            <li><a href="">帮助中心</a></li>
            <li><a href="">关于我们</a></li>
            <li><a href="">联系我们</a></li>
        </ul>
    </nav>
    <div class="clear" style="clear: both"></div>
    <div class="login-box">
        <form action="/home/check" method="post" class="login login-by-user">
            {{ csrf_field() }}
            <input class="input" id="username" onblur="" name="username" type="text" placeholder="用户名"/>
            <input class="input" name="password" type="password" placeholder="密码"/>
            <input class="dock input" id="code" name="captcha" onblur="" type="text" placeholder="验证码"/>
            <span><img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}?aa='+Math.random()" style="height: 40px;width: 100px"/></span>
            <br/>
            <div class="check">
                <input type="checkbox" name="online" id="online" value="1" />下次自动登录
            </div>
            <a href="#" class="forget">忘记密码</a>
            <button type="submit">登录</button>
        </form>
        <p>还没账号？<a href="/home/register" style="color: #f1f1f1">立即注册</a></p>
    </div>
</div>
{{--引入JQuery--}}
<script type="text/javascript" src="/common/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
    //jQuery的载入事件
    $(function(){
        @if (count($errors) > 0)
        //以JavaScript弹窗形式输出错误的内容
        var allError = '';
        @foreach ($errors -> all() as $error)
            allError += "{{$error}}<br/>";
        @endforeach
        //输出错误信息
        layer.alert(allError,{title:'错误提示',icon: 5});
        @endif
    });
</script>
</body>
</html>