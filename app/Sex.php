<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $table = 'sexes';
    
    public function scopeListing($quest)
    {
        return Sex::get();
    }    
    
    public function colleague()
    {
        return $this->hasMany('App\Colleague');
    }    
}
