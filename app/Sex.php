<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $table = 'users';
    
    public function colleague()
    {
        return $this->hasMany('App\Colleague');
    }    
}
