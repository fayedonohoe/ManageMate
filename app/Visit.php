<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  public function employee(){
    return $this->belongsTo('App\Employee');
  }

  public function manager(){
    return $this->belongsTo('App\Manager');
  }
}
