@extends('layouts.estiloadm')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif

    @if(count($list)> 0)
    <div class="card border-success">
      <div class="card-header text-white bg-success">
        <h4><strong>Listagem de Locais</strong></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-light">
            <tr class="text-center">
              <th scope="col">Nome</th>
              <th scope="col">Latitude</th>
              <th scope="col">Longitude </th>
              <th scope="col" colspan=3>Horário de Funcionamento</th>
              <th scope="col" colspan=2 class="text-center table-bordered">Ação</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($list as $item)
            <tr>
              <td>{{$item->nome}}</td>
              <td class="text-center">{{$item->lat}}</td>
              <td class="text-center">{{$item->lng}}</td>
              
              <td class="text-center"><?php echo date("H:i",strtotime($item->horario_aberto));?></td>
              <td class="text-center">às</td>
              <td class="text-center"><?php echo date("H:i",strtotime($item->horario_fechado));?></td>
              <td class="text-center table-bordered"><a href="{{route('local.edit', ['id'=>$item->id])}}" type="button" class="btn btn-primary">Editar</a></td>
              <td class="text-center table-bordered"><a href="{{route('local.del', ['id'=>$item->id])}}" type="button" class="btn btn-danger" 
                onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <ul class="pagination justify-content-center">{{$list->links()}}</ul>
        
      </div>
      @else
          <p>Não há itens a serem listados</p>
      @endif
      </div>
    </div> 
    
    
@endsection