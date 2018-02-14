@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Serviço</h1>
    <p class="lead">Criar novo serviço abaixo</p>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Criar serviço</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('servicos.store') }}">
                    <!--Obrigatorio em todo formlario-->
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
                                    Criar Serviço
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
