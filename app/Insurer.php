<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
  public function patients(){
    return $this->hasMany('App\Patient', 'insurer_id');
  }
}
