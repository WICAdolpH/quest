<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //产生faker实例
        $faker = \Faker\Factory::create('zh_CN');
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            //访问具体的属性来获取数据
            $data[] = [
                'username'		 =>	 $faker -> userName,	//生成用户名
                'password'		 =>	 bcrypt('123456'),	//使用框架内置bcrypt方法加密密码
                'gender'		 =>  rand(1,3),	//性别随机 1男2女3保密
                'mobile'		 =>	 $faker -> phoneNumber,	//生成手机号
                'email'			 =>	 $faker -> email,	//邮箱
                'created_at'	 =>	 date('Y-m-d H:i:s',time()),	//创建时间
                'avatar'        =>  "/statics/avatar.jpg",//用户头像
                'name'          =>  $faker -> name,  //用户刚开始的用户名字
                'status'        =>  rand(0,1), //用户状态 0可用1禁用2拉黑
                'address'       =>  $faker -> address,
            ];
        }
        //写入到数据库
        DB::table('user') -> insert($data);
    }
}
