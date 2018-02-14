@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Solicitar Revisão</h1>
    <p class="lead">Solicitar nova revisão abaixo</a></p>
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Solicitar revisão</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('formularios.store') }}">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <div class="form-group">
                          <label for="data" class="col-md-4 control-label">Data</label>
                          <div class="col-md-6">
                              <input id="data" type="date" class="form-control" name="data" required autofocus>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="hora" class="col-md-4 control-label">Hora</label>
                          <div class="col-md-6">
                              <input id="hora" type="time" class="form-control" name="hora" required autofocus>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="quilometragem" class="col-md-4 control-label">Quilometragem</label>
                          <div class="col-md-6">
                              <input id="quilometragem" type="number" class="form-control" min=0 step="any" name="quilometragem" required autofocus>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="servico" class="col-md-4 control-label">Serviço</label>
                        <div class="col-md-6">
                          <select class="form-control" name="servico" id="servico" required>
                            @foreach($servicos as $s)
                            <option value="{{$s->nome}}"> {{$s->nome}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="veiculo" class="col-md-4 control-label">Veículo</label>
                        <div class="col-md-6">
                          <select class="form-control" type="text" name="veiculo" id="veiculo" required>
                            @foreach($veiculos as $v)
                            <option value="{{$v->placa}}"> {{$v->placa}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Solicitar Revisão
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
