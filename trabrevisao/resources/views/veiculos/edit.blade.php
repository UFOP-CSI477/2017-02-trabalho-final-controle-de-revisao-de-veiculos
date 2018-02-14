@extends('layouts.app')

@section('content')

<div class="container">



  <h1>Editar Veículo - {{$veiculo->placa}} </h1>
  <p class="lead">Edite este veículo abaixo</p>
  <hr>

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Editar veículo</div>
              <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('veiculos.update',$veiculo) }}">
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <div class="form-group">
                          <label for="cor" class="col-md-4 control-label">Cor</label>

                          <div class="col-md-6">
                              <input id="cor" type="text" step="any" name="cor" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="modelo" class="col-md-4 control-label">Modelo</label>

                          <div class="col-md-6">
                              <input id="modelo" type="text" step="any" name="modelo" required>
                          </div>
                      </div>





                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Editar Veículo
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

</div>

@endsection
