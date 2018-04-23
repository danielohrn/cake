<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function tags()
    {
      return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function role()
    {
      return $this->belongsTo('App\Role');
    }

    protected $hidden = [
      'tags'
    ];

}
