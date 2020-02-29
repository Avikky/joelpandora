<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
            /**
     * Get the  name parameter.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}
