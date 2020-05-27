@extends('layouts.estiloadm')

@section('content')
@if(session('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('warning')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
<div class="card card_style card-edit">
  <div class="card-header">
    <h4><strong>Editar</strong></h4>
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
        <label for="lng"><strong>Horário que Abre:</strong></label>
        <input type="time" min="07:00" max="20:00" required class="form-control" id="horario_aberto" name="horario_aberto" value="{{$data->horario_aberto}}">
      </div>
      <div class="form-group col-6">
        <label for="lng"><strong>Horário que Fecha:</strong></label>
        <input type="time" min="07:00" max="20:00" required class="form-control" id="horario_fechado" name="horario_fechado" value="{{$data->horario_fechado}}">
      </div>
      <a class="btn btn-secondary col-4 mx-auto" href="{{route('local.list')}}">Voltar</a>
      <button type="submit" class="btn btn-primary col-4 mx-auto">Salvar</button>
    </div>
    </form>
  </div>
</div>
@endsection
