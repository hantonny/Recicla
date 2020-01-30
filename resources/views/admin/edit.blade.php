@extends('layouts.estiloadm')

@section('content')
<h1>Editar</h1>
@if(session('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('warning')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
<form method="POST">
    @csrf
    <div class="form-group">
      <label for="nome"><strong>Nome</strong></label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$data->nome}}">
    </div>
    <div class="form-group">
        <label for="lat"><strong>Latitude</strong></label>
        <input type="text" class="form-control" id="lat" name="lat" value="{{$data->lat}}">
    </div>
    <div class="form-group">
        <label for="lng"><strong>Longitude</strong></label>
        <input type="text" class="form-control" id="lng" name="lng" value="{{$data->lng}}">
    </div>
    <a class="btn btn-secondary" href="{{route('local.list')}}">Voltar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>

@endsection