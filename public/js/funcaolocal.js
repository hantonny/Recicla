var map

var markers = []

var placeMarkers = []
// Inicia o Mapa
function initMap () {
  var styles = [
    {
      featureType: 'water',
      stylers: [
        { color: '#19a0d8' }
      ]
    }, {
      featureType: 'administrative',
      elementType: 'labels.text.stroke',
      stylers: [
        { color: '#ffffff' },
        { weight: 6 }
      ]
    }, {
      featureType: 'administrative',
      elementType: 'labels.text.fill',
      stylers: [
        { color: '#e85113' }
      ]
    }, {
      featureType: 'road.highway',
      elementType: 'geometry.stroke',
      stylers: [
        { color: '#efe9e4' },
        { lightness: -40 }
      ]
    }, {
      featureType: 'transit.station',
      stylers: [
        { weight: 9 },
        { hue: '#e85113' }
      ]
    }, {
      featureType: 'road.highway',
      elementType: 'labels.icon',
      stylers: [
        { visibility: 'off' }
      ]
    }, {
      featureType: 'water',
      elementType: 'labels.text.stroke',
      stylers: [
        { lightness: 100 }
      ]
    }, {
      featureType: 'water',
      elementType: 'labels.text.fill',
      stylers: [
        { lightness: -100 }
      ]
    }, {
      featureType: 'poi',
      elementType: 'geometry',
      stylers: [
        { visibility: 'on' },
        { color: '#f0e4d3' }
      ]
    }, {
      featureType: 'road.highway',
      elementType: 'geometry.fill',
      stylers: [
        { color: '#efe9e4' },
        { lightness: -25 }
      ]
    }
  ]

  var mapOptions = {
    center: { lat: -20.470108, lng: -54.614947 },
    zoom: 11,
    styles: styles,
    mapTypeControl: false
  }
  if (locations.length == 0 || locations == null) {
    document.getElementById('local').innerHTML = '<h3>Não há locais cadastrados no mapa.</h3>'
    document.getElementById('local').style.width = '100%'
    document.getElementById('local').style.height = '100%'
    document.getElementById('local').style.textAlign = 'center'
  } else {
    map = new google.maps.Map(document.getElementById('map'), mapOptions)
  }

  var timeAutocomplete = new google.maps.places.Autocomplete(
    document.getElementById('search-within-time-text'))

  var zoomAutocomplete = new google.maps.places.Autocomplete()

  zoomAutocomplete.bindTo('bounds', map)

  var searchBox = new google.maps.places.SearchBox()

  searchBox.setBounds(map.getBounds())

  var largeInfowindow = new google.maps.InfoWindow()

  var defaultIcon = makeMarkerIcon('219653')

  var highlightedIcon = makeMarkerIcon('00FF7F')

  for (var i = 0; i < locations.length; i++) {
    var position = locations[i].location
    var title = locations[i].title
    var text = locations[i].text

    var marker = new google.maps.Marker({
      position: position,
      title: title,
      text: text,
      icon: defaultIcon,
      animation: google.maps.Animation.DROP,
      id: i
    })
    markers.push(marker)
    marker.addListener('click', function () {
      populateInfoWindow(this, largeInfowindow)
    })
    marker.addListener('mouseover', function () {
      this.setIcon(highlightedIcon)
    })
    marker.addListener('mouseout', function () {
      this.setIcon(defaultIcon)
    })
  }

  document.getElementById('show-listings').addEventListener('click', showListings)

  document.getElementById('search-within-time').addEventListener('click', function () {
    searchWithinTime()
  })

  searchBox.addListener('places_changed', function () {
    searchBoxPlaces(this)
  })
}
// Informações dos Pontos no InfoWindow
function populateInfoWindow (marker, infowindow) {
  if (infowindow.marker !== marker) {
    infowindow.setContent('')
    infowindow.marker = marker

    infowindow.addListener('closeclick', function () {
      infowindow.marker = null
      marker.setAnimation(null)
    })
    infowindow.setContent('<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><strong>INFORMAÇÕES</strong></button>')
    var element = document.getElementById('corpo')
    element.innerHTML = marker.text
    var title = document.getElementById('exampleModalLabel')
    title.innerHTML = marker.title
    infowindow.open(map, marker)
    marker.setAnimation(google.maps.Animation.BOUNCE)
  }
}
// Mostra os marcadores
function showListings () {
  var bounds = new google.maps.LatLngBounds()

  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map)
    bounds.extend(markers[i].position)
  }
  map.fitBounds(bounds)
}

// Oculta os marcadores
function hideMarkers (markers) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null)
  }
}

// Estilo marcador
function makeMarkerIcon (markerColor) {
  var markerImage = new google.maps.MarkerImage(
    'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|' + markerColor +
          '|40|_|%E2%80%A2',
    new google.maps.Size(21, 34),
    new google.maps.Point(0, 0),
    new google.maps.Point(10, 34),
    new google.maps.Size(21, 34))
  return markerImage
}
// Busca de endereço e tipo de transporte
function searchWithinTime () {
  var distanceMatrixService = new google.maps.DistanceMatrixService()
  var address = document.getElementById('search-within-time-text').value
  if (address === '') {
    window.alert('Você deve informar um endereço.')
  } else {
    hideMarkers(markers)

    var origins = []
    for (var i = 0; i < markers.length; i++) {
      origins[i] = markers[i].position
    }
    var destination = address
    var mode = document.getElementById('mode').value

    distanceMatrixService.getDistanceMatrix({
      origins: origins,
      destinations: [destination],
      travelMode: google.maps.TravelMode[mode],
      unitSystem: google.maps.UnitSystem.METRIC
    }, function (response, status) {
      if (status !== google.maps.DistanceMatrixStatus.OK) {
        window.alert('Error was: ' + status)
      } else {
        displayMarkersWithinTime(response)
      }
    })
  }
}
// Informações Tempo Necessário e Distância
function displayMarkersWithinTime (response) {
  var origins = response.originAddresses

  var atLeastOne = false
  for (var i = 0; i < origins.length; i++) {
    var results = response.rows[i].elements
    for (var j = 0; j < results.length; j++) {
      var element = results[j]
      if (element.status === 'OK') {
        var distanceText = element.distance.text

        var durationText = element.duration.text
        markers[i].setMap(map)
        atLeastOne = true

        var infowindow = new google.maps.InfoWindow({
          content: '<h6 class=\'text-center\'>Tempo Necessário:</br>' + durationText + '</h6>' + '<h6 class=\'text-center\'>Distância de: ' + distanceText + '</h6>' +
                  '<div class=\'botaoMapa\'><input type=\'button\' class=\'btn btn-primary\' value=\'Ver percurso\' onclick =' +
                    '\'displayDirections(&quot;' + origins[i] + '&quot;);\'></input></div>'
        })
        infowindow.open(map, markers[i])

        markers[i].infowindow = infowindow
        google.maps.event.addListener(markers[i], 'click', function () {
          this.infowindow.close()
        })
      }
    }
  }
  if (!atLeastOne) {
    window.alert('Não conseguimos encontrar locais a essa distância!')
  }
}
// Rotas
function displayDirections (origin) {
  hideMarkers(markers)
  var directionsService = new google.maps.DirectionsService()

  var destinationAddress =
                document.getElementById('search-within-time-text').value

  var mode = document.getElementById('mode').value
  directionsService.route({
    origin: destinationAddress,
    destination: origin,
    travelMode: google.maps.TravelMode[mode]
  }, function (response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      var directionsDisplay = new google.maps.DirectionsRenderer({
        map: map,
        directions: response,
        draggable: true,
        polylineOptions: {
          strokeColor: 'green'
        }
      })
    } else {
      window.alert('A solicitação de rotas falhou devido a ' + status)
    }
  })
}
