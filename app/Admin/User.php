<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//引入trait
use Illuminate\Auth\Authenticatable;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义当前模型所需要的数据表
    protected $table = 'user';

    //使用trait，就相当于将整个trait代码段复制到这个位置
    use Authenticatable;
}
