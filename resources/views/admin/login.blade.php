@extends('layouts.estilorecicla')

@section('content')
<h1>Login</h1>

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
      <label for="email"><strong>Email:</strong></label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Digite um e-mail" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="lat"><strong>Senha:</strong></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Digite uma senha"><br>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
  </form>
@endsection