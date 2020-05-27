@extends('layouts.estilorecicla')

@section('content')
<div class="container-fluid">
  <div>
    <div>
      <h1 class="titulo-home">Lixo Eletrônico temos que reciclar!</h1>
    </div>
    <div></div>
      <div class="row">
        <div class="col-sm-12">
            <h4 class="sub-titulo-home">Lixo Eletrônico é todo resíduo material produzido pelo descarte de equipamentos eletrônicos.</h4>
            <p class="p_home">Cerca de 40 milhões de toneladas de lixo eletrônico são gerados por ano no mundo.</p>
            <p class="p_home">Entre os países emergentes, o Brasil é o país que mais gera lixo eletrônico.</p>
            <p class="p_home">A cada ano, o Brasil descarta: cerca de 97 mil toneladas métricas de computadores.</p>
            <a href="{{route('localiza')}}" class="btn bg-success text-white botao_home" type="submit"><strong>LOCALIZAR POSTO DE COLETA</strong></a>
        </div>
        <div class="col-sm-3">
          <img src="http://rbmanalises.com.br/wp-content/uploads/2017/04/Lixo-Eletr%C3%B4nico-01.png" alt="" class='img-fluid'>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
