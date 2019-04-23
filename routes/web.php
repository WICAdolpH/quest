<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('test','Admin\TestController@test');




//后台登陆路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],function(){
    //后台登陆首页
    Route::get('login','LoginController@index')->name('login');
    //后台登陆处理路由
    Route::post('check', 'LoginController@check');
    //退出地址
    Route::get('logout', 'LoginController@logout');
});


//后台路由
Route::get('admin/user/getareabyid','Admin\UserController@getAreaById');    //Ajax联动
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['auth:admin']], function(){
    //后台首页
    Route::get('index','IndexController@index');        //后台首页展示

    //用户管理
    Route::get('user/index','UserController@index');    //用户列表展示
    Route::post('user/control','UserController@control');    //用户控制 停用启用
    Route::any('user/edit','UserController@edit'); //用户编辑
    Route::any('user/add','UserController@add');    //添加用户

    Route::post('user/del','UserController@del');   //用户删除
    Route::post('user/delall','UserController@delAll'); //批量删除
    Route::any('user/changepass','UserController@changePass');  //密码更改
    Route::get('user/detail','UserController@detail');
    //上传
    Route::post('user/webuploader', 'UploaderController@webuploader');
});

Route::group(['prefix' => 'home', 'namespace' => 'Home'],function(){
    //前台登录
    Route::get('login','LoginController@login')->name('login');    //  前台登陆页面
    Route::post('check','LoginController@check');   //  登陆检查
    Route::any('register','LoginController@register'); //   注册
    Route::any('logout','LoginController@logout');  //  退出
});

//前台路由
Route::group(['prefix' => 'home', 'namespace' => 'Home','middleware' => ['auth:user']],function(){



    //前台首页
    Route::get('index','IndexConTroller@index');    //  前台首页展示
    Route::get('usecheck','UseCheckController@index'); //   这是使用页面的首页
    Route::any('createcheck','CreateCheckController@createCheck');  //这是创建调查问卷页面
    Route::any('checksave','CreateCheckController@checkSave');  //  创建出的页面保存
    Route::any('addchecksave','CreateCheckController@addCheckSave');  //页面新增保存
    Route::any('deloption','CreateCheckController@delOption');   //  小项删除
    Route::any('delmatrixoption',"CreateCheckController@delMatrixOption");   //  矩阵类型小项删除
    Route::any('addoption',"CreateCheckController@addOption");  //  增加选项
    Route::any('alldel',"CreateCheckController@delAll"); //     对于一个小题型删除全部
    Route::any('toedit',"CreateCheckController@toEdit"); //     动态修改
    Route::any('edit',"CreateCheckController@Edit");    // 修改标题
    Route::any('delall',"UseCheckController@delAll");   //删除某一个调查问卷
    Route::any('create',"UseCheckController@create"); //   创建页面
    Route::any('editcheck',"UseCheckController@editCheck"); //  对已有的页面进行编辑
    //创建调查问卷页面使用的API接口
    Route::any('addressapi','UserCheckController@addressApi');  //获取当前位置接口

    Route::any('participate',"ParticipateCheckController@index");    //  参与调查前端页面
    Route::any('toparticiate',"ParticipateCheckController@toParticipate"); //  参与调查
    Route::any("savecheck","ParticipateCheckController@saveCheck"); //  问卷数据保存
    Route::post('passcheck','CheckDataController@passCheck'); // 问卷密码检验
});


Route::get('/home', 'HomeController@index');
Route::any('/home/checkdata','Home\CheckDataController@checkData');