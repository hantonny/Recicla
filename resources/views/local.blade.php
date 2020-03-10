@extends('layouts.estilorecicla')

@section('content')
<div class="container-fluid">
<div class="card border-success">
  <div class="card-header text-white bg-success">
      <h4><strong>LOCALIZADOR</strong></h4>
  </div>
  <div class="card-body">
    <form action="" method="post" class="form-group row">
      <div class="col-sm-6 d-flex justify-content-center">
        <a href="#map" class="btn btn-success form-control" id="show-listings"><strong>MOSTRAR</strong></a>
      </div>
      <br>
      <br>
      <div class="col-sm-6 d-flex justify-content-center">
        <a href="#map" class="btn btn-success form-control" id="hide-listings"><strong>OCULTAR</strong></a>
      </div>
    </form>
<form action="" method="post" class="form-group row">
  <div class="col-sm-12">
    <input id="search-within-time-text" type="text" 
    placeholder="Ex: Rua Luis Roberto Salinas Fortes, nº 17"
    class="form-control"><br>
  </div>
  
    <div class="col-sm-8">
        <select id="mode" class="form-control">
          <option value="DRIVING">Carro</option>
          <option value="WALKING">A pé</option>
          <option value="BICYCLING">De Bicicleta</option>
          <option value="TRANSIT">Transporte público</option>
        </select>
      </div>
<br><br><br>
    <div class="col-sm-4">
      <a class="btn btn-success form-control" id="search-within-time" href="#map"><strong>BUSCAR</strong></a>
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
