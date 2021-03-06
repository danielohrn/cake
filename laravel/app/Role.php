<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function template()
    {
      return $this->belongsToMany('App\Template');
    }
    public function project()
    {
      return $this->belongsToMany('App\Project');
    }
}
