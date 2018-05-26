<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';
    
    public function colleagues()
    {
        return $this->hasMany('App\Colleague');
    }    
}
