<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function articles()
    {
      return $this->belongsToMany('App\Template');
    }
}
