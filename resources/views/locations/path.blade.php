@extends('layouts.app')

@section('content')


<script>
  var MAP_DIV_ELEMENT_ID = "google_map";
  var DEFAULT_CENTER_LATITUDE = <?php echo config('map.defaultLat') ?>;
  var DEFAULT_CENTER_LONGITUDE = <?php echo config('map.defaultLong') ?>;
  var REQUIRED_ZOOM = 12;
</script>



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">@lang('Path')</div>

        <div class="card-body">
          <div id="google_map" style="width:100%;height:400px;"></div>

        </div>
      </div>
    </div>
  </div>
</div>



<script>
  let locations = `@json($locations)`;
  locations = JSON.parse(locations);

  var center = {
    lat: DEFAULT_CENTER_LATITUDE,
    lng: DEFAULT_CENTER_LONGITUDE
  };

  if (locations && locations.length > 0) {
    var sum = {
      lat: 0,
      lng: 0
    }
    for (let loc of locations) {
      sum.lat += loc.latitude;
      sum.lng += loc.longitude;
    }
    center = {
      lat: sum.lat / locations.length,
      lng: sum.lng / locations.length
    }
  }


  function initializeGoogleMap() {
    map = new google.maps.Map(document.getElementById(MAP_DIV_ELEMENT_ID), {
      center,
      zoom: REQUIRED_ZOOM
    });




    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          var infowindow = new google.maps.InfoWindow();
          var body = locations[i].meals + "<br>" + locations[i].comment;
          infowindow.setContent(body);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo config('map.key') ?>&callback=initializeGoogleMap"></script>
@endsection