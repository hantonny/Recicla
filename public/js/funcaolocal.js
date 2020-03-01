var map;
      // Crie uma nova matriz em branco para todos os marcadores de listagem.
      var markers = [];
      // Essa variável de polígono global é para garantir que apenas UM polígono seja renderizado.
      var polygon = null;
      // Crie uma matriz de marcadores de lugar para usar em várias funções para ter controle
      // sobre o número de lugares exibidos.
      var placeMarkers = [];
      function initMap() {
        // Crie uma matriz de estilos para usar com o mapa.
        var styles = [
          {
            featureType: 'water',
            stylers: [
              { color: '#19a0d8' }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.stroke',
            stylers: [
              { color: '#ffffff' },
              { weight: 6 }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.fill',
            stylers: [
              { color: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -40 }
            ]
          },{
            featureType: 'transit.station',
            stylers: [
              { weight: 9 },
              { hue: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'labels.icon',
            stylers: [
              { visibility: 'off' }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [
              { lightness: 100 }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [
              { lightness: -100 }
            ]
          },{
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [
              { visibility: 'on' },
              { color: '#f0e4d3' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.fill',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -25 }
            ]
          }
        ];
        // O Constructor cria um novo mapa - somente o centro e o zoom são necessários.
        var mapOptions = {
          center: {lat:  -20.470108, lng: -54.614947},
          zoom: 11,
          styles: styles,
          mapTypeControl: false
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
        // Esse preenchimento automático é para ser usado na caixa de entrada de pesquisa dentro do prazo.
        var timeAutocomplete = new google.maps.places.Autocomplete(
            document.getElementById('search-within-time-text'));
        // Esse preenchimento automático é para uso na caixa de entrada do geocodificador.
        var zoomAutocomplete = new google.maps.places.Autocomplete(
            document.getElementById('zoom-to-area-text'));
        // Desvie os limites dentro do mapa para ampliar o texto da área.
        zoomAutocomplete.bindTo('bounds', map);
        // Crie uma caixa de pesquisa para executar uma pesquisa de locais
        var searchBox = new google.maps.places.SearchBox(
            document.getElementById('places-search'));
        // Polarize a caixa de pesquisa para dentro dos limites do mapa.
        searchBox.setBounds(map.getBounds());
        // Estas são as listagens de imóveis que serão mostradas ao usuário.
        // Normalmente nós os teríamos em um banco de dados.

       
        
        var largeInfowindow = new google.maps.InfoWindow();
            //Desenhar no mapa 
            var drawingManager = new google.maps.drawing.DrawingManager({
              drawingMode: google.maps.drawing.OverlayType.POLYGON,
              drawingControl: true,
              drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_LEFT,
                drawingModes: [
                  google.maps.drawing.OverlayType.POLYGON
                ]
              }
            });
        // Estilize os marcadores um pouco. Este será o nosso ícone de marcador de listagem.
        var defaultIcon = makeMarkerIcon('008000');
        // Crie uma cor de marcador "local destacado" para quando o usuário
        // mouses sobre o marcador. 
        var highlightedIcon = makeMarkerIcon('00FF7F');
        // O grupo a seguir usa a matriz de localização para criar uma matriz de marcadores na inicialização.
        for(var i = 0; i < locations.length; i++){
                var position = locations[i].location;
                var title = locations[i].title;

                var marker = new google.maps.Marker({
                    position: position,
                    title: title,
                    icon: defaultIcon,
                    animation: google.maps.Animation.DROP,
                    id: i
                });
                markers.push(marker);
                marker.addListener('click', function(){
                    populateInfoWindow(this, largeInfowindow);
                });
                marker.addListener('mouseover', function(){
                    this.setIcon(highlightedIcon);
                });
                marker.addListener('mouseout', function(){
                    this.setIcon(defaultIcon);
                });
            }
           
            //Mostra e esconde os marcadores
            document.getElementById('show-listings').addEventListener('click', showListings);
            document.getElementById('hide-listings').addEventListener('click', function() {
          hideMarkers(markers);
        });
        //Pesquisa distancia e duração
        document.getElementById('search-within-time').addEventListener('click', function() {
          searchWithinTime();
        });
        
        // Ouça o evento disparado quando o usuário seleciona uma previsão no
        // lista de opções e recupere mais detalhes para esse local.
        searchBox.addListener('places_changed', function() {
          searchBoxPlaces(this);
        });
      }

      function populateInfoWindow(marker, infowindow) {
        // Verifique se a janela de entrada ainda não está aberta neste marcador.
        if (infowindow.marker != marker) {
          // Limpe o conteúdo da janela de entrada para dar tempo ao streetview de carregar.
          infowindow.setContent('');
          infowindow.marker = marker;
          // Verifique se a propriedade do marcador está limpa se a janela de entrada estiver fechada.
          infowindow.addListener('closeclick', function() {
            infowindow.marker = null;
          });
          infowindow.setContent('<div id="pano"><h3>' + marker.title + '</h3></div>');
          infowindow.open(map, marker);
        }
      }
      //Esta função percorrerá a matriz de marcadores e exibirá todos eles.
      function showListings() {
        var bounds = new google.maps.LatLngBounds();
        //Estenda os limites do mapa para cada marcador e exiba o marcador
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
          bounds.extend(markers[i].position);
        }
        map.fitBounds(bounds);
      }
      // Esta função percorrerá as listagens e ocultará todas elas.
      function hideMarkers(markers) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
      }
      // Essa função recebe uma COLOR e cria um novo marcador
      // ícone dessa cor. O ícone terá 21 px de largura por 34 de altura, tem uma origem
      // de 0, 0 e ser ancorado em 10, 34).
      function makeMarkerIcon(markerColor) {
        var markerImage = new google.maps.MarkerImage(
          'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|'+ markerColor +
          '|40|_|%E2%80%A2',
          new google.maps.Size(21, 34),
          new google.maps.Point(0, 0),
          new google.maps.Point(10, 34),
          new google.maps.Size(21,34));
        return markerImage;
      }
      // Esta função permite ao usuário inserir o tempo de viagem desejado, em
      // minutos, modo de viagem e local - e mostra apenas as listagens
      // que estão dentro desse tempo de viagem (através desse modo de viagem) do local
      function searchWithinTime() {
       // Inicialize o serviço da matriz de distância.
        var distanceMatrixService = new google.maps.DistanceMatrixService;
        var address = document.getElementById('search-within-time-text').value;
        // Verifique se o local digitado não está em branco.
        if (address == '') {
          window.alert('Você deve inserir um endereço. ');
        } else {
          hideMarkers(markers);
        // Use o serviço de matriz de distância para calcular a duração do
          // rotas entre todos os nossos marcadores e o endereço de destino digitado
          // pelo usuário. Em seguida, coloque todas as origens em uma matriz de origem.
          var origins = [];
          for (var i = 0; i < markers.length; i++) {
            origins[i] = markers[i].position;
          }
          var destination = address;
          var mode = document.getElementById('mode').value;
          // Agora que as origens e o destino estão definidos, obtenha todas as
          // informação para as distâncias entre eles.
          distanceMatrixService.getDistanceMatrix({
            origins: origins,
            destinations: [destination],
            travelMode: google.maps.TravelMode[mode],
            unitSystem: google.maps.UnitSystem.METRIC,
          }, function(response, status) {
            if (status !== google.maps.DistanceMatrixStatus.OK) {
              window.alert('Error was: ' + status);
            } else {
              displayMarkersWithinTime(response);
            }
          });
        }
      }
        // Esta função percorre cada um dos resultados e,
        // se a distância for MENOR que o valor no selecionador, mostre-a no mapa.
      function displayMarkersWithinTime(response) {
        var origins = response.originAddresses;
        var destinations = response.destinationAddresses;
        // Analise os resultados e obtenha a distância e a duração de cada uma.
        // Como pode haver várias origens e destinos, temos um loop aninhado
        // Então, verifique se pelo menos 1 resultado foi encontrado.
        var atLeastOne = false;
        for (var i = 0; i < origins.length; i++) {
          var results = response.rows[i].elements;
          for (var j = 0; j < results.length; j++) {
            var element = results[j];
            if (element.status === "OK") {
                // A distância é retornada em pés, mas o TEXTO está em milhas. Se quiséssemos mudar
                // a função para mostrar marcadores dentro de uma DISTANCE inserida pelo usuário, precisaríamos do
                 // valor para a distância, mas por enquanto precisamos apenas do texto.
              var distanceText = element.distance.text;
               // O valor da duração é fornecido em segundos, por isso fazemos MINUTES. Precisamos do valor
              // e o texto.
              var duration = element.duration.value / 60;
              var durationText = element.duration.text;
                // a origem [i] deveria = os marcadores [i]
                markers[i].setMap(map);
                atLeastOne = true;
                // Crie uma mini janela de entrada para abrir imediatamente e conter o
                // distância e duração
                var infowindow = new google.maps.InfoWindow({
                  content: durationText + ' - Distância de: ' + distanceText +
                  '<div><input type=\"button\" value=\"Ver percurso\" onclick =' +
                    '\"displayDirections(&quot;' + origins[i] + '&quot;);\"></input></div>'
                });
                infowindow.open(map, markers[i]);
                // Coloque isso para que esta pequena janela se feche se o usuário clicar
                // o marcador, quando a grande janela de entrada é aberta
                markers[i].infowindow = infowindow;
                google.maps.event.addListener(markers[i], 'click', function() {
                  this.infowindow.close();
                });
                
            }
          }
        }
        if (!atLeastOne) {
          window.alert('Não conseguimos encontrar locais a essa distância!');
        }
      }
      function displayDirections(origin) {
            hideMarkers(markers);
            var directionsService = new google.maps.DirectionsService;
            // Get the destination address from the user entered value.
            var destinationAddress =
                document.getElementById('search-within-time-text').value;
            // Get mode again from the user entered value.
            var mode = document.getElementById('mode').value;
            directionsService.route({
            // The origin is the passed in marker's position.
            origin: origin,
            // The destination is user entered address.
            destination: destinationAddress,
            travelMode: google.maps.TravelMode[mode]
            }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                var directionsDisplay = new google.maps.DirectionsRenderer({
                map: map,
                directions: response,
                draggable: true,
                polylineOptions: {
                    strokeColor: 'green'
                }
                });
            } else {
                window.alert('A solicitação de rotas falhou devido a ' + status);
            }
            });
      }
