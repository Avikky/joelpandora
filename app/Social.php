<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['name','link','updated_at', 'created_at'];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
}
