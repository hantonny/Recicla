@extends('layouts.estilorecicla')

@section('content')

@if(session('warning'))
    <div class="alert alert-danger alert-dismissible fade show text-center card_style" role="alert">
            <strong>{{session('warning')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
@if($errors->any())
            @foreach($errors->all() as $error)
            @endforeach
@endif
<div class="row">
<div class="col-sm-3">
    <img src="../img/login.svg" class="image-login">
</div>
<div class="col-sm-9">
<div class="card card_style card-login">
  <div class="card-header">
    <h4 class="text-center"><strong>Login</strong></h4>
  </div>
  <div class="card-body bg-light">
    <form method="POST">
      @csrf
      <div class="form-group row">
        <label for="email" class="col-form-label col-sm-2"><strong>Email:</strong></label>
        <div class="col-sm-10">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
         placeholder="Digite um e-mail" value="{{old('email')}}">
        </div>
      </div>
      <div class="form-group row">
          <label for="lat" class="col-form-label col-sm-2"><strong>Senha:</strong></label>
          <div class="col-sm-10">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Digite uma senha"><br>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12 d-flex justify-content-center align-items-center">
          <button type="submit" class="btn btn-success"><strong>ENTRAR</strong></button>
          </div>
        </div>

    </form>
  </div>
</div>
</div>
</div>
@endsection
