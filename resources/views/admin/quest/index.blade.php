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
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 问卷中心 <span class="c-gray en">&gt;</span> 问卷管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">


{{--    <div class="mt-20">--}}
    <form action="" class="formData layui-form">
        <div class="layui-form-item" style="float: left;">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="name" required   placeholder="请输入问卷名字" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item" style="clear: none;">
            <div class="layui-input-inline">
                <button class="layui-btn" lay-submit lay-filter="formSubmit">立即提交</button>
            </div>
        </div>
        <table id="quest" lay-filter="test"></table>
    </form>

{{--    </div>--}}
</div>
{{-- 弹框编辑内容 --}}
<div id="edit" style="display:none">
    <div class="layer-edit">
        <form class="layui-form le_edit" lay-filter="edit" autocomplete="off">
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-inline">
                    <select name="statue" lay-verify="required">
                        <option value="0">未发布</option>
                        <option value="1">已发布</option>
                        <option value="2">禁用</option>
                    </select>
                </div>
                <input type="hidden" name="id">
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                    <input name="password"  class="layui-input" type="text">
                </div>
            </div>



            <div class="layui-form-item" id="test1">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="submit">确认</button>
                    <button type="button" class="layui-btn layui-btn-primary cancel_edit">取消</button>
                </div>
            </div>
        </form>
    </div>
</div>
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

    table();
    function table(where=[])
    {
        layui.use('table', function(){
            var table = layui.table;
            var where = $(".formData").serializeObj()
            console.log(where)
            //第一个实例
            table.render({
                elem: '#quest'
                // ,height: 500
                ,url: '/admin/quest/list' //数据接口
                ,where:where
                ,page: true //开启分页
                ,method:'post'
                ,cols: [[ //表头
                    {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                    ,{field: 'quest', title: '题目列表', width:80}
                    ,{field: 'statue', title: '状态', width:80, sort: true,templet:function(d){
                            var statue_zh = [];
                            statue_zh[0] = "未发布"
                            statue_zh[1] = "已发布"
                            statue_zh[2] = "禁止发布"
                            return statue_zh[d.statue]
                        }}
                    ,{field: 'title', title: '大标题', width: 177}
                    ,{field: 'title1', title: '小标题', width: 160, sort: true}
                    ,{field: 'password', title: '问卷密码', width: 160, sort: true}
                    ,{field: 'voter_name', title: '投票人名字'}
                    ,{field: 'user_name', title: '用户姓名', width:160}
                    ,{fixed: 'right', title:'操作', toolbar: '#rightTool', width:150}
                ]]
            });

            //头工具栏事件
            table.on('toolbar(test)', function(obj){
                var checkStatus = table.checkStatus(obj.config.id);
                switch(obj.event){
                    case 'getCheckData':
                        var data = checkStatus.data;
                        layer.alert(JSON.stringify(data));
                        break;
                    case 'getCheckLength':
                        var data = checkStatus.data;
                        layer.msg('选中了：'+ data.length + ' 个');
                        break;
                    case 'isAll':
                        layer.msg(checkStatus.isAll ? '全选': '未全选');
                        break;

                    //自定义头工具栏右侧图标 - 提示
                    case 'LAYTABLE_TIPS':
                        layer.alert('这是工具栏右侧自定义的一个图标按钮');
                        break;
                };
            });

            //监听行工具事件
            table.on('tool(test)', function(obj){
                var data = obj.data;
                console.log(obj,105)
                switch (obj.event) {
                    case 'edit':
                        edit(obj);
                        break;
                    case 'del':
                        layer.confirm('真的删除行么', function(index){
                            obj.del();
                            $.post('/admin/quest/del',{'id':obj.data.id},function(data){
                                if (data.code == 0) layer.close(index);
                                else layer.close("删除失败");
                            });

                        });
                        break;
                }
            });
        });
    }

    layui.use('form', function(){
        var form = layui.form
        form.on('submit(formSubmit)', function(d){
            var data = d.field
            table(d.field)
        })
    })

    function edit(obj)
    {
        var d = obj==undefined ? {} : obj.data;
        console.log(d)
        layer_edit = layer.open({
            type: 1,
            title: '编辑',
            closeBtn: 0,
            area: '516px',
            //skin: 'layui-layer-nobg', //背景透明
            shadeClose: true,
            content: $("#edit")
        });


        layui.use('form', function(){
            var form = layui.form;
            form.val("edit", {
                id   : d.id,
                statue : d.statue,
                password : d.password,
            })

            form.on('submit(submit)', function(data){
                $.post("/admin/quest/edit", data.field, function() {
                    layer.close(layer_edit);
                    obj.update(
                        data.field
                    );
                    //location.reload();
                });
                return false;
            });

            $('.cancel_edit').click(function(){
                layer.close(layer_edit);
            });
        });
    }
</script>
</body>
</html>