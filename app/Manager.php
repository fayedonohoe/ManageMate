<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function visits(){
       return $this->belongsToMany('App\Employee')->using('App\Visit');
    }
}
