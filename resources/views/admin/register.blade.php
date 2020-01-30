@extends('layouts.estilorecicla')

@section('content')
<h1>Cadastro</h1>

@if($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{$error}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endforeach
@endif
<form method="POST">
    @csrf

    <div class="form-group">
        <label for="nome"><strong>Nome:</strong></label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Digite um nome" value="{{old('name')}}">
    </div>

    <div class="form-group">
      <label for="email"><strong>Email:</strong></label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Digite um e-mail" value="{{old('email')}}">
    </div>

    <div class="form-group">
        <label for="lat"><strong>Senha:</strong></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Digite uma senha"><br>
    </div>

    <div class="form-group">
        <label for="lat"><strong>Confirme sua Senha:</strong></label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Digite novamente a senha">
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
@endsection