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
            $role = [];
            foreach ($request->role as $x) {
                $role[] = $x;
            }
            $add->role_id = serialize($role);
            $add->sex_id = $request->sex;
            $add->key = $key;
            $add->time = $time;
            $add->belong = $request->user()->id;
            $add->save();
            return true;
        }
    }
    
    public function scopeUp($quest, $email, $key)
    {
        $newTime = time();
        if (InviteBoss::whereEmail($email)->count() > 0) {
            $up = InviteBoss::whereEmail($email)->first();
            if ($up->key == $key && $newTime <= $up->time) {
               InviteBoss::whereEmail($email)->delete();
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
