@extends('layouts.estiloadm')

@section('content')
<h1>Listagem de Locais</h1>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif

    @if(count($list)> 0)
    <table class="table table-bordered table-sm">
        <thead class="thead-light">
          <tr class="text-center">
            <th scope="col">Nome</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude </th>
            <th scope="col" colspan=2 class="text-center table-bordered">Ação</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
          <tr>
            <td>{{$item->nome}}</td>
            <td class="text-center">{{$item->lat}}</td>
            <td class="text-center">{{$item->lng}}</td>
            <td class="text-center table-bordered"><a href="{{route('local.edit', ['id'=>$item->id])}}" type="button" class="btn btn-primary">Editar</a></td>
            <td class="text-center table-bordered"><a href="{{route('local.del', ['id'=>$item->id])}}" type="button" class="btn btn-danger" 
              onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
        <p>Não há itens a serem listados</p>
    @endif
    
@endsection