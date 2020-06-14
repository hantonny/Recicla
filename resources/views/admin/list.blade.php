@extends('layouts.estiloadm')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
    @if(count($list)> 0)
        <h1 class="text-center mb-3"><strong>Listagem de Locais</strong></h1>
            @foreach ($list as $item)
            <div class="card-list">
            <div class="card">
              <div class="card-header">
                <p class="p-titulo text-center">{{$item->nome}}</p>
                </h2>
              </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-12">
                        <p class="p-list text-center"><strong>Endereço:</strong> {{$item->endereco}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="p-list text-center"><strong>Latitude:</strong> {{$item->lat}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="p-list text-center"><strong>Longitude:</strong> {{$item->lng}}</p>
                    </div>
                    <div class="col-sm-12">
                        <p class="p-list text-center"><strong>Horário de Funcionamento:</strong> <?php echo date("H:i",strtotime($item->horario_aberto));?> às <?php echo date("H:i",strtotime($item->horario_fechado));?></p>
                    </div>
                    <div class="col-sm-12">
                        <p class="p-list text-center"><strong>Dias de Funcionamento:</strong></p>
                        <p class="p-list text-center">{{$item->dias}}</p>
                    </div>
                    <div class="col-sm-12">
                        <div class="row d-flex justify-content-center">
                        <p><a href="{{route('local.edit', ['id'=>$item->id])}}" type="button" class="ml-lg-3 mr-lg-4"><img src="../img/editar.svg" alt="" width="34"></a></p>
                        <p><a href="{{route('local.del', ['id'=>$item->id])}}" type="button" class=""
                            onclick="return confirm('Tem certeza que deseja excluir?')"><img src="../img/lixo.svg" alt="" width="34"></a></p>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
      @else
          <h2 class="text-center">Não há locais cadastrados a serem listados</h2>
      @endif
@endsection
