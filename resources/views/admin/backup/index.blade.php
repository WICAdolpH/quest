<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/script/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>问卷管理</title>
</head>
<body style="background-color: rgba(16,172,237,0.88)">
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 数据库管理 <span class="c-gray en">&gt;</span> 数据库备份和清理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">


{{--    <div class="mt-20">--}}
    <div class="layui-container">
        <div class="layui-row layui-col-space30">
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">数据库备份</div>
                    <div class="layui-card-body">

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn layui-btn-warm" lay-submit lay-filter="backup">备份</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">数据库备份清理</div>
                    <div class="layui-card-body">

                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn layui-btn-danger" lay-submit lay-filter="backupClean">清理</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    </div>--}}
</div>
{{-- 弹框编辑内容 --}}

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/script/layui/layui.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/common/js/base.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/html" id="rightTool">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/javascript">



    layui.use('form', function(){
        var form = layui.form
        form.on('submit(backup)', function(d){
            layer.confirm('确定数据库备份吗', {icon: 3, title:'提示'}, function(index){
                //do something
                $.get("/admin/backup/operate", function(){

                })
                 layer.close(index);
            });
        })
        form.on('submit(backupClean)', function(d){
            layer.confirm('确定清理备份吗', {icon: 3, title:'提示'}, function(index){
                //do something
                $.get("/admin/backup/clean", function(){

                })
                layer.close(index);
            });
        })
    })


</script>
</body>
</html>