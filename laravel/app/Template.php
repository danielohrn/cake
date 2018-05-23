<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function roles()
    {
      return $this->belongsToMany('App\Role');
    }
    public function project()
    {
      return $this->hasOne('App\Project');
    }
}
