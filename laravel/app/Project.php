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
}
