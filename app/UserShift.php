<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShift extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function shift(){
    return $this->belongsTo('App\Shift');
  }
}
