@extends('layouts.estilorecicla')

@section('content')
<div class="container-fluid" id="local">
<div class="card local">
  <div class="card-header">
      <h4 class="text-center"><strong>LOCALIZADOR</strong></h4>
  </div>
  <div class="card-body">
    <form action="" method="post" class="form-group">
    <div class="row">
      <div class="col-sm-2 d-flex justify-content-center">
        <a href="#localiza" class="btn btn-success form-control" id="show-listings"><strong>MOSTRAR</strong></a>
      </div>
      <br>
      <br>
      <div class="col-sm-2 d-flex justify-content-center">
        <a href="#localiza" class="btn btn-success form-control" id="hide-listings"><strong>OCULTAR</strong></a>
      </div>
  <div class="col-sm-4 local-item">
    <input id="search-within-time-text" type="text"
    placeholder="Digite o seu endereço"
    class="form-control"><br>
  </div>

    <div class="col-sm-2">
        <select id="mode" class="form-control">
          <option value="DRIVING">Carro</option>
          <option value="WALKING">A pé</option>
          <option value="BICYCLING">De Bicicleta</option>
          <option value="TRANSIT">Transporte público</option>
        </select>
      </div>
<br><br><br>
    <div class="col-sm-2">
      <a class="btn btn-success form-control" id="search-within-time" href="#map"><strong>BUSCAR</strong></a>
    </div>
</div>
    <br>
    <div id="map"></div>
</form>

</div>
</div>

</div>


<script>
    //Locais marcados no mapa
        var locations = [
        <?php

          foreach($locais as $item){?>

          {title: '<?php echo $item["nome"];?>', text:'<?php echo date("H:i",strtotime($item["horario_aberto"]))." às ".date("H:i",strtotime($item["horario_fechado"]));?>', location: {lat: <?php echo $item["lat"];?>,
          lng:  <?php echo $item["lng"];?>}},

        <?php
          }
        ?>
        ];
</script>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry,drawing&key=AIzaSyAAApZxIhZ9wBM2wLKlwNGHxUFvqWx5-_0&callback=initMap"
    async defer></script>
@endsection
