<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    protected $table = 'bosses';
    
    public function colleague()
    {
        return $this->belongsToMany('App\Colleague');
    } 
    
       
}
