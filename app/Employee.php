<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function contract(){
      return $this->belongsTo('App\Contract');
    }


    public function rostered_shifts(){
       return $this->belongsToMany('App\Shift')->using('App\RosteredShift');
    }
}
