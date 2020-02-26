@extends('layouts.estilorecicla')

@section('content')

@if(session('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
<div class="card border-success">
  <div class="card-header text-white bg-success">
    <h4><strong>Login</strong></h4>
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
          <label class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
          <button type="submit" class="btn btn-primary"><strong>Entrar</strong></button>
          </div>
        </div>
      
    </form>
  </div>
</div>
@endsection