@extends('layouts.estilorecicla')

@section('content')
<div class="container-fluid">
  <div class="card border-success">
    <div class="card-header text-white bg-success">
      <h1><strong>Lixo Eletrônico temos que reciclar!</strong></h1>
    </div>
    <div class="card-body bg-light">
      <div class="row">
        <div class="col-sm-9">
              <h4>Lixo Eletrônico é todo resíduo material produzido pelo descarte de equipamentos eletrônicos.</h4>
              <ul>
                <li><p class="p_home">Cerca de 40 milhões de toneladas de lixo eletrônico são gerados por ano no mundo.</p></li>
                <li><p class="p_home">Entre os países emergentes, o Brasil é o país que mais gera lixo eletrônico.</p></li>
                <li><p class="p_home">A cada ano, o Brasil descarta: cerca de 97 mil toneladas métricas de computadores.</p></li>
              </ul>
              <a href="{{route('localiza')}}"><button class="btn btn-primary" type="submit"><strong>LOCALIZAR POSTO DE COLETA</strong></button></a>
        </div>
        <div class="col-sm-3">
          <img src="http://rbmanalises.com.br/wp-content/uploads/2017/04/Lixo-Eletr%C3%B4nico-01.png" alt="" class='img-fluid'>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection