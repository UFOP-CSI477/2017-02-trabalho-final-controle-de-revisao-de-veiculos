@extends('layouts.app')

@section('content')

<div class="container">

      <h1>Veículos</h1>
      @if(auth()->user()->type==1)
      <a href="{{ route('veiculos.create') }}" class="btn btn-primary" >Novo Veículo</a>
      @endif

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Placa</th>
          <th>Cor</th>
          <th>Modelo</th>
        </tr>
      </thead>

<tbody>


     @foreach ($veiculos as $p)
       <tr >
        <td>{{$p->placa}}</td>
        <td>{{$p->cor}}</td>
        <td>{{$p->modelo}}</td>

         <td><a href="{{ route('veiculos.edit', $p)  }}" class="btn btn-default" >Editar Veículo</a></td>


       </tr>
      @endforeach
      </tbody>
      </table>

</div>



@endsection
