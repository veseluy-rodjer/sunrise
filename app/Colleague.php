<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Boss;
use App\Role;
use App\Sex;

class Colleague extends Model
{
    protected $table = 'users';
    
    public function scopeListing($quest, $order)
    {

            if (!empty(Auth::user()) && Auth::user()->belong === 0) {
                return Colleague::orderBy($order)
                ->where('belong', '!=', 0)
                ->paginate(10);
            }
            elseif (!empty(Auth::user())) {
                return Colleague::orderBy($order)
                ->whereBelong(Auth::user()->id)
                ->paginate(10);
            }
    }

    public function scopeEdit($quest, $id)
    {
        return Colleague::find($id);
    }
    
    public function scopeUp($quest, $id, $request)
    {
        $user = Colleague::find($id);
        $boss = Boss::whereBoss($request->boss)->first();
        $role = Role::whereRole($request->role)->first();
        $sex = Sex::whereSex($request->sex)->first();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->boss()->sync([$boss->id]);
        $user->role()->sync([$role->id]);
        $user->sex()->associate($sex);
        $user->save();        
    }    
    
    public function sex()
    {
        return $this->belongsTo('App\Sex');
    }
    
    public function boss()
    {
        return $this->belongsToMany('App\Boss');
    }
    
    public function rank()
    {
        return $this->belongsToMany('App\Rank');
    }
    
    public function role()
    {
        return $this->belongsToMany('App\Role');
    }    
}
