@extends('layouts.estiloadm')

@section('content')
@if(session('warning'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>{{session('warning')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
<div class="card card_style card-edit">
  <div class="card-header">
    <h4 class="text-center"><strong>Editar</strong></h4>
  </div>
  <div class="card-body bg-light">
    <form method="POST">
      @csrf
      <div class="row">
      <div class="form-group col-12">
        <label for="nome"><strong>Nome:</strong></label>
      <input type="text" class="form-control" id="nome" name="nome" value="{{$data->nome}}">
      </div>
      <div class="form-group col-6">
          <label for="lat"><strong>Latitude:</strong></label>
          <input type="text" class="form-control" id="lat" name="lat" value="{{$data->lat}}">
      </div>
      <div class="form-group col-6">
          <label for="lng"><strong>Longitude:</strong></label>
          <input type="text" class="form-control" id="lng" name="lng" value="{{$data->lng}}">
      </div>
      <div class="form-group col-6">
        <label for="lng"><small><strong>Horário que Abre:</strong></small></label>
        <input type="time" min="07:00" max="20:00" required class="form-control" id="horario_aberto" name="horario_aberto" value="{{$data->horario_aberto}}">
      </div>
      <div class="form-group col-6">
        <label for="lng"><small><strong>Horário que Fecha:</strong></small></label>
        <input type="time" min="07:00" max="20:00" required class="form-control" id="horario_fechado" name="horario_fechado" value="{{$data->horario_fechado}}">
      </div>
      <div class="col-12 local-item m-0">
        <label for="endereco"><strong>Endereço:</strong></label>
        <input id="endereco" type="text"
        placeholder="Digite o seu endereço"
        class="form-control" name="endereco" value="{{$data->endereco}}"><br>
      </div>
      <div class="form-group col-12 text-center">
        <p class="m-0"><strong>Dias de Funcionamento</strong></p>
    </div>
    <div class="form-group col-12 text-center">
    <p>Final de Semana:</p>
  <input type="checkbox" name="dom" value="Dom"> <span class="m-lg-1">Dom</span>
  <input type="checkbox" name="sab" value="Sab"> <span class="m-lg-1">Sab</span>
    </div>
    <div class="form-group col-12 text-center">
    <p>Durante a semana:</p>
  <input type="checkbox" name="seg" value="Seg"> <span class="m-lg-1">Seg</span>
  <input type="checkbox" name="ter" value="Ter"> <span class="m-lg-1">Ter</span>
  <input type="checkbox" name="qua" value="Qua"> <span class="m-lg-1">Qua</span>
  <input type="checkbox" name="qui" value="Qui"> <span class="m-lg-1">Qui</span>
  <input type="checkbox" name="sex" value="Sex"> <span class="m-lg-1">Sex</span>
    </div>
      <a class="btn btn-secondary col-4 mx-auto" href="{{route('local.list')}}">Voltar</a>
      <button type="submit" class="btn btn-primary col-4 mx-auto">Salvar</button>
    </div>
    </form>
  </div>
</div>
@endsection
