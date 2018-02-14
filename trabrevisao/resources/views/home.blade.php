@extends('layouts.app')

@section('content')


<div class="container">
    @if(auth()->user()->type==2)

        <div id="flex-box">
            <div>
              <h1>Acesso Restrito</h1>
            </div>

            <div id="flex-item">
              <a href="{{ route('veiculos.index') }}" >Visualizar Veículos</a>
              <a href="{{ route('vistorias.index') }}" >Visualizar Revisões</a>
              <a href="{{ route('servicos.index') }}" >Visualizar Serviços</a>
            </div>
        </div>
    @else


    <a href="{{ route('veiculos.create') }}" class="btn btn-primary" >Cadastrar Veículo</a>
    <a href="{{ route('vistorias.index') }}" class="btn btn-primary"  >Visualizar Revisões</a>
    <a href="{{ route('formularios.create') }}" class="btn btn-primary" >Solicitar Revisão</a>
    <br><br>
    <div class="panel panel-default">

 <div class="panel-body">

    <div class="col-lg-4">
          <img class="img-circle" src="../images/pecas.jpg" alt="Generic placeholder image" width="296" height="170">
          <h2>Peças Originais</h2>
          <p>Nós da Oficina OnLine trabalhamos apenas com peças originais dando total garantia a problemas apresentados.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../images/treinados.jpg" alt="Generic placeholder image" width="281" height="180">
          <h2>Mecânicos Treinados</h2>
          <p>Todos os nossos funcionários possuem certificações das marcas mais renomadas, para garantir a qualidade do serviço técnico.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="../images/agile.jpg" alt="Generic placeholder image" width="224" height="225">
          <h2>Agilidade</h2>
          <p>Nosso serviço é realizado de forma rápida e com qualidade, ideal para as pessoas que não podem abrir mão de seu veículo.</p>
        </div><!-- /.col-lg-4 -->

    </div>
  </div>
    @endif

</div>
@endsection
