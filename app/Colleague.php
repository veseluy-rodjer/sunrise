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
        $sex = Sex::find($request->sex);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->boss()->sync([$request->boss]);
        $user->role()->detach();
        foreach ($request->role as $x) {
            $user->role()->attach($x);
        }
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
