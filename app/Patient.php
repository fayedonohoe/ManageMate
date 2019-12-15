<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function insurer(){
      return $this->belongsTo('App\Insurer');
    }


    public function visits(){
       return $this->belongsToMany('App\Doctor')->using('App\Visit');
    }
}
