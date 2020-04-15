<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="/home/style/register_style.css" type="text/css"/>
    <script type="text/javascript" src="/common/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <!-- 引入webuploader的JavaScript文件 -->
    <script type="text/javascript" src="/statics/webuploader-0.1.5/webuploader.js"></script>
    <script type="text/javascript" src="/statics/avatar.js"></script>
    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
</head>
<body>
<div class="container">
    <nav>
        <div class="logo" style="float: left"><a href="../index.php">佩奇问卷网</a></div>
        <ul style="float: right;margin:20px 30px 0 0">
            <li><a href="">首页</a></li>
            <li><a href="">帮助中心</a></li>
            <li><a href="">关于我们</a></li>
            <li><a href="">联系我们</a></li>
        </ul>
    </nav>
    <div class="clear" style="clear: both"></div>
    <div class="login-box">
        <form action="" method="post" name="registerForm"  class="registerFrom" id="registerFrom">
            {{ csrf_field() }}
            <input id="username" class="input" type="text" name="username" placeholder="请输入用户账号"/>
            <input id="name" class="input" type="text" name="name" placeholder="请输入用户名"/>
            <input id="password" class="input" type="password" name="password"  placeholder="请设置登录密码"/>
            <input id="password2" class="input" type="password" name="password2"  placeholder="请再次输入登录密码"/>
            <div class="check">
                <input id="del" class="check" type="checkbox" name="del" value="1"/>您已阅读并遵守 <a href="#">《用户协议》</a>
            </div>
            <button type="submit" id="btn" class="btn">注册</button>
            <p>已有帐号<a href="/home/login" style="color: #f1f1f1">立即登陆</a></p>
        </form>
        <!--<div class="alert alert-danger" id="span" role="alert"></div>-->
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!-- 引入webuploader的JavaScript文件 -->
<script type="text/javascript" src="/statics/webuploader-0.1.5/webuploader.js"></script>
<script type="text/javascript" src="/statics/avatar.js"></script>
<script>
    //jQuery的载入事件
    $(function(){

        $("#registerFrom").validate({
            rules:{
                username:{
                    required:true,
                    minlength:6,
                    maxlength:16
                },
                password:{
                    required:true,
                    minlength:6,
                    maxlength:18,

                },
                name:{
                    required:true,
                    minlength:2,
                    maxlength:18,
                },
                password2 : {
                    equalTo:"#password",
                }

            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "/home/register",//自己提交给自己可以不写url
                    success: function(data) {
                        console.log(data);
                        //判断添加结果
                        if(data.status != 422){
                            layer.msg("注册成功", { icon: 1, time: 2000 },function(){
                                var index = parent.layer.getFrameIndex(window.name);
                                // parent.$('.btn-refresh').click();
                                // 刷新
                                parent.window.location = "/home/login";
                                parent.layer.close(index);
                            });
                        }else{
                            layer.msg(data.msg, { icon: 2, time: 2000 });
                        }
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown) {
                        layer.msg(errors.name, { icon: 2, time: 1000 });
                    }
                });
            }
        });



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