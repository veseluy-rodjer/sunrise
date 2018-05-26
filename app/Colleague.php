<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colleague extends Model
{
    protected $table = 'users';
    
    public function scopeListing($quest, $order)
    {
        if ($order == null) {
            return Colleague::where('id', '!=', 1)->paginate(10);
        }
        else {
            return Colleague::orderBy($order)
            ->where('boss_id', '!=', -1)
            ->get();
        }        
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
