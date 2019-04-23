// //禁用F5刷新
// document.onkeydown = function ()
// {
//     if (event.keyCode == 116) {
//         event.keyCode = 0;
//         event.cancelBubble = true;
//         return false;
//     }
// }
//window.onbeforeunload=function(){   window.event.returnValue='确认真的要刷新？'   };

//静态总数数据 这个数据等做到后边要从后台获取值 如果没有就是0
var count = 0;
var list = [];
var arr = new Array();
//点击矩阵填空题
$('#matrixGapFillQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('matrixGapFill').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','matrixGapFill'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','matrixGapFill'+count);
    $('.create-option:last').attr('id','matrixGapFill'+count);
    $('.create-option:last').attr('value','matrixGapFill'+count);
    //给行和列增加name值
    $('.create-option:last').find('thead').find('th:eq(1)').find('input').attr('name','row1');
    $('.create-option:last').find('thead').find('th:eq(2)').find('input').attr('name','row2');
    $('.create-option:last').find('tbody').find('tr:eq(0)').find('input:eq(0)').attr('name','col1');
    $('.create-option:last').find('tbody').find('tr:eq(1)').find('input:eq(0)').attr('name','col2');
});
// 点击矩阵分数题;
$('#matrixScoreQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('matrixScore').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','matrixScore'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','matrixScore'+count);
    $('.create-option:last').attr('id','matrixScore'+count);
    $('.create-option:last').attr('value','matrixScore'+count);
    //给行和列增加name值
    $('.create-option:last').find('thead').find('th:eq(1)').find('input').attr('name','row1');
    $('.create-option:last').find('thead').find('th:eq(2)').find('input').attr('name','row2');
    $('.create-option:last').find('tbody').find('tr:eq(0)').find('input:eq(0)').attr('name','col1');
    $('.create-option:last').find('tbody').find('tr:eq(1)').find('input:eq(0)').attr('name','col2');



});

//点击矩阵单选题
$('#matrixRadioQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('matrixRadio').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','matrixRadio'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','matrixRadio'+count);
    $('.create-option:last').attr('id','matrixRadio'+count);
    $('.create-option:last').attr('value','matrixRadio'+count);
    //给行和列增加name值
    $('.create-option:last').find('thead').find('th:eq(1)').find('input').attr('name','row1');
    $('.create-option:last').find('thead').find('th:eq(2)').find('input').attr('name','row2');
    $('.create-option:last').find('tbody').find('tr:eq(0)').find('input:eq(0)').attr('name','col1');
    $('.create-option:last').find('tbody').find('tr:eq(1)').find('input:eq(0)').attr('name','col2');
});
//点击个人信息名字
$('#nameQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('name').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','name'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','name'+count);
    $('.create-option:last').attr('id','name'+count);
    $('.create-option:last').attr('value','name'+count);

});
// 点击手机
$('#phoneQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('phone').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','phone'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','phone'+count);
    $('.create-option:last').attr('id','phone'+count);
    $('.create-option:last').attr('value','phone'+count);
});
// 点击邮箱
$('#emailQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('email').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','email'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','email'+count);
    $('.create-option:last').attr('id','email'+count);
    $('.create-option:last').attr('value','email'+count);
});
// 点击性别
$('#sexQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('sex').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','sex'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','sex'+count);
    $('.create-option:last').attr('id','sex'+count);
    $('.create-option:last').attr('value','sex'+count);
});
// 点击日期
$('#dateQuest').click(function(){
    count = count+1;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('date').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','date'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','date'+count);
    $('.create-option:last').attr('id','date'+count);
    $('.create-option:last').attr('value','date'+count);
});
// 点击时间
$('#timeQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('time').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','time'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','time'+count);
    $('.create-option:last').attr('id','time'+count);
    $('.create-option:last').attr('value','time'+count);
});
// 点击城市 地址
$('#cityQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('city').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','city'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','city'+count);
    $('.create-option:last').attr('id','city'+count);
    $('.create-option:last').attr('value','city'+divSum);
});
// 点击位置
$('#addressQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('address').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','address'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').attr('name','address'+count);
    $('.create-option:last').attr('id','address'+count);
    $('.create-option:last').attr('value','address'+count);
});
// 点击分割线
$('#hrQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('hr').innerHTML;
    var divSum = div + 1;
    $('.create-form').append(_html);

    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(0)').children('input').attr('name','hr'+count);
    $('.create-option:last').children('div:eq(0)').children('input').attr('id','title');
    $('.create-option:last').children('div:eq(0)').children('input').attr('value','hr'+count);
    $('.create-option:last').attr('name','hr'+count);
    $('.create-option:last').attr('id','hr'+count);
    $('.create-option:last').attr('value','hr'+count);
});
// 点击分页
$('#pageQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('page').innerHTML;
    var divSum = div + 1;
    
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(0)').children('input').attr('name','page'+count);
    $('.create-option:last').children('div:eq(0)').children('input').attr('value','page'+count);
    $('.create-option:last').attr('name','page'+count);
    $('.create-option:last').attr('id','page'+count);
    $('.create-option:last').attr('value','page'+count);
    //统计分页个数
    var pageSum = $('.page').length;
    var page = 0;
    for(var i=0; i<pageSum; i++) {
        page = i+1;
        $(".page").eq(i).children("div:eq(1)").children('input:eq(0)').attr('value',page+"/"+pageSum);
    }
});
//点击备注说明
$('#descrQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('descr').innerHTML;
    var divSum = div + 1;
    
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','descr'+count);
    $('.create-option:last').attr('name','descr'+count);
    $('.create-option:last').attr('id','descr'+count);
    $('.create-option:last').attr('value','descr'+count);
});
// 打分题
$('#scoreQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('score').innerHTML;
    var divSum = div + 1;
    
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','score'+count);
    $('.create-option:last').attr('name','score'+count);
    $('.create-option:last').attr('id','score'+count);
    $('.create-option:last').attr('value','score'+count);
});
//点击单选题
$('#radioQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('radio').innerHTML;
    var divSum = div + 1;
    
    $('.create-form').append(_html);

    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','radio'+count);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-radio:last').attr('name','radio'+count);
    $('.create-radio:last').attr('id','radio'+count);
    $('.create-radio:last').attr('value','radio'+count);
    //为选项1 2 增加name属性
    $('.create-option:last').children('div:eq(3)').children('input:eq(1)').attr('name','radio'+count+'option1');
    $('.create-option:last').children('div:eq(4)').children('input:eq(1)').attr('name','radio'+count+'option2');
});
//点击多选题
$('#radioMultiQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('radioMulti').innerHTML;
    var divSum = div + 1;
    
    $('.create-form').append(_html);
   $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-radio:last').children('div:eq(1)').children('input').attr('name','radioMulti'+divSum);
    $('.create-radio:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-radio:last').attr('name','radioMulti'+divSum);
    $('.create-radio:last').attr('id','radioMulti'+divSum);
    $('.create-radio:last').attr('value','radioMulti'+divSum);
    //为选项1 2 增加name属性
    $('.create-option:last').children('div:eq(3)').children('input:eq(1)').attr('name','option1');
    $('.create-option:last').children('div:eq(4)').children('input:eq(1)').attr('name','option2');
});
//点击填空
$('#gapFillQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('gapFill').innerHTML;
    var divSum = div + 1;
    
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)');
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','gapFill'+divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');

    $('.create-option:last').children('div:eq(0)').attr('name',divSum);
    $('.create-option:last').attr('name','gapFill'+divSum);
    $('.create-option:last').attr('id','gapFill'+divSum);
    $('.create-option:last').attr('value','gapFill'+divSum);
});
//点击多项填空
$('#gapFillMultiQuest').click(function(){
    count = count + 1 ;
    var div = $('.create-form').children('div').length;
    div = div - 1;
    var _html = document.getElementById('gapMultiFill').innerHTML;
    var divSum = div + 1;
    
    $('.create-form').append(_html);
    $('.create-option:last').children('div:eq(0)').children('li').html(divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('name','gapMultiFill'+divSum);
    $('.create-option:last').children('div:eq(1)').children('input').attr('id','title');
    $('.create-option:last').children('div:eq(0)').attr('name','gapMultiFill'+divSum);
    $('.create-option:last').children('div:eq(2) ').children('input:eq(0)').attr('name',"option1");
    $('.create-option:last').children('div:eq(3) ').children('input:eq(0)').attr('name',"option2");
    //$('.create-option:last').children('div:eq(2) ').children('input:eq(1)').attr('name','gapMultiFill'+divSum+"-option1");
    //$('.create-option:last').children('div:eq(3) ').children('input:eq(1)').attr('name','gapMultiFill'+divSum+"-option2");
    $('.create-option:last').attr('name','gapMultiFill'+divSum);
    $('.create-option:last').attr('id','gapMultiFill'+divSum);
    $('.create-option:last').attr('value','gapMultiFill'+divSum);
});

//添加填空
function addGapFill(obj) {
    count = count + 1 ;
    var id = $(obj).parent().attr('name');
    var fid = id;
        id = "#" + id;
    var _html =  document.getElementById('gapFill-option').innerHTML;
    $(id+" div:last-child").before(_html);
    //统计选项个数
    var sum = $(id+" div").length - 3;
    //统计多项填空个数
    //标准 eg:gapMultiFill1-option-title
    $(id+" div:last-child").prev().children('input:eq(0)').attr('value',"选项"+sum);
    $(id+" div:last-child").prev().children('input:eq(0)').attr('name',"option"+sum);
    //$(id+" div:last-child").prev().children('input:eq(1)').attr('name',fid+"-option"+sum+"-title");
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = fid.replace(/[^a-z]+/ig,"");
    var title = $(obj).prev().children('input:eq(0)').val();
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}
//radio事件 全部删除
function delAll(obj) {
    //获取id
    var id = $(obj).parent().parent().attr('name');
        id = "#"+id;
    layer.confirm('您确定要删除吗？', {
      btn: ['是','否'] //按钮
    }, function(){
        var delId = $(obj).parents(".create").index(".create");
        var delNum = $(obj).parents(".create").index();
        var type = id.replace(/[^a-z]+/ig,"");
        $(id).remove();
      layer.msg('删除成功', {icon: 1});
        scortId();

        $.ajax({
            type: 'POST',
            url: '/home/alldel',
            dataType: "json",
            data:{
                'delnum' : delNum,
                'delid' : delId,
                'type' : type,
                '_token':$('input[name=_token]').val(),
            },
            complete : function(data) {

            },
            success : function(data) {

            }
        });
    });


}
//重新遍历
function scortId() {

    var divLen = $(".create-form").children('div').length;
    for(var i=1; i<divLen; i++) {

        $('.create-form').children('div').eq(i).children('div:eq(0) ').children('input').attr('name',i);
        $('.create-form').children('div').eq(i).children('div:eq(0) ').children('input').attr('value',i);
        $('.create-form').children('div').eq(i).children('div:eq(0) ').children('li').html(i);
    }
}
function del(obj) {
    //获取id
    var id = $(obj).attr('name');
        id = "#"+id;
    layer.confirm('您确定要删除吗？', {
      btn: ['是','否'] //按钮
    }, function(){
        //  对option重新排序
        //  获取要删除第几个option
        var optionNum = $(obj).parents('.options').index('.options')+1;
        var name = $(obj).parents(".create").attr('name');
        var nameStr = name.replace(/[^a-z]+/ig,"");
        //  radio第几次出现
        var divScort= $(obj).parents(".create").index("."+nameStr)+1;
        //  radio出现的总数
        var num = $('.create-form').children("."+nameStr).length;
        //获取要删除第几个的num
        //var numDel = $(obj).prev().attr('name').match(/\d+$/g);
        //  进项Ajax请求
        $.ajax({
            type: 'POST',
            url: '/home/deloption',
            dataType: "json",
            data:{
                'type' : nameStr, //    题型
                'typenum' : num, // 题型总数
                'operate' : divScort,  // 题型第几个要进项操作
                'deloption' : optionNum,   // 要删除第几个项
                '_token':$('input[name=_token]').val(),
            },
            complete : function(data) {

            },
            success : function(data) {

            }
        });
        $(obj).parent().parent().css('height','auto');
        $(obj).parent().remove();
      layer.msg('删除成功', {icon: 1});

    });

}
function addMulti(obj) {
    //获取id
    var id = $(obj).attr('name');          
        id = "#"+id;
    //获取父亲ID
    var f_id1 = $(obj).parent().attr('name');
    var f_id = "#"+f_id1 ;
    var _html = document.getElementById('radioMulti-option').innerHTML;
    $(f_id+" div:last-child").before(_html);
    //给input增加name eg：radioMulti1-option1 -title
    var inputs = $(f_id+" div:last-child").prev();
    var $sum = inputs.children('input').length;
    var $option = 'option'+$sum;
    inputs.children('input:eq(0)').attr('name',f_id1 +  'Option');
    inputs.children('input:eq(1)').attr('name',f_id1 + '-' + $option + '-title') ;
    inputs.children('input:eq(0)').attr('value',$sum);
    var $sum =  $(f_id).find('.options').length;
    for(var i=0; i<$sum; i++) {
        var sum = i+1;
        $(f_id).find('.options').eq(i).children('input:eq(1)').attr('name',f_id1 +'Option'+  sum ) ;
    }
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_id1.replace(/[^a-z]+/ig,"");
    var title = "选项";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });

}
function add(obj) {

    //获取id
    var id = $(obj).attr('name');
        id = "#"+id;

    //  获取父亲ID
    var f_id1 = $(obj).parent().attr('name');
    var f_id = "#"+f_id1
    var _html = document.getElementById('radio-option').innerHTML;
    $(f_id+" div:last-child").before(_html);
    //给input增加name eg：radioMulti1-option1 -title
    var inputs = $(f_id+" div:last-child").prev();

    var $sum =  $(f_id).find('.options').length;
    for(var i=0; i<$sum; i++) {
        var sum = i+1;
        $(f_id).find('.options').eq(i).children('input:eq(1)').attr('name','option'+  sum ) ;
    }
    var $option = 'Option'+$sum;
    //inputs.children('input:eq(0)').attr('name',f_id1 +  'option');
    //inputs.children('input:eq(1)').attr('name',f_id1 +  $option ) ;
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_id1.replace(/[^a-z]+/ig,"");
    var title = "选项";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}

//共同事件
function mOver(obj) {               
    var id = $(obj).attr('name');          
    id = "#"+id;
    //var spanLen =  $(id).find('span').length;
    
      $(id).find('span').removeClass('hide');
    
    
    //获取options的个数
    var divLen = $(id+'  div ').length;
    //计算新长度
    divLen = divLen - 3;
    var length = divLen*55 + 80 + 55;
    $(id).css('height','auto');
}
function mOut(obj) {
    var id = $(obj).attr('name');          
        id = "#"+id;

    if($(id).find('input').is(':focus')) {
        $(id).find('span').removeClass('hide');
       
    } else { 
        //获取options的个数
        var divLen = $(id+' div').length;
        //计算新长度
        divLen = divLen - 3;                        
        var length = divLen*50 + 60;
        //$(id).css('height','auto');
        $(id).find('span').addClass('hide');
    }
}
//失去焦点       
function mBlur(obj) {
    var id = $(obj).parent().parent().attr('name');          
    id = "#"+id;                   
    //获取options的个数
    var divLen = $(id+' div').length;
    //计算新长度
    divLen = divLen - 2;                    
    var length = divLen*50 + 60;
    //$(id).css('height',length+'px');
    $(id).find('span').addClass('hide');
}
// 矩阵填空表格行添加
function gapFillTableAddCol(obj) {
    var str =   "<td align='center'>"
        str +=  '<input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" readonly="true">'
        str +=  "</td>"
    var f_obj = $(obj).parents('.matrixGapFill').attr('name');
        f_id = "#"+f_obj;
    var addColTitleHtml = document.getElementById('matrixGapFillCol').innerHTML;
    var addColTitle = $(f_id).find('thead').find('tr').append(addColTitleHtml);
    var thLen = $(f_id).find('thead').find('tr').find('th').length-1;
    $(f_id).find('thead').find('th:last-child ').find('input').attr('name','row'+thLen);
    $(f_id).find('thead').find('th:last-child ').find('input').attr('value','选项'+thLen);
    var add = $(f_id).find('tbody').find('tr');
    for(var i=0; i<add.length; i++) {
        add.eq(i).append(str);
    }
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_obj.replace(/[^a-z]+/ig,"");
    var title = $(obj).parents('tr').children('th:last-child').find('input').attr('value');
    var direction = "row";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            'direction' : direction, // 方向
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}
// 矩阵填空表格列添加
function gapFillTableAddRow(obj) {
    var str =   "<td align='center'>"
        str +=  '<input type="text" class="btn " value="" style="width: 80px;border: 1px solid #2672ff;" readonly="true">'
        str +=  "</td>"
    var f_obj = $(obj).parents('.matrixGapFill').attr('name');
        f_id = "#"+f_obj;
    var addColTitleHtml = document.getElementById('matrixGapFillRow').innerHTML;
    $(f_id).find('tbody').append(addColTitleHtml); 
    var trLen = $(f_id).find('tbody').find('tr').length;
    var tdLen = $(f_id).find('thead').find('th').length-1;
    var add = $(f_id).find('tbody').find('tr:last-child');
    $(f_id).find('tbody').find('tr:last-child').find('th').find('input').attr('value','矩阵'+trLen);
    $(f_id).find('tbody').find('tr:last-child').find('th').find('input').attr('name','col'+trLen);
    for(var i=0; i<tdLen; i++) {
        add.append(str);
    }
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_obj.replace(/[^a-z]+/ig,"");
    var title = $(obj).parents('tbody').children('tr:last-child').find('input').attr('value');
    var direction = "col";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            'direction' : direction, // 方向
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}
//矩阵分数表格竖向添加
function scoreTableAddCol(obj) {

    var str =   "<td align='center'>"
        str +=  '<input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" readonly="true">'
        str +=  "</td>"
    var f_obj = $(obj).parents('.matrixScore').attr('name');
    f_id = "#"+f_obj;
    var addColTitleHtml = document.getElementById('matrixScoreCol').innerHTML;
    var addColTitle = $(f_id).find('thead').find('tr').append(addColTitleHtml);
    var thLen = $(f_id).find('thead').find('tr').find('th').length-1;
    $(f_id).find('thead').find('th:last-child ').find('input').attr('name','row'+thLen);
    $(f_id).find('thead').find('th:last-child ').find('input').attr('value','选项'+thLen);
    var add = $(f_id).find('tbody').find('tr');
    for(var i=0; i<add.length; i++) {
        add.eq(i).append(str);
    }
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_obj.replace(/[^a-z]+/ig,"");
    var title = $(obj).parents('tr').children('th:last-child').find('input').attr('value');
    var direction = "row";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            'direction' : direction, // 方向
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}
//矩阵分数表格横向添加
function scoreTableAddRow(obj) {
    var str =   "<td align='center'>"
        str +=  '<input type="text" class="btn " value="分数" style="width: 80px;border: 1px solid #2672ff;" readonly="true">'
        str +=  "</td>"
    var f_obj = $(obj).parents('.matrixScore').attr('name');
        f_id = "#"+f_obj;
    var addColTitleHtml = document.getElementById('matrixScoreRow').innerHTML;
    $(f_id).find('tbody').append(addColTitleHtml); 
    var trLen = $(f_id).find('tbody').find('tr').length;
    var tdLen = $(f_id).find('thead').find('th').length-1;
    var add = $(f_id).find('tbody').find('tr:last-child');
    $(f_id).find('tbody').find('tr:last-child').find('th').find('input').attr('value','矩阵'+trLen);
    $(f_id).find('tbody').find('tr:last-child').find('th').find('input').attr('name','col'+trLen);
    for(var i=0; i<tdLen; i++) {
        add.append(str);
    }
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_obj.replace(/[^a-z]+/ig,"");
    var title = $(obj).parents('tbody').children('tr:last-child').find('input').attr('value');
    var direction = "col";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            'direction' : direction, // 方向
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}
//矩阵单选表格竖向添加
function radioTableAddCol(obj) {
    var str =   "<td align='center'>"
        str +=  '<li class="icon_radio" ></li>'
        str +=  "</td>"

    var f_obj = $(obj).parents('.matrixRadio').attr('name');
        f_id = "#"+f_obj;
    var addColTitleHtml = document.getElementById('matrixRadioCol').innerHTML;
    var addColTitle = $(f_id).find('thead').find('tr').append(addColTitleHtml);
    var thLen = $(f_id).find('thead').find('tr').find('th').length-1;
    $(f_id).find('thead').find('th:last-child ').find('input').attr('name','row'+thLen);
    $(f_id).find('thead').find('th:last-child ').find('input').attr('value','选项'+thLen);
    var add = $(f_id).find('tbody').find('tr');
    for(var i=0; i<add.length; i++) {
        add.eq(i).append(str);
    }
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_obj.replace(/[^a-z]+/ig,"");
    var title = $(obj).parents('tr').children('th:last-child').find('input').attr('value');
    var direction = "row";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            'direction' : direction, // 方向
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}
//矩阵单选表格横向添加
function radioTableAddRow(obj) {
    var str =   "<td align='center'>"
        str +=  '<li class="icon_radio" ></li>'
        str +=  "</td>"
    var f_obj = $(obj).parents('.matrixRadio').attr('name');
        f_id = "#"+f_obj;
    var addColTitleHtml = document.getElementById('matrixRadioRow').innerHTML;
    $(f_id).find('tbody').append(addColTitleHtml); 
    var trLen = $(f_id).find('tbody').find('tr').length;
    var tdLen = $(f_id).find('thead').find('th').length-1;
    var add = $(f_id).find('tbody').find('tr:last-child');
    $(f_id).find('tbody').find('tr:last-child').find('th').find('input').attr('value','矩阵'+trLen);
    $(f_id).find('tbody').find('tr:last-child').find('th').find('input').attr('name','col'+trLen);
    for(var i=0; i<tdLen; i++) {
        add.append(str);
    }
    /*
    *   向后台传输数据进行添加
    *   题型操作  type
    *   第几个要进行操作 operate
    *   标题  title
    * */
    var type = f_obj.replace(/[^a-z]+/ig,"");
    var title = $(obj).parents('tbody').children('tr:last-child').find('input').attr('value');

    var direction = "col";
    var operate = $(obj).parents("."+type).index('.'+type);
    $.ajax({
        type: 'POST',
        url: '/home/addoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'title' : title, // 标题
            'operate' : operate, //  对第几个进行操作
            'direction' : direction, // 方向
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
}
//表格排删除
function tableDelCol(obj) {
    var f_obj = $(obj).parents('.create-option').attr('name');

    var f_id = "#"+f_obj;
    var num = $(obj).parent().siblings('input').attr('value');
    
    var g_num = num.replace(/[^0-9]/ig,"")-1;
    var trLen = $(f_id).find('tbody').find('tr').length;
    /*  接受要删除的数据
     *  题型  $type
     *  获取删除的方向 row col
     *  题型第几个要进项操作 $operate
     *  删除第几项 $delOption
     * */
    var direction   = $(obj).attr('name');
    var type = f_obj;
    var type = type.replace(/[^a-z]+/ig,"");
    var operate = $(obj).parents('.'+type).index('.'+type) + 1;

    var delOption = $(obj).parents('th').index("th") ;
    console.log(operate);
    $.ajax({
        type: 'POST',
        url: '/home/delmatrixoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'operate' : operate,  // 题型第几个要进项操作
            'direction' : direction,    //  要删除的方向
            'deloption' : delOption,   // 要删除第几个项
            '_token' : $('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
    for(var i=0; i<trLen; i++) {
        $(f_id).find('tbody').find('tr').eq(i).find('td').eq(g_num).remove();
    }
    $(obj).parents('.table_title').remove();
    //重新排版选项N
    //可能会设计到name值重新排版
    /*var thLen = $(f_id).find('thead').find('th').length;
    for(var j=1; j<thLen; j++) {
        $(f_id).find('thead').find('th').eq(j).find('input').attr('value','选项'+j);
    }*/
    //可能会设计到name值重新排版
}
//表格列删除
function tableDelRow(obj) {
/*    var f_obj = $(obj).parents('.create-option').attr('name');
        f_id = "#"+f_obj;*/
    var f_obj = $(obj).parents('.create-option').attr('name');
    var f_id = "#"+f_obj;
    var num = $(obj).parent().siblings('input').attr('value');

    var g_num = num.replace(/[^0-9]/ig,"")-1;
    var tdLen = $(obj).parents("tr").find('td').length;
    /*  接受要删除的数据
     *  题型  $type
     *  获取删除的方向 row col
     *  题型第几个要进项操作 $operate
     *  删除第几项 $delOption
     * */
    var direction   = $(obj).attr('name');
    var type = f_obj;
    var type = type.replace(/[^a-z]+/ig,"");
    var operate = $(obj).parents('.'+type).index('.'+type) + 1;
    console.log(operate);
    var delOption = $(obj).parents('tr').index("tr") ;

    $.ajax({
        type: 'POST',
        url: '/home/delmatrixoption',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'operate' : operate,  // 题型第几个要进项操作
            'direction' : direction,    //  要删除的方向
            'deloption' : delOption,   // 要删除第几个项
            '_token' : $('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });


    $(obj).parents("tr").eq(0).remove();
    //重新排版 可能会涉及到name值的确定 到时候如果需要在加就可以
    /*var trLen = $(f_id).find('tbody').find('tr').length;
    for(var j=0; j<trLen; j++) {
        var sum = j+1;
        $(f_id).find('tbody').find('tr').eq(j).find('input').eq(0).attr('value','矩阵'+sum);
    }*/
}

function toEdit(obj) {
    /*
    *   题型 type  公共的
    *   对几个题型进行操作 typenum  公共的
    *   选择对option或者title 进行操作  questtype  公共的
    *   如果是选项 对第几个进行操作  questtypenum  特有的
    *   更新的数据 title   公共的
    *   如果是矩阵 方向    direction  特有的
    * */
    var type = $(obj).parents('.create').attr('name');

    type = type.replace(/[^a-z]+/ig,"");
    var typeNum = $(obj).parents('.create').index("."+type);
    var questType = $(obj).attr('id');
    var title = $(obj).val();
    console.log(title);
    if(type != "matrixGapFill" && type != "matrixRadio" && type != "matrixScore") {
        var direction = $(obj).attr("direction") ? $(obj).attr("direction") : null;
        var questTypeNum = $(obj).parent().index() - 3;
    } else {
        var direction = $(obj).attr("direction") ? $(obj).attr("direction") : null;
        if(direction == "row") {
            var questTypeNum = $(obj).parents("th").index() -1;
        } else if (direction == "col"){
            var questTypeNum = $(obj).parents("tr").index();
        }
    }

    //  利用Ajax 传数据到后台
    $.ajax({
        type: 'POST',
        url: '/home/toedit',
        dataType: "json",
        data:{
            'type' : type, //    题型
            'typenum' : typeNum,
            'questtype' : questType,
            'questtypenum' : questTypeNum,
            'title' : title,
            'direction' : direction,
            '_token':$('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {

        }
    });
    //questType = questType.replace(/[^a-z]+/ig,"");


}

//  对新增的题进行入库
$(".quest").click(function(){
    var name = $('.create-form').children('div:last-child').attr('name');
    var obj  = $('.create-form').children('div:last-child');
    var nameStr = name.replace(/[^a-z]+/ig,"");
    switch(nameStr) {
        case 'radio' : newData += radio(obj)+","; break;
        case 'radioMulti' : newData += radioMulti(obj)+","; break;
        case 'gapFill' : newData += gapFill(obj)+","; break;
        case 'gapMultiFill' : newData += gapMultiFill(obj)+",";break;
        case 'score' : newData += score(obj)+","; break;
        case 'descr' : newData += descr(obj)+","; break;
        case 'page' :   newData += page(obj)+","; break;
        case 'hr' : newData += hr(obj)+","; break;
        case 'name' : newData += nameFrom(obj)+","; break;
        case 'phone' : newData += phone(obj)+",";break;
        case 'email': newData += email(obj)+",";break;
        case 'sex' : newData += sex(obj)+","; break;
        case 'date' : newData += date(obj)+",";break;
        case 'time' : newData += time(obj)+",";break;
        case 'city' : newData += city(obj)+",";break;
        case 'address' : newData += address(obj)+",";break;
        case 'matrixRadio' : newData += matrixRadio(obj)+",";break;
        case 'matrixScore' : newData += matrixScore(obj)+","; break;
        case 'matrixGapFill' : newData += matrixGapFill(obj)+","; break;
    }
    //  利用Ajax提交新的数据
    $.ajax({
        type: 'POST',
        url: '/home/addchecksave',
        dataType: "json",
        data:{
            'list' : newData,
            '_token' : $('input[name=_token]').val(),
        },
        complete : function(data) {

        },
        success : function(data) {
            save = 1;
            isClick = 0;
            newData = "";
        }
    });




});
//  对题增加选项进行入库


//矩阵填空
function matrixGapFill(obj) {
    var str = "";
    str += "type" + ":" + "matrixGapFill"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    $(obj).find('thead').find('th').each(function(index,element){
        if(index > 0 ) {
            var sum = index - 1 ;
            str += 'rowOption'+sum + ":" + $(this).find('input').val() + "|";
        }
    });
    $(obj).find('tbody').find('tr').each(function(index,element) {
        //arr['colOption'+index] = $(this).find('input').val();
        str += 'colOption'+index + ":" + $(this).find('input').val() +"|";
    });

    return str;
}
//矩阵分数
function matrixScore(obj) {
    var str = "";
    str += "type" + ":" + "matrixScore"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    $(obj).find('thead').find('th').each(function(index,element){
        if(index > 0 ) {
            var sum = index -1 ;
            str += 'rowOption'+sum + ":" + $(this).find('input').val() + "|";
        }
    });
    $(obj).find('tbody').find('tr').each(function(index,element) {
        //arr['colOption'+index] = $(this).find('input').val();
        str += 'colOption'+index + ":" + $(this).find('input').val() +"|";
    });

    return str;
}
//矩阵单选题
function matrixRadio(obj) {
    var str = "";
    str += "type" + ":" + "matrixRadio"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    $(obj).find('thead').find('th').each(function(index,element){
        if(index > 0 ) {
            var sum = index -1 ;
            str += 'rowOption'+sum + ":" + $(this).find('input').val() + "|";
        }
    });
    $(obj).find('tbody').find('tr').each(function(index,element) {
        //arr['colOption'+index] = $(this).find('input').val();
        str += 'colOption'+index + ":" + $(this).find('input').val() +"|";
    });

    return str;
}
//address
function address(obj) {
    var str = "";
    str += "type" + ":" + "address"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//city
function city(obj) {
    var str = "";
    str += "type" + ":" + "city"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//time
function time(obj) {
    var str = "";
    str += "type" + ":" + "time"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";

    return str;
}
//date
function date(obj) {
    var str = "";
    str += "type" + ":" + "date"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//sex
function sex(obj) {
    var str = "";
    str += "type" + ":" + "sex"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//email
function email(obj) {
    var str = "";
    str += "type" + ":" + "email"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//phone
function phone(obj) {
    var str = "";
    str += "type" + ":" + "phone"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//name
function nameFrom(obj) {
    var str = "";
    str += "type" + ":" + "name"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//hr
function hr(obj) {
    var str = "";
    str += "type" + ":" + "hr"+"|";
    return str;
}
//page
function page(obj) {
    var str = "";
    str += "type" + ":" + "page"+"|";

    return str;
}
//descr
function descr(obj) {
    var str = "";
    str += "type" + ":" + "descr"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//score
function score(obj) {
    var str = "";
    str += "type" + ":" + "score"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//gapMultiFill处理
function gapMultiFill(obj) {
    var str = "";
    str += "type" + ":" + "gapMultiFill"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    var gapFillLen = $(obj).children('.options').length;
    for(var i=0; i<gapFillLen; i++) {
        str +='option'+i +":"+ $(obj).children('.options').eq(i).children('input:eq(0)').val()+"|";
    }

    return str;
}
//gapFill处理
function gapFill(obj) {
    var str = "";
    str += "type" + ":" + "gapFill"+"|";
    str += "title" + ":" + $(obj).children('div:eq(1)').children('input').val() +"|";
    return str;
}
//radioMulti处理
function radioMulti(obj) {
    var str = "";
    str += "title"+":"+ $(obj).children('div:eq(1)').children('input').val()+"|";
    str += "type"+":"+'radioMulti'+"|";


    var optionLen = $(obj).children('.options').length;
    for(var i=0; i<optionLen; i++) {
        str +='option'+i +":"+ $(obj).children('.options').eq(i).children('input:eq(1)').val()+"|";
    }
    return str;
}
//radio处理
function radio(obj) {
    var str = "";
    str += "title"+":"+ $(obj).children('div:eq(1)').children('input').val()+"|";
    str += "type"+":"+'radio'+"|";
    var optionLen = $(obj).children('.options').length;
    for(var i=0; i<optionLen; i++) {
        str += 'option'+i+":"+$(obj).children('.options').eq(i).children('input:eq(1)').val()+"|";
    }
    return str;
}



