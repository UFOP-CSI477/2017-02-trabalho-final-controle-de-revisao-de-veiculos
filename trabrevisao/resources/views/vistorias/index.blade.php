@extends('layouts.app')

@section('content')

<div class="container">

      <h1>Revisões</h1>
      @if(auth()->user()->type==2)
        <a href="{{ route('vistorias.create') }}" class="btn btn-primary" >Registrar nova revisão</a>
      @endif

      @if( empty ($vistorias))
      <p> Você ainda não realizou nenhuma revisão</p>
      @else
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Placa</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Quilometragem</th>
            <th>Previsao</th>
          </tr>
        </thead>
        <?php $i=0 ?>
        <tbody>
        @foreach ($vistorias as $p)
        <tr>
        <td>{{$p->veiculo()->first()->placa}}</td>
        <td>{{$p->data}}</td>
        <td>{{$p->hora}}</td>
        <td>{{$p->quilometragem}}</td>
        <td>{{$previsoes[$i]}}</td>
        <?php $i++; ?>
        @if(auth()->user()->type==2)
        <td><a href="{{ route('vistorias.edit', $p) }}" class="btn btn-default" >Editar Revisão</a></td>
        <td>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('vistorias.destroy', $p) }}">
          <input name="_method" type="hidden" value="DELETE">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <button type="submit" class="btn btn-default">DELETAR REVISÃO</button>

        </form>
      </td>
        @endif

        </tr>
        @endforeach
        </tbody>

    @endif
    </table>


</div>

@endsection
