<div id="google_map" style="width:100%;height:400px;"></div>

<input type="hidden" id="latitude" name="latitude">
<input type="hidden" id="longitude" name="longitude">

<center>
    <button type="button" class="btn btn-primary" onclick="getLocation()">{{ __('Get Location') }}</button>
</center>
<p id="demo"></p>

<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((location) => {
                setLocation(location.coords.latitude, location.coords.longitude);
            })

        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function setLocation(lat, lng) {
        document.getElementById(LATITUDE_ELEMENT_ID).value = lat;
        document.getElementById(LONGITUDE_ELEMENT_ID).value = lng;
        latlng = {
            lat: lat,
            lng: lng
        };
        if (marker == null) {
            marker = new google.maps.Marker({
                map: map,
                draggable: false
            });
            marker.setPosition(latlng);
        } else {
            marker.setPosition(latlng);
        }
        map.setCenter(new google.maps.LatLng(lat, lng), DEFAULT_ZOOM_WHEN_COORDINATE_EXISTS);
    }



    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
</script>

<script type="text/javascript">
    var LATITUDE_ELEMENT_ID = "latitude";
    var LONGITUDE_ELEMENT_ID = "longitude";
    var MAP_DIV_ELEMENT_ID = "google_map";

    var DEFAULT_ZOOM_WHEN_NO_COORDINATE_EXISTS = 1;
    var DEFAULT_CENTER_LATITUDE = <?php echo config('map.defaultLat') ?>;
    var DEFAULT_CENTER_LONGITUDE = <?php echo config('map.defaultLong') ?>;
    var DEFAULT_ZOOM_WHEN_COORDINATE_EXISTS = 15;

    // This is the zoom level required to position the marker
    var REQUIRED_ZOOM = 10.13;
    // The google map variable
    var map = null;

    // The marker variable, when it is null no marker has been added
    var marker = null;

    function initializeGoogleMap() {
        map = new google.maps.Map(document.getElementById(MAP_DIV_ELEMENT_ID), {
            center: {
                lat: DEFAULT_CENTER_LATITUDE,
                lng: DEFAULT_CENTER_LONGITUDE
            },
            zoom: REQUIRED_ZOOM
        });

        var latitude = +document.getElementById(LATITUDE_ELEMENT_ID).value;
        var longitude = +document.getElementById(LONGITUDE_ELEMENT_ID).value;

        if (latitude != 0 && longitude != 0) {
            setLocation(latitude, longitude);
        } else {
            // Just set the default center, do not add a marker
            map.setCenter(new google.maps.LatLng(DEFAULT_CENTER_LATITUDE, DEFAULT_CENTER_LONGITUDE),
                DEFAULT_ZOOM_WHEN_NO_COORDINATE_EXISTS);
        }

        map.addListener("click", googleMapClickHandler);
    }


    function googleMapClickHandler(event) {
        latlng = event.latLng;
        setLocation(latlng.lat(), latlng.lng());

    }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo config('map.key') ?>&callback=initializeGoogleMap"></script>