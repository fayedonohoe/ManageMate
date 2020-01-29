<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  public function employees(){
    return $this->hasMany('App\Employee', 'contract_id');
  }
}
