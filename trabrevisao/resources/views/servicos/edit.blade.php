@extends('layouts.app')

@section('content')

<div class="container">



  <h1>Editar Serviço - {{$servico->nome}} </h1>
  <p class="lead">Edite este servico abaixo</p>
  <hr>

  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Editar serviço</div>
              <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('servicos.update',$servico) }}">
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" required autofocus>
                            </div>
                        </div>

                      <div class="form-group">
                          <label for="valor" class="col-md-4 control-label">Preço</label>

                          <div class="col-md-6">
                              <input id="valor" type="number" step="any" name="valor" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Editar Serviço
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
