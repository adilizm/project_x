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
il suffit de cliquer sur votre position pour choisire

    <div class="row position-relative" style="height: 500px;">
        <div id="map">
        </div>
    </div>
    <div class=" m-3">
        <div class="row">
            <p>shipping price = <strong id="shipping_price">0.00</strong> <sub>Dhs</sub> </p>
        </div>
        <form action="{{ route('Calculate_shipping',app()->getLocale())}}" method="post">
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
                <button type="submit" class="btn btn-primary">Passer La Commande</button>
            </div>
            <input type="text" id="lat" name="lat" value="">
            <input type="text" id="lng" name="lng" value="">
        </form>

    </div>

</div>
@stop
@section('frant_script')
<script>
    var user_lat = 0
    var user_lng = 0
    let map;
    const shipping_fee_first_10_km= {{$shipping_fee_first_10_km}}
    const shipping_fee_more_than_10_km= {{$shipping_fee_more_than_10_km}}
    const min_shipping_fee= {{$min_shipping_fee}}
    var price_shipping=0
</script>
<script src="{{'https://maps.googleapis.com/maps/api/js?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE&libraries=geometry&language='.app()->getLocale().'&callback=initMap&v=weekly'}}" async></script>

<script>
    function initMap() {
        axios.post('https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE').then(function(responce) {
            /*  console.log(responce); */
            user_lat = responce.data.location.lat
            user_lng = responce.data.location.lng
            document.getElementById('lat').value=user_lat
            document.getElementById('lng').value=user_lng
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
         
            calculate_distance_with_google_api()
            @if($nbr_shops == 1)
            calculate_distance_one_seller();
            @else
            console.log('Too many shops');
            @endif

        }).catch(function(err) {
            console.log(err);
        })
    }
    var numDeltas = 100;
    var delay = 1; //milliseconds
    var i = 0;
    var deltaLat;
    var deltaLng;
    var executed = false;

    function transition(result) {
        i = 0;
        deltaLat = (result[0] - user_lat) / numDeltas;
        deltaLng = (result[1] - user_lng) / numDeltas;
        moveMarker();
    }
    function calculate_distance_with_google_api(){
        var origin1 = new google.maps.LatLng({{$shops_latlng[0][0]}}, {{$shops_latlng[0][1]}});
            
            var destinationA = new google.maps.LatLng( user_lat, user_lng);

            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
            {
                origins: [origin1],
                destinations: [destinationA],
                travelMode: 'DRIVING',
            }, callback);
    }

    function callback(response, status) {
        console.log('status = ',response,status)    
        console.log('distance = ',Object.values( response,status.rows)[0][0]['elements'][0]['distance']['value']/1000)   
        distance = Object.values( response,status.rows)[0][0]['elements'][0]['distance']['value']/1000 
        var first_distance=0
        var secande_distance=0
        if(distance >10){
            first_distance = 10
            secande_distance=distance-10;
            price_shipping=(first_distance * shipping_fee_first_10_km)+(secande_distance * shipping_fee_more_than_10_km)
        }else{
            price_shipping=(distance * shipping_fee_first_10_km)
            if(price_shipping < min_shipping_fee){
                price_shipping=min_shipping_fee
            }
        } 

        console.log('shipping price = ',price_shipping)
        document.getElementById('shipping_price').innerHTML= Math.round(price_shipping.toFixed(2)) ;

    }

    function moveMarker() {

        user_lat += deltaLat;
        user_lng += deltaLng;
        var latlng = new google.maps.LatLng(user_lat, user_lng);
        marker.setTitle("Latitude:" + user_lat + " | Longitude:" + user_lng);
        document.getElementById('lat').value=user_lat
        document.getElementById('lng').value=user_lng
        marker.setPosition(latlng);
        if (i != numDeltas) {
            i++;
            setTimeout(moveMarker, delay);
           /*   calculate_distance_with_google_api()
                calculate_distance_one_seller() */
            calculate_distance_one_seller()
        }
       
        // console.log('addres selectioner : lat = ',user_lat,'| lng = ',user_lng )
    }
    function calculate_distance_one_seller(){
        if(executed == false){
            executed=true
       setTimeout(executed_to_false, 1000);
    }
    }
    function executed_to_false(){
        price_shipping=0
       const shop_lat ={{$shops_latlng[0][0]}}
       const shop_lng ={{$shops_latlng[0][1]}}
        latLngA=new google.maps.LatLng(user_lat, user_lng);
        latLngB=new google.maps.LatLng(shop_lat,shop_lng);
        var distance = google.maps.geometry.spherical.computeDistanceBetween(latLngA, latLngB)
        distance=distance/1000 
        console.log('distance totak en Km =',distance); 
        var first_distance=0
        var secande_distance=0
        if(distance >10){
            first_distance = 10
            secande_distance=distance-10;
            price_shipping=(first_distance * shipping_fee_first_10_km)+(secande_distance * shipping_fee_more_than_10_km)
        }else{
            price_shipping=(distance * shipping_fee_first_10_km)
            if(price_shipping < min_shipping_fee){
                price_shipping=min_shipping_fee
            }
        }
        calculate_distance_with_google_api()
     //  document.getElementById('shipping_price').innerHTML= Math.round(price_shipping.toFixed(2)) ;
       executed=false;
    }
    
</script>
@stop