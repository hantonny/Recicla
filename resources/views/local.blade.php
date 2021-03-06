@extends('layouts.estilorecicla')

@section('content')
<div class="container-fluid" id="local">
    <form action="" method="post" class="form-group">
    <div class="row">
      <div class="col-sm-2 d-flex justify-content-center">
        <a href="#localiza" class="btn btn-success form-control" id="show-listings"><strong>MOSTRAR</strong></a>
      </div>
      <div class="col-sm-2 d-flex justify-content-center">
        <a href="#localiza" class="btn btn-success form-control" type="button" value="LIMPAR" onClick="history.go(0)" id="hide-listings"><strong>LIMPAR</strong></a>
      </div>
  <div class="col-sm-4 local-item">
    <input id="search-within-time-text" type="text"
    placeholder="Digite o seu endereço"
    class="form-control">
  </div>
    <div class="col-sm-2">
        <select id="mode" class="form-control">
          <option value="DRIVING">Carro</option>
          <option value="WALKING">A pé</option>
          <option value="BICYCLING">De Bicicleta</option>
          <option value="TRANSIT">Transporte público</option>
        </select>
      </div>
    <div class="col-sm-2">
      <a class="btn btn-success form-control" id="search-within-time" href="#map"><strong>BUSCAR</strong></a>
    </div>
</div>
    <div id="map"></div>
</form>
</div>
</div>
</div>
<script>
    //Locais marcados no mapa
        var locations = [
        <?php

          foreach($locais as $item){

          ?>

          {title: '<?php echo $item["nome"];?>',
          text: '<h5>Horário de Funcionamento</h5>'+
          '<h6><?php echo date("H:i",strtotime($item["horario_aberto"]));?> às '+
            '<?php echo date("H:i",strtotime($item["horario_fechado"]));?></h6>'+
            '<hr><h5>Dias de Funcionamento</h5><h6><?php echo $item["dias"];?></h6>'+
            '<hr><h5>Endereço</h5><h6><?php echo $item["endereco"];?></h6>',
          location: {lat: <?php echo $item["lat"];?>,
          lng:  <?php echo $item["lng"];?>}},
        <?php
          }
        ?>
        ];
</script>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-center text-success" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="corpo">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>
@endsection
