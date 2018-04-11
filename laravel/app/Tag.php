<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /* Get the articles associated with given Tag */
    public function articles()
    {
      return $this->belongsToMany('App\Article');
    }
}
