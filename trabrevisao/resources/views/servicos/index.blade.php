@extends('layouts.app')

@section('content')

<div class="container">

      <h1>Serviços</h1>
      <a href="{{ route('servicos.create') }}" class="btn btn-primary" >Criar Serviços</a>

    <table class="table table-hover">

      <thead>
        <tr>
          <th>Nome</th>
          <th>Preço<th>
        </tr>
      </thead>
      <tbody>

     @foreach ($servicos as $p)
       <tr >
        <td>{{$p->nome}}</td>
        <td>{{$p->valor}}</td>
        <td><a href="{{ route('servicos.edit', $p) }}" class="btn btn-default" >Editar Serviço</a></td>
        <td>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('servicos.destroy', $p) }}">
          <input name="_method" type="hidden" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <button type="submit" class="btn btn-default"> DELETAR SERVIÇO</button>
      </form>
      </td>

       </tr>
      @endforeach
      </tbody>
      </table>

</div>



@endsection
