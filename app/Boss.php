<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    protected $table = 'bosses';
    
    public function scopeListing($quest)
    {
        return Boss::get();
    }    
    
    public function scopeStore($quest, $request)
    {
        if (Boss::whereBoss($request->boss)->count() > 0) {
            return false;
        }
        else {
            $add = new Boss;
            $add->boss = $request->boss;
            $add->save();
            return true;
        }
    }    
    
    public function scopeEdit($quest, $id)
    {
        return Boss::find($id);
    }    
    
    public function scopeUp($quest, $id, $request)
    {
        $up = Boss::find($id);
        if (Boss::whereBoss($request->boss)->count() > 0 && $up->boss != $request->boss) {
            return false;
        }
        else {
            $up->boss = $request->boss;
            $up->save();
            return true;
        }        
    }    
    
    public function scopeDestr($quest, $id)
    {
        $destroy = Boss::find($id);
        if ($destroy->colleague()->count() > 0) {
            $destroy->colleague()->detach();
        }
        $destroy->delete();
    }
        
    public function colleague()
    {
        return $this->belongsToMany('App\Colleague');
    } 
    
       
}
