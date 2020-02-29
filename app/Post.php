<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Post extends Model
{

	protected $fillable = [
        'draft', 'title', 'body'
    ];

  public function user() {
      return $this->belongsTo('App\User');
  }
  
  public function category() {
    return $this->belongsTo('App\Category');
  }

  public function tags() {
    return $this->belongsToMany('App\Tag');
  }

}

