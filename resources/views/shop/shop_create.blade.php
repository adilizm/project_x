@extends('frant_master')

@section('frant_head')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
    .gm-style .gm-style-iw-t::after {
        background: linear-gradient(45deg, crimson 50%, rgba(255, 255, 255, 0) 51%, rgba(255, 255, 255, 0) 100%);
        box-shadow: -2px 2px 2px 0 rgb(178 178 178 / 40%);
        content: "";
        height: 15px;
        left: 0;
        position: absolute;
        top: -1px;
        transform: translate(-50%, -50%) rotate(-45deg);
        width: 15px;
    }

    .gm-style-iw-c {
        background-color: crimson !important;

    }
</style>
@stop
@section('frant_content')
<div class="card col-lg-10 m-auto jusify-content-center">
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
        <form action="{{ route('shops.save')}}" method="post" enctype="multipart/form-data">
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

            <div class="form-group my-1">
                <label>Ville <span class="text-danger">*</span></label>
                <select name="Ville" class="form-control" onChange="get_the_city(this);" id="Ville">
                    <option>choisire votre ville</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
               
            </div> <!-- form-group end.// -->
            <div class="form-group my-1">
                <label>Adresse <span class="text-danger">*</span></label>
                <textarea name="address" class="form-control" id="address" cols="30" rows="3"></textarea>
            </div> <!-- form-group end.// -->
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-primary-light " onclick="Geocod();return false;">confirmer l'address</button>
            </div>
            <div class="form-group mt-2" id="map_container">
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
<script>
    var lats = 0;
    var lngs = 0;
</script>
<script>
    $('#customFile').on('change', function() {
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
</script>
<script>
    //call the Geocod() function 
var ville='';
function get_the_city(sel) {
  ville=sel.options[sel.selectedIndex].text;
}
    function Geocod() {
        if ( document.getElementById('address').value.length < 5) {
        } else {
            var map_container = document.getElementById('map_container').setAttribute("style", "height:300px !important")
            var location = ville + ', ' + document.getElementById('address').value;
            console.log('location = ',location);
            axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
                params: {
                    address: location,
                    key: 'AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE'
                }
            }).then(function(responce) {

                var formatedaddress = responce.data.results[0].formatted_address;
                console.log('formatedaddress = ',formatedaddress);

                // change addres to formated address 
                // document.getElementById('address').value = formatedaddress;
                // get the lat and lng of address
                lats = responce.data.results[0].geometry.location.lat;
                lngs = responce.data.results[0].geometry.location.lng

                initMap();

                document.getElementById('lat').setAttribute("value", lats)
                document.getElementById('note').removeAttribute("style", "display:block")
                document.getElementById('lng').setAttribute("value", lngs)
            }).catch(function(err) {
                console.log(err);
            })
        }
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE&libraries=&v=weekly" async>
</script>

<script>
    function initMap() {
        const myLatlng = {
            lat: lats,
            lng: lngs
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            content: "",
            position: myLatlng,
        });
        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,

            });
            document.getElementById('lat').setAttribute("value", mapsMouseEvent.latLng.toJSON().lat),
                document.getElementById('lng').setAttribute("value", mapsMouseEvent.latLng.toJSON().lng),
                infoWindow.setContent(
                    ''
                );
            infoWindow.open(map);
        });
    }
</script>
@stop