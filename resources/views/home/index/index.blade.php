<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>小猪首页</title>
    <!-- css引入 -->
    <link rel="stylesheet" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/home/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/home/css/index.css">
    <!-- JQuery插件css引入 -->
    <link rel="stylesheet" href="/home/css/jquery.easy_slides.css">

    <!-- js引入 -->
    <script type="text/javascript" src="/home/js/jquery.min.js"></script>
    <script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
    <!-- JQuery插件JS引入 -->
    <script src="/home/js/jquery-1.11.0.min.js"></script>
    <script src="/home/js/jquery.easy_slides.js"></script>
</head>
<body style="overflow:-Scroll;overflow-x:hidden" >
<!-- 导航部分 -->
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
            <a class="navbar-brand " href="javascript:;">小猪问卷网</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
                <li><a href="/home/usecheck">创建模板</a></li>
                <li><a href="/home/participate">参与调查</a></li>
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

<!-- 首页第一幕显示部分部分 -->
<div class="home-page ">
    <h1 >小猪问卷网</h1>
    <p class="summarize">佩奇问卷是一款在线表单制作工具，同时也是强大的客户信息处理和关系管理系统。
        <br/>她可以帮助你轻松完成信息收集与整理，实现客户挖掘与消息推送，并开展持续营销。</p>
    <button type="button" class="btn btn-primary btn-lgg " onclick="window.location.href='/home/usecheck'">开始使用</button>
    <p class="glyphicon glyphicon-chevron-down arrow-sign" ></p>
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
</div>
<!-- 首页下拉以后第二幕 -->
<div class="container-fluid section-1">
    <!-- 首页第二幕标题 -->
    <h2>丰富实用的应用场景</h2>
    <div class="row">
        <!-- 问卷调查 -->
        <div class="col-md-4 col-xs-12 col-sm-6">
            <ul>
                <li >
                    <div >
                        <span class="classify-1 classify-box"></span>
                        <h6 class="classify-title">问卷调查</h6>
                        <div class="summary">
                            <span>消费者调研</span>
                            <span>市场调研</span>
                            <span>产品调查</span>
                        </div>
                    </div>
                </li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!-- 满意度调查 -->
        <div class="col-md-4 col-xs-12 col-sm-6">
            <ul>
                <li >
                    <div >
                        <span class="classify-2 classify-box"></span>
                        <h6 class="classify-title">问卷调查</h6>
                        <div class="summary">
                            <span>消费者调研</span>
                            <span>市场调研</span>
                            <span>产品调查</span>
                        </div>
                    </div>
                </li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!-- 报名登记表 -->
        <div class="col-md-4 col-xs-12 col-sm-6">
            <ul>
                <li >
                    <div >
                        <span class="classify-3 classify-box"></span>
                        <h6 class="classify-title">问卷调查</h6>
                        <div class="summary">
                            <span>消费者调研</span>
                            <span>市场调研</span>
                            <span>产品调查</span>
                        </div>
                    </div>
                </li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!-- 报名登记表 -->
        <div class="col-md-4 col-xs-12 col-sm-6">
            <ul>
                <li >
                    <div >
                        <span class="classify-4 classify-box"></span>
                        <h6 class="classify-title">问卷调查</h6>
                        <div class="summary">
                            <span>消费者调研</span>
                            <span>市场调研</span>
                            <span>产品调查</span>
                        </div>
                    </div>
                </li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!-- 报名登记表 -->
        <div class="col-md-4 col-xs-12 col-sm-6">
            <ul>
                <li >
                    <div >
                        <span class="classify-5 classify-box"></span>
                        <h6 class="classify-title">问卷调查</h6>
                        <div class="summary">
                            <span>消费者调研</span>
                            <span>市场调研</span>
                            <span>产品调查</span>
                        </div>
                    </div>
                </li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!-- 报名登记表 -->
        <div class="col-md-4 col-xs-12 col-sm-6">
            <ul>
                <li >
                    <div >
                        <span class="classify-6 classify-box"></span>
                        <h6 class="classify-title">问卷调查</h6>
                        <div class="summary">
                            <span>消费者调研</span>
                            <span>市场调研</span>
                            <span>产品调查</span>
                        </div>
                    </div>
                </li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
</div>
<!-- 第三幕 -->
<div class="container-fluid section-2">
    <div class="text">编辑、收集、报表，一切都轻而易举</div>
    <div class="row">

        <!-- <div class="section-2 ">
           <div class=" text-right col-md-6 col-xs-12 section2-img" ><div ><img src="image/section1.png" alt=""/></div></div>
            <div class="text-left section-text  col-md-6 col-xs-12 " >
                <h3 class="section-title">快速轻松创建问卷</h3>
                <ul>
                    <li><span class="section-content" style="color:#484848">• 27种题型涵盖各种问卷设计需求</span></li>
                    <li><span class="section-content">• 200000+精品模板供引用</span></li>
                    <li><span class="section-content">• 逻辑设置可以设置题目间的逻辑关系</span></li>
                    <li><span class="section-content">• 快速导入已有问卷</span></li>
                </ul>
                <a class="use-now" onclick="checkLogin()">立即使用</a>
            </div>
        </div> -->
        <div class="section-2">
            <div class="right col-lg-6 col-md-4 col-xs-12"  ><img src="/home/image/section1.png"  alt=""/></div>
            <div class="left section-text col-lg-3  col-md-2 col-xs-12" style="margin-left: 20em;">
                <h3>快速轻松创建问卷</h3>
                <ul>
                    <li>27种题型涵盖各种问卷设计需求</li>
                    <li>200000+精品模板供引用</li>
                    <li>逻辑设置可以设置题目间的逻辑关系</li>
                    <li>快速导入已有问卷</li>
                </ul>
                <a class="use-now" onclick="checkLogin()">立即使用</a>
            </div>
        </div>

        <div class="clear"></div>
        <div class="section-3">
            <div class="left col-lg-6 col-md-4 col-xs-12">
                <img src="/home/image/section2.png "  alt=""/>
            </div>
            <div class="right section-text col-lg-3  col-md-2 col-xs-12 " style="margin-right: 20em">
                <h3>多种渠道分享</h3>
                <ul>
                    <li>不限答卷收集数量</li>
                    <li>发红包、引导关注等强大的微信匹配功能</li>
                    <li>28种免费的精美主题供选用</li>
                    <li>支持百万级用户同时在线答题</li>
                </ul>
                <a class="use-now" onclick="checkLogin()">立即使用</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section-4">
            <div class="right col-lg-6 col-md-4 col-xs-12"><img src="/home/image/section3.png"  alt=""/></div>
            <div class="left section-text col-lg-3  col-md-2 col-xs-12" style="margin-left: 300px">
                <h3>实时的分析图表</h3>
                <ul>
                    <li>直接生成各种精美报表</li>
                    <li>问卷数据永久保存和免费下载</li>
                    <li> 数据可直接导入SPSS进行分析</li>
                    <li>交叉分析和数据筛选</li>
                </ul>
                <a class="use-now" onclick="checkLogin()">立即使用</a>
            </div>
        </div>
        <div class="clear"></div>

    </div>
</div>
<div class="clear"></div>
<!-- 第四幕 -->
<div class="section-5 col-md-6 visible-lg-inline" >
    <div class="slider slider_four_in_line" >
        <div class="section5-title">
            <span >新测卷</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >历史问卷</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >历史表单</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >学术调研</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >满意度调查</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >考试测评</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >投票评选</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >其他测评模板</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="section5-title">
            <span >其他表单模板</span>
            <p class="glyphicon glyphicon-minus text-left" ></p>
            <ul>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
                <li><span><a href="#">这是测试1</a></span></li>
            </ul>
        </div>
        <div class="next_button"></div>
        <div class="prev_button"></div>
    </div>
</div>
<script>
    $('.slider_four_in_line').EasySlides({
        'autoplay': true,
        'show': 9,

    })
</script>
<div class="section-6">
    <h2>赶快创建你的第一个模板</h2>
    <button class="btn btn-primary">免费试用</button>
</div>
</body>
</html>