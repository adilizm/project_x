@extends('frant_master')

@section('frant_head')

<style>
   
</style>
@stop
@section('frant_content')
<div id="overlay" class="d-none overlay position-absolute" style="padding:40px;right: 0;top:0;width: 100vw;height:100vh; z-index:1000;background-color: #00000099;">
    <div class="d-flex justify-content-center align-content-center align-items-center">
        <div class="alert alert-warning">pls allow us to detect your position to continue </div>
    </div>
</div>
<div id="content" class="card col-lg-10 m-auto jusify-content-center">
    <article class="card-body">
        @if ($message = Session::get('info'))
        <div class="alert alert-info" role="alert">
            {!! $message !!}
        </div>
        @endif
        <header class="mb-4">
            <h4 class="card-title">Détail de la boutique</h4>
        </header>
        <div class="tracking-wrap " style="margin-bottom: 6rem; margin-top: 3rem;">
            <div class="step active">
                <span class="icon"> <i class="fa fa-user"></i> </span>
                <span class="text">Informations personnelles</span>
            </div> <!-- step.// -->
            <div class="step active">
                <span class="icon "> <i class="fa fa-home"></i> </span>
                <span class="text"> informations sur la boutique</span>
            </div> <!-- step.// -->
            <div class="step">
                <span class="icon"> <i class="fa fa-check"></i> </span>
                <span class="text"> Enregistrement complet </span>
            </div> <!-- step.// -->
        </div>
        <form action="{{ route('shops.save',app()->getLocale())}}" method="post" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors }}
            </div>
            @endif

            <div class="form-group my-1">
                <label>nom de la boutique <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="">
            </div> <!-- form-group end.// -->

            <div class="custom-file my-1">
                <label>Logo de la boutique <span class="text-danger">*</span></label>
                <input type="file" class="custom-file-input" name="logo" id="customFile">
                <label class="custom-file-label" for="customFile">Logo de la boutique</label>
            </div>
            <div>
                <img id="target" style="width: 100%; max-height: 350px;" />
            </div>
            <div class="custom-file my-1">
                <label>banner de la boutique <span class="text-danger">*</span></label>
                <input type="file" class="custom-file-input" name="banner" id="bannerFile">
                <label class="custom-file-label" for="bannerFile">banner de la boutique</label>
            </div>
            <div>
                <img id="targetbanner" style="width: 100%; max-height: 350px;" />
            </div>

            <div class="form-group my-1">
                <label>Ville <span class="text-danger">*</span></label>
                <select name="city_id" class="form-control" required onChange="get_the_city(this);" id="Ville">
                    <option >choisire votre ville</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>

            </div> <!-- form-group end.// -->
            <div class="form-group my-1">
                <label>Adresse <span class="text-danger">*</span></label>
                <textarea name="address" class="form-control" required id="address" cols="30" rows="3"></textarea>
            </div> <!-- form-group end.// -->
            <div class="d-flex mt-3">
                <strong>Merci de choisire votre adress exact sur la map </strong>
            </div>
            <div class="form-group mt-2" id="map_container" style="height:300px !important">
                <p class="text-muted" id="note" style="display:none">merci de choisir la position exacte de votre boutique</p>
                <div id="map" style="height: 100%;"></div>
            </div>
            <div class="form-group " style="margin-top:2.5rem">
                <label>Description <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="3"></textarea>
            </div> <!-- form-group end.// -->
            <input type="hidden" name="lat" id="lat">
            <input type="hidden" name="lng" id="lng">

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block"> S'inscrire </button>
            </div> <!-- form-group// -->
            <p class="text-muted">En cliquant sur le bouton « S'inscrire », vous confirmez que vous acceptez nos conditions d'utilisation et notre politique de confidentialité.</p>
        </form>
    </article> <!-- card-body end .// -->
</div>





@stop
@section('frant_script')
<script src="{{'https://maps.googleapis.com/maps/api/js?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE&language='.app()->getLocale().'&v=weekly'}}" async></script>

<script>
    var lats = 0;
    var lngs = 0;
    var x=0;
    var y=0;
    var deltaLat;
    var deltaLng;
    var numDeltas = 100;
    var delay = 1; //milliseconds
    navigator.geolocation.getCurrentPosition((pos)=>{
                x = pos.coords.latitude
                y = pos.coords.longitude
                console.log('xx = ',x)
                console.log('yy = ',y)
               setTimeout(() => {
                initMap()
               }, 1000);
            },error_block);
            
            function error_block(){
                document.getElementById('overlay').classList.remove('d-none')
                document.getElementById('content').classList.add('d-none')
            }
</script>

<script>
    $('#customFile').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
    $('#bannerFile').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
<script>
    function showImage(src, target) {
        var fr = new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) {
            target.src = this.result;
        };
        src.addEventListener("change", function() {
            // fill fr with image data    
            fr.readAsDataURL(src.files[0]);
        });
    }

    var src = document.getElementById("customFile");
    var target = document.getElementById("target");
    showImage(src, target);
    var srcbanner = document.getElementById("bannerFile");
    var targetbanner = document.getElementById("targetbanner");
    showImage(srcbanner, targetbanner);
</script>
<script>
    function initMap() {
        const myLatlng = {
            lat: x,
            lng: y
        };
        document.getElementById('lat').setAttribute("value",myLatlng.lat),
        document.getElementById('lng').setAttribute("value", myLatlng.lng);
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        let center_marker = {
                position: {
                    lat: x,
                    lng: y
                },
                map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: "Votre position",
            }
            marker = new google.maps.Marker(center_marker);
        
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
            document.getElementById('lat').setAttribute("value", mapsMouseEvent.latLng.toJSON().lat),
            document.getElementById('lng').setAttribute("value", mapsMouseEvent.latLng.toJSON().lng);
            var result = [mapsMouseEvent.latLng.lat(), mapsMouseEvent.latLng.lng()];
            console.log('result = ',result)
            transition(result)
          
        });
        
    }
    function transition(result) {
        i = 0;
        deltaLat = (result[0] - x) / numDeltas;
        deltaLng = (result[1] - y) / numDeltas;
        moveMarker();
    }

    function moveMarker() {
        x += deltaLat;
        y += deltaLng;
        var latlng = new google.maps.LatLng(x, y);
        marker.setTitle("Latitude:" + x + " | Longitude:" + y);
        document.getElementById('lat').value=x
        document.getElementById('lng').value=y
        marker.setPosition(latlng);
        if (i != numDeltas) {
            i++;
            setTimeout(moveMarker, delay);
        }

}
</script>
@stop