<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function scopeListing($quest)
    {
        return Role::get();
    }    
    
    public function scopeStore($quest, $request)
    {
        if (Role::whereRole($request->role)->count() > 0) {
            return false;
        }
        else {
            $add = new Role;
            $add->role = $request->role;
            $add->save();
            return true;
        }
    }    
    
    public function scopeEdit($quest, $id)
    {
        return Role::find($id);
    }    
    
    public function scopeUp($quest, $id, $request)
    {
        $up = Role::find($id);
        if (Role::whereRole($request->role)->count() > 0 && $up->role != $request->role) {
            return false;
        }
        else {
            $up->role = $request->role;
            $up->save();
            return true;
        }        
    }    
    
    public function scopeDestr($quest, $id)
    {
        $destroy = Role::find($id);
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
