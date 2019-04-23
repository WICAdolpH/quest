<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\User;
use DB;
use Input;


class UserController extends Controller
{
    //用户列表展示
    public function index() {
        //获取用户数据
        $data = User::get();
        return view('admin.user.index',compact('data'));
    }

    //用户控制 停用启用
    public function control(Request $request) {
        //获取ID和状态
        $id = $request->get('id');
        $status = $request -> get('status');
        //当用户为启用状态 变化到停止状态
        if($status == '0') {
            $res = User::where('id',$id)-> update(['status' => 1]);
            return $res ? 1 : 0;
        }
        //当用户为停止状态  变化到启用状态
        if($status == '1') {
            $res = User::where('id', '=',"{$id}")->update(['status' => 0]);
            return $res ? 1 : 0;
        }
    }

    //用户编辑
    public function edit(Request $request) {
        //判断请求类型
        if($request -> getMethod() == "GET") {
            $id = $request -> get('id');
            $userInfo = User::where('id',$id) ->get() -> toArray();
            $country = \DB::table('area') -> where('pid','0') -> get();
            return view('admin.user.edit',compact('userInfo','country'));
        } elseif ($request -> getMethod('POST') ) {
            //接受信息
            $id = $request -> get('id');
            $oldusername = $request -> get('oldusername');
            $username = $request -> get('username');
            $name = $request -> get('name');
            $gender = $request -> get('gender');
            $mobile = $request -> get('mobile');
            $email = $request -> get('email');
            $avatar = $request -> get('avatar');
            $address = $request -> get('address');
            if($oldusername == $username) {
                //更新后的用户信息
                $updateInfo = array(
                    'username' => $username,
                    'gender'   => $gender,
                    'mobile'    => $mobile,
                    'email'     => $email,
                    'avatar'    => $avatar,
                    'address'   => $address,
                    'name'      => $name,
                );
                $result = User::where('id',$id) -> update($updateInfo);
                return $result ? 1 : 0;
            } else {
                $reCheck = User::where('username',$username) -> get() -> toArray();
                if(!$reCheck) {
                    //更新后的用户信息
                    $updateInfo = array(
                        'username' => $username,
                        'password' => \Crypt::encryptString($password),
                        'gender'   => $gender,
                        'mobile'    => $mobile,
                        'email'     => $email,
                        'avatar'    => $avatar,
                        'address'   => $address,
                        'name'      => $name,
                    );
                    $result = User::where('id',$id) -> update($updateInfo);
                    return $result ? 1 : 0;
                } else {
                    return "用户账号有重复";
                }
            }

        }
    }

    //用户添加
    public function add(Request $request) {
        //获取请求类型
        $request_method = $request -> getMethod();
        if($request_method == "GET") {
            //查询国家数据
            $country = \DB::table('area') -> where('pid','0') -> get();
            return view('admin.user.add',compact('country'));
        } elseif ($request_method == "POST") {
            $country_id = $request -> get('country_id');
            $province_id = $request -> get('province_id');
            $city_id = $request -> get('city_id');
            $county_id = $request -> get('county_id');
            $country = DB::table('area') -> where('id', $country_id) -> value('area');
            $province = DB::table('area') -> where('id', $province_id) -> value('area');
            $city = DB::table('area') -> where('id', $city_id) -> value('area');
            $county = DB::table('area') -> where('id', $county_id) -> value('area');
            $address = $country.$province.$city.$county;
            //实现数据的保存
            //自动验证
            $result = User::insert([
                'name'          =>      $request -> get('name'),
                'username'		=>		$request -> get('username'),
                'password'		=>		bcrypt('password'),
                'gender'		=>		$request -> get('gender'),
                'mobile'		=>		$request -> get('mobile'),
                'email'			=>		$request -> get('email'),
                'avatar'		=>		$request -> get('avatar'),
                'address'      =>      $address,
                'status'		=>		$request -> get('status'),
                'created_at'	=>		date('Y-m-d H:i:s')
            ]);
            //返回输出
            return $result ? '1' : '0';
        }

    }

    //用户删除
    public function del(Request $request){
        //接受Id
        $id = $request -> get('id');
        $result = User::where('id',$id) -> delete();
        return $result ? 1 : 0;
    }

    //批量删除
    public function delAll(Request $request) {
        //获取需要批量删除的ID,并对字符串进行处理
        $ids = $request -> get('ids');
        $id = trim($ids,",");
        $id = explode(',', $id);
        //遍历数据进行删除操作
        foreach ($id as $val) {
            if(User::where('id',$val) ->delete()) {
                continue;
            }else{
                return 0;
            }
        }
        return 1;
    }

    //Ajax 四级联动获取数据
    public function getAreaById(Request $request) {
        //接受父级ID
        $id = $request -> get('id');
        //通过父级ID查询数据
        $data = \DB::table('area')->where('pid',$id)->get();
        //返回json数据
        return response()->json($data);
    }

    //密码修改
    public function changePass(Request $request) {
        //判断请求类型

        if($request -> getMethod() == "GET") {
            //展示页面

            return view('admin.user.changePass');
        } elseif ($request -> getMethod() == 'POST') {

            //接受值
            $id = $request -> get('id');
            $oldPass = $request -> get('oldPass');
            $newPass = $request -> get('newPass');
            $reNewPass = $request -> get('reNewPass');
            $userPass = User::where('id',$id) -> value('password');
            if(\Hash::check($oldPass, $userPass)) {
                //判断两次密码是否相同
                if($newPass == $reNewPass) {
                    //密码更新
                    $result = User::where('id',$id) -> update(['password' => bcrypt($newPass)]);
                    return $result ? 1 : 0;
                } else {
                    return "两次密码不同";
                }

            } else {
                return "密码错误";
            }
        }

    }

    //用户信个人息列表展示


}
