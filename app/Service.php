<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    
    public function setNameAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
        
 
}

