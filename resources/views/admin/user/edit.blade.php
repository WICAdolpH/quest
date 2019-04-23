<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />

    <!-- 引入webuploader的需要css文件 -->
    <link rel="stylesheet" type="text/css" href="/statics/webuploader-0.1.5/webuploader.css">

    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>添加用户 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-edit">
        @foreach($userInfo as $val)
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ $val['name'] }}" placeholder="" id="name" name="name">
            </div>
        </div>
        <div class="row cl">
            <input type="hidden"   name="id" value="{{$val['id']}}">
            <input type="hidden"   name="oldusername" value="{{$val['username']}}">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户账号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ $val['username'] }}" placeholder="" id="username" name="username">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="gender" type="radio" id="gender-1" value="0" {{ $val['gender'] == 0 ? "checked" : "" }}>
                    <label for="gender-1">男</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-2" name="gender" value="1" {{ $val['gender'] == 1 ? "checked" : "" }}>
                    <label for="gender-2">女</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-3" name="gender" value="2" {{ $val['gender'] == 2 ? "checked" : "" }}>
                    <label for="gender-3">保密</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ $val['mobile'] }}" placeholder="" id="mobile" name="mobile">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="@" name="email" id="email" value="{{ $val['email'] }}">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">头像：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <!-- 给webuploader使用的div -->
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list">
                        <!-- 添加隐藏域 -->
                        <input type="hidden" name="avatar" value="{{ $val['avatar'] }}"/>
                        <div  class="file-item thumbnail">
                            <img src="{{ $val['avatar'] }}" width="200px">

                            </div>
                    </div>
                    <div id="filePicker">选择图片</div>
                </div>
            </div>
        </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>国家：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" placeholder="@" name="address" id="address" value="{{ $val['address'] }}">
                </div>
            </div>

        {{ csrf_field() }}
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
        @endforeach
    </form>

</article>

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
<script type="text/javascript">
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


        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-edit").validate({
            rules:{
                username:{
                    required:true,
                    minlength:6,
                    maxlength:25
                },
                password:{
                    required:true,
                    minlength:6,
                    maxlength:18
                },
                sex:{
                    required:true,
                },
                mobile:{
                    required:true,
                    isMobile:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                uploadfile:{
                    required:true,
                },

            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "",//自己提交给自己可以不写url
                    success: function(data) {
                        //判断添加结果
                        if(data == '1'){
                            layer.msg('修改成功!', { icon: 1, time: 2000 },function(){
                                var index = parent.layer.getFrameIndex(window.name);
                                // parent.$('.btn-refresh').click();
                                // 刷新
                                parent.window.location = parent.window.location;
                                parent.layer.close(index);
                            });
                        }else{
                            layer.msg('修改失败!'+data, { icon: 2, time: 2000 });
                        }
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown) {
                        layer.msg('error!', { icon: 2, time: 1000 });
                    }
                });
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>