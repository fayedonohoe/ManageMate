<?php
# @Date:   2020-02-25T11:18:32+00:00
# @Last modified time: 2020-02-26T14:51:45+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShift extends Model
{
  public function user(){
    return $this->belongsTo('App\User'); //->withPivot('date', 'unavailable', 'note')->withTimestamps();
  }

  public function shift(){
    return $this->belongsTo('App\Shift');
  }
}
