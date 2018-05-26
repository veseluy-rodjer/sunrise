<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    
    public function colleague()
    {
        return $this->belongsToMany('App\Colleague');
    }    
}
