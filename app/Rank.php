<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';
    
    public function scopeListing($quest)
    {
        return Rank::get();
    }    
    
    public function scopeStore($quest, $request)
    {
        if (Rank::whereRank($request->rank)->count() > 0) {
            return false;
        }
        else {
            $add = new Rank;
            $add->rank = $request->rank;
            $add->save();
            return true;
        }
    }    
    
    public function scopeEdit($quest, $id)
    {
        return Rank::find($id);
    }    
    
    public function scopeUp($quest, $id, $request)
    {
        $up = Rank::find($id);
        if (Rank::whereRank($request->rank)->count() > 0 && $up->rank != $request->rank) {
            return false;
        }
        else {
            $up->rank = $request->rank;
            $up->save();
            return true;
        }        
    }    
    
    public function scopeDestr($quest, $id)
    {
        $destroy = Rank::find($id);
        if ($destroy->colleague()->count() > 0) {
            $destroy->colleague()->detach();
        }
        $destroy->delete();
    }    
    
    public function colleagues()
    {
        return $this->belongsToMany('App\Colleague');
    }    
}
