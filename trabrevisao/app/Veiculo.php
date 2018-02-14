<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  protected $fillable = [
    'placa',
    'cor',
    'modelo',
    'user_id'
  ];


}
