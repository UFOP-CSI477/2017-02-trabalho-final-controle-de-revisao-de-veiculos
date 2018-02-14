<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vistoria extends Model
{

  public function veiculo()
  {
      return $this->belongsTo('App\Veiculo');
  }

  public function servico()
  {
      return $this->belongsTo('App\Servico');
  }


  protected $fillable = [
    'data',
    'hora',
    'servico_id',
    'veiculo_id',
    'quilometragem',
    'user_id'
  ];
}
