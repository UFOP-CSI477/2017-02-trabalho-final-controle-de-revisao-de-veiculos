@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Veículo</h1>
    <p class="lead">Insira um novo veiculo</p>
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo Veículo</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('veiculos.store') }}">
                    <!--Obrigatorio em todo formlario-->
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <div class="form-group">
                            <label for="placa" class="col-md-4 control-label">Placa</label>

                            <div class="col-md-6">
                                <input id="placa" type="text" class="form-control" name="placa" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cor" class="col-md-4 control-label">Cor</label>

                            <div class="col-md-6">
                                <input id="cor" type="text"  name="cor" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="modelo" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text"  name="modelo" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Criar Veiculo
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
