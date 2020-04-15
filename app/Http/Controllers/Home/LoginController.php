<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin\User;

class LoginController extends Controller
{
    //前台登陆页面
    public function login() {
        //dd(\Session::get("userInfo"));
        $info = \Session::get('userInfo') ?? 0;

        if ($info) {
            return redirect("/home/index");
        } else {
            //dd($info);
            //展示登陆页面
            return view('home.login.index');
        }

    }

    //验证数据
    public function check(Request $request){
        //dd(1);
        // 开始自动认证
        $this -> validate($request,[
            // 验证规则语法   需要验证的字段名 => '验证规则1|验证规则2|验证规则3:20|...'
            // 用户账号，必填，长度介于2-20
            'username' => 'required|min:2|max:20',
            // 密码，必填，长度至少是6
            'password' => 'required|min:6',
            // 验证码,必填,长度等于5，必须是合法的验证码
            'captcha' => 'required|captcha'
        ]);
        // 继续开始进行省份核实
        $data = $request -> only([ 'username', 'password' ]);
        $user = $request -> get('username');
        \Session::put('userInfo',$user);
        //dd(\Session::get('userInfo'));
        $result = Auth::guard('user') -> attempt($data,$request -> get('online'));
        // $result = Auth::guard('admin') -> attempt($data,$request -> get('online'));
        // 判断是否成功
        if ($result) {
            // 跳转到后台页面
            return redirect('/home/index');
        } else {
            // 跳转到登陆页面
            return redirect('/home/login') -> withErrors([
                'loginError' => '用户名或密码错误'
            ]);
        }
    }

    //注册页面
    public function register(Request $request) {
        //判断请求方式
        if($request -> getMethod() == "GET") {
            return view('home.login.register');
        }elseif ($request -> getMethod() == "POST") {
            //数据接受
            $username = $request -> get('username'); //用户账号
            $password = $request -> get('password');
            $name = $request -> get('name'); //用户姓名
            $this -> validate($request,[
                // 验证规则语法   需要验证的字段名 => '验证规则1|验证规则2|验证规则3:20|...'
                // 用户账号，必填，长度介于2-20
                'username' => 'required|min:2|max:20',
                //用户姓名,必填,长度介于2-20
                'name'  => 'required|min:2|max:20',
                // 密码，必填，长度至少是6
                'password' => 'required|min:6|same:password2|max:20',
            ]);
            $userInfo = array(
                'name' => $name,
                'username' => $username,
                'password' => bcrypt($password),
            );
            //  判断username是否出现过
            $db_username = \DB::table('user') -> where('username',$username) -> get();

            if (count($db_username) == 0) {
                $result = User::insert($userInfo);
                if($result) {
                    return 1;
                } else {
                    return redirect('/home/register') -> withErrors([
                        'registerError' => '有错误'
                    ]);
                }
            } else {
                return response()->json(['msg'=>"用户名已存在","status"=>422]);
            }

        }

    }


    //  退出登陆
    public function logout(Request $request) {
        // 退出
        Auth::guard('user')->logout();
        \Session::flush();
        // 跳转到登陆页面
        return redirect("/home/login");
    }



}
