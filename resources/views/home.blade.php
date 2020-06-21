@extends('layouts.estilorecicla')

@section('content')
<div class="container-fluid">
  <div>
    <div></div>
      <div class="row">
        <div class="col-sm-5">
            <h1 class="titulo-home">Temos que reciclar!</h1>
            <h4 class="sub-titulo-home">O Lixo Eletrônico é todo resíduo material produzido pelo descarte de equipamentos eletrônicos.</h4>
            <p class="p_home">Cerca de 40 milhões de toneladas de lixo eletrônico são gerados por ano no mundo.</p>
            <p class="p_home">Entre os países emergentes, o Brasil é o país que mais gera lixo eletrônico.</p>
            <p class="p_home">A cada ano, o Brasil descarta: cerca de 97 mil toneladas métricas de computadores.</p>
            <p class="p_fonte">Fonte: <a href="https://nacoesunidas.org/mundo-produzira-120-milhoes-de-toneladas-de-lixo-eletronico-por-ano-ate-2050-diz-relatorio/" target="_blank">ONU Brasil</a></p>
            <a href="{{route('localiza')}}" class="btn bg-success text-white botao_home" type="submit"><strong>LOCALIZAR POSTO DE COLETA</strong></a>
        </div>
        <div class="col-sm-7">
          <img src="../img/home.svg" alt="" class='img-fluid'>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
