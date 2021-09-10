@extends('frant_master')

@section('frant_head')
<style>
    #map {
        height: 100%;
        width: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
@stop
@section('frant_content')
<div class="cotainer">
    <div class="row" style="height: 500px;">
        <div id="map"></div>
    </div>
    <div class=" m-3">

        <form action="{{ route('store_order',app()->getLocale())}}" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="exampleInputEmail1">number</label>
                    <input type="number" name="number" class="form-control">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="exampleInputEmail1">Business | Building name</label>
                    <input type="text" name="Business" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="exampleInputEmail1">Floor | Door number</label>
                    <input type="number" name="floor" class="form-control">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="exampleInputEmail1">District | Zone | Secteur</label>
                    <input type="text" name="Zone" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="exampleInputEmail1">More info about address</label>
                    <input type="text" name="address_more_info" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit">Passer La Commande</button>
            </div>
        </form>

    </div>

</div>
@stop
@section('frant_script')
<script>
    var user_lat = 0
    var user_lng = 0
    let map;
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE&callback=initMap&libraries=&v=weekly" async></script>

<script>
    function initMap() {
        axios.post('https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE').then(function(responce) {
            /*  console.log(responce); */
            user_lat = responce.data.location.lat
            user_lng = responce.data.location.lng
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: user_lat,
                    lng: user_lng
                },
                zoom: 16,
            });
            let center_marker = {
                position: {
                    lat: user_lat,
                    lng: user_lng
                },
                map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: "Votre position",
            }
            marker = new google.maps.Marker(center_marker);

            google.maps.event.addListener(map, 'click', function(event) {
                var result = [event.latLng.lat(), event.latLng.lng()];
                transition(result)
            });


        }).catch(function(err) {
            console.log(err);
        })
    }
    var numDeltas = 100;
    var delay = 1; //milliseconds
    var i = 0;
    var deltaLat;
    var deltaLng;

    function transition(result) {
        i = 0;
        deltaLat = (result[0] - user_lat) / numDeltas;
        deltaLng = (result[1] - user_lng) / numDeltas;
        moveMarker();
    }

    function moveMarker() {

        user_lat += deltaLat;
        user_lng += deltaLng;
        var latlng = new google.maps.LatLng(user_lat, user_lng);
        marker.setTitle("Latitude:" + user_lat + " | Longitude:" + user_lng);
        marker.setPosition(latlng);
        if (i != numDeltas) {
            i++;
            setTimeout(moveMarker, delay);
        }
        // console.log('addres selectioner : lat = ',user_lat,'| lng = ',user_lng )

    }
</script>
@stop