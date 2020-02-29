<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
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

}
