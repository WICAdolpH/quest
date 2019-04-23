<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    // 后台首页登陆页面
    public function index() {

        if ( Auth::guard('admin') -> check() ) {
            //跳转到后台首页
            return redirect('/admin/index');
        }
        return view("admin.login.index");
    }

    //验证数据
    public function check(Request $request){
        // 开始自动认证
        $this -> validate($request,[
            // 验证规则语法   需要验证的字段名 => '验证规则1|验证规则2|验证规则3:20|...'
            // 用户名，必填，长度介于2-20
            'username' => 'required|min:2|max:20',
            // 密码，必填，长度至少是6
            'password' => 'required|min:6',
            // 验证码,必填,长度等于5，必须是合法的验证码
            'captcha' => 'required|captcha'
        ]);
        // 继续开始进行省份核实
        $data = $request -> only([ 'username', 'password' ]);
        $user = $request -> get('username');
        \Session::push('adminUserInfo',$user);
        $result = Auth::guard('admin') -> attempt($data,$request -> get('online') ? $request -> get('online') : 0);
       // $result = Auth::guard('admin') -> attempt($data,$request -> get('online'));
        // 判断是否成功
        if ($result) {
            // 跳转到后台页面
            return redirect('/admin/index');
        } else {
            // 跳转到登陆页面
            return redirect('/admin/login') -> withErrors([
                'loginError' => '用户名或密码错误'
            ]);
        }
    }

    //后台退出路由
    public function logout(Request $request) {
        // 退出
        Auth::guard('admin')->logout();
        // 跳转到登陆页面
        return redirect('/admin/login');
    }
}
