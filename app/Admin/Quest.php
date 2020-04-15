<?php
namespace App\Admin;


use Illuminate\Database\Eloquent\Model;
//引入trait
use Illuminate\Auth\Authenticatable;
use App\Admin\User;

class Quest extends Model
{
    protected $table = 'quest';
    protected $appends = ['user_name', 'voter_name'];

    public function getVoterNameAttribute()
    {
        $voterId = $this->attributes['voter_id'];
        $voterId = trim($voterId, ',');
//        dd($voterIds=="");

        if ($voterId == "") return "";
        $voterId = explode(',', $voterId);
        $voterName = [];
        foreach ($voterId as $k => $v) {
            $voterName[] = User::find($v)->name ?? "";
        }
        return $voterName;
    }

    public function getUserNameAttribute()
    {
        $id = $this->attributes['user_id'];
        $user = User::find($id);
        $name = $user->name ?? "";
        return $name;
    }
}