<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Colleague;

class InviteBoss extends Model
{
    protected $table = 'invite_boss';
    
    public function scopeListing($quest)
    {
        return InviteBoss::get();
    }

    public function scopeStore($quest, $request, $time, $key)
    {
        if (InviteBoss::whereEmail($request->email)->count() > 0) {
            return false;
        }
        else {
            $add = new InviteBoss;
            $add->name = $request->name;
            $add->surname = $request->surname;
            $add->email = $request->email;
            $add->boss_id = $request->boss;
            $add->role_id = $request->role;
            $add->sex_id = $request->sex;
            $add->key = $key;
            $add->time = $time;
            $add->save();
            return true;
        }
    }
    
    public function scopeUp($quest, $email, $key)
    {
        $newTime = time();
        if ($up = InviteBoss::whereEmail($email)->first()) {
            if ($up->key == $key && $newTime <= $up->time) {
                return $up;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    
        
}
