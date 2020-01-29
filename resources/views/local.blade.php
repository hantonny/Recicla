@extends('layouts.estilorecicla')

@section('content')
        <div class="div-localiza">
        <h1 class="titulo-localiza">LOCALIZADOR</h1>
        <div>
          <button class="botao-funcao" id="show-listings"><a class="menu-botao text-decoration-none" href="#map">MOSTRAR</a></button>
          <button class="botao-funcao" id="hide-listings"><a class="menu-botao text-decoration-none" href="#map">OCULTAR</a></button>
        </div>

        <div class="busca">
        <input class="search" id="search-within-time-text" type="text" placeholder="Ex: Rua Luis Roberto Salinas Fortes, nº 17"><br>
        </div>
       
        <div class="busca">
            <select id="mode" class="busca-seleciona">
              <option value="DRIVING">Carro</option>
              <option value="WALKING">A pé</option>
              <option value="BICYCLING">De Bicicleta</option>
              <option value="TRANSIT">Transporte público</option>
            </select>
          </div>

        <div class="busca">
          <button class="botao-funcao-busca" id="search-within-time"><a class="menu-botao text-decoration-none" href="#map">BUSCAR</a></button>
        </div>
        
        <div id="map"></div>

        </div>
        
        
<script>
    //Locais marcados no mapa
        var locations = [
        <?php

          foreach($locais as $item){?>
          
          {title: '<?php echo $item["nome"];?>', location: {lat: <?php echo $item["lat"];?>, 
          lng:  <?php echo $item["lng"];?>}},
          
        <?php
          }
        ?>
        ];
</script>

    <script src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry,drawing&key=AIzaSyAAApZxIhZ9wBM2wLKlwNGHxUFvqWx5-_0&callback=initMap"
    async defer></script>
@endsection
