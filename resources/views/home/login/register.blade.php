<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="/home/style/register_style.css" type="text/css"/>

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
            <input id="username" class="input" type="text" name="username" placeholder="请输入用户账号"/>
            <input id="name" class="input" type="text" name="name" placeholder="请输入用户名"/>
            <input id="password" class="input" type="password" name="password"  placeholder="请设置登录密码"/>
            <input id="password2" class="input" type="password" name="password2"  placeholder="请再次输入登录密码"/>
            <div class="check">
                <input id="del" class="check" type="checkbox" name="del" value="1"/>您已阅读并遵守 <a href="#">《用户协议》</a>
            </div>
            <button type="submit" id="btn" class="btn">注册</button>
        </form>
        <!--<div class="alert alert-danger" id="span" role="alert"></div>-->
    </div>
</div>
<script type="text/javascript" src="/common/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
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
                    maxlength:18
                },


            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "/home/register",//自己提交给自己可以不写url
                    success: function(data) {
                        //判断添加结果
                        if(data == '1'){
                            layer.msg(data, { icon: 1, time: 2000 },function(){
                                var index = parent.layer.getFrameIndex(window.name);
                                // parent.$('.btn-refresh').click();
                                // 刷新
                                parent.window.location = parent.window.location;
                                parent.layer.close(index);
                            });
                        }else{
                            layer.msg('添加失败!', { icon: 2, time: 2000 });
                        }
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown) {
                        layer.msg('error!', { icon: 2, time: 1000 });
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