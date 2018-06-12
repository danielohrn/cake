<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function template()
    {
      return $this->belongsTo('App\Template');
    }
    public function article()
    {
      return $this->hasOne('App\Article');
    }
    public function role()
    {
      return $this->belongsTo('App\Role');
    }
    public function tags()
    {
      return $this->belongsToMany('App\Tag')->withTimestamps();
    }

}
