@extends('layouts.estiloadm')

@section('content')
@if(session('warning'))
    <div class="alert alert-danger alert-dismissible fade show text-center card_style" role="alert">
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
          <input type="text"  class="form-control" id="lat" name="lat" value="{{$data->lat}}">
      </div>
      <div class="form-group col-6">
          <label for="lng"><strong>Longitude:</strong></label>
          <input type="text"  class="form-control" id="lng" name="lng" value="{{$data->lng}}">
      </div>
      <div class="form-group col-6">
        <label for="horario_aberto"><small><strong>Horário que Abre:</strong></small></label>
        <input type="time" min="07:00" max="20:00" required class="form-control" id="horario_aberto" name="horario_aberto" value="{{$data->horario_aberto}}">
      </div>
      <div class="form-group col-6">
        <label for="horario_fechado"><small><strong>Horário que Fecha:</strong></small></label>
        <input type="time" min="07:00" max="20:00" required class="form-control" id="horario_fechado" name="horario_fechado" value="{{$data->horario_fechado}}">
      </div>
      <div class="col-12 local-item m-0">
        <label for="endereco"><strong>Endereço:</strong></label>
        <input id="endereco" type="text"
        placeholder="Digite o seu endereço"
        class="form-control" name="endereco" value="{{$data->endereco}}"><br>
      </div>
      <div class="form-group col-12 text-center">
        <p class="m-0"><strong>Dias de Funcionamento:</strong></p>
    </div>
    <div class="form-group col-12 text-center">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="dom" value="Dom" name="dom">
            <label class="form-check-label" for="dom">Dom</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="seg" value="Seg" name="seg">
            <label class="form-check-label" for="seg">Seg</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="ter" value="Ter" name="ter">
            <label class="form-check-label" for="ter">Ter</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="qua" value="Qua" name="qua">
            <label class="form-check-label" for="qua">Qua</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="qui" value="Qui" name="qui">
            <label class="form-check-label" for="qui">Qui</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="sex" value="Sex" name="sex">
            <label class="form-check-label" for="sex">Sex</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="sab" value="Sab" name="sab">
            <label class="form-check-label" for="sab">Sab</label>
        </div>
    </div>
  <a class="btn btn-secondary col-4 mx-auto" href="{{route('local.list')}}">Voltar</a>
  <button type="submit" class="btn btn-primary col-4 mx-auto">Salvar</button>
</div>
</form>
</div>
</div>
@endsection
