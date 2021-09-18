@extends('frant_master')

@section('frant_head')
<script src="{{'https://maps.googleapis.com/maps/api/js?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE&libraries=geometry&language='.app()->getLocale().'&v=weekly'}}" async></script>

	<style>
		/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
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
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<main class="col-md-9">
<div class="card">

<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody>
<form id="form_checkout" action="{{ route('create_order',['language'=>app()->getLocale()]) }}" method="post">
	@csrf
@foreach($products_in_cart as $product)
<tr>
	<td>
		<a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product['product']->slug])}}">
		<figure class="itemside">
			<div class="aside"><img src=" {{ '/storage/'. $product['product']->Images()->where('is_main','1')->first()->path}}" class="img-sm"></div>
			<figcaption class="info">
				<a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product['product']->slug])}}" class="title text-dark">  {{$product['product']->name}}</a>
				<p class="text-muted small">Size: XL, Color: blue, <br> Brand: Gucci</p>
			</figcaption>
		</figure>
		</a>
	</td>
	<td> 
    @if($product['product_with_variant'] == 1)
		<div class="d-flex" id="{{'div_qty_'.$loop->index}}">
            <span class="form-control btn p-2 " style="border-bottom: 1px #ced4da solid;    border-left: 1px #ced4da solid;    border-top: 1px #ced4da solid;    border-radius: 0;" onclick="decreas_qty('{{ $loop->index }}','{{$product['price_selected_variant']}}') "  >-</span>
            <input style="width: 33px; padding: 0; text-align: center;border: 0;   border-bottom: 1px #ced4da solid;    border-radius: 0;    border-top: 1px #ced4da solid;" name="qty[]" class="form-control" value="{{$product['quantity']}}"  min="{{$product['product']->min_quantity}}" max="{{ $product['available_qty'] }}" type="number" id="qty_wanted">
            <span class="form-control btn p-2 " style=" border-top: 1px #ced4da solid;  border-bottom: 1px #ced4da solid;    border-radius: 0;    border-right: 1px #ced4da solid;" onclick="encreas_qty('{{ $loop->index }}','{{$product['price_selected_variant']}}') " >+</span>
        </div>
        @else
        <div class="d-flex" id="{{'div_qty_'.$loop->index}}">
            <span class="form-control btn p-2 " style="border-bottom: 1px #ced4da solid;    border-left: 1px #ced4da solid;    border-top: 1px #ced4da solid;    border-radius: 0;" onclick="decreas_qty('{{ $loop->index }}','{{ $product['product']->prix }}') "  >-</span>
            <input style="width: 33px; padding: 0; text-align: center;border: 0;   border-bottom: 1px #ced4da solid;    border-radius: 0;    border-top: 1px #ced4da solid;" name="qty[]" class="form-control" value="{{$product['quantity']}}"  min="{{$product['product']->min_quantity}}" max="{{ $product['available_qty'] }}" type="number" id="qty_wanted">
            <span class="form-control btn p-2 " style=" border-top: 1px #ced4da solid;  border-bottom: 1px #ced4da solid;    border-radius: 0;    border-right: 1px #ced4da solid;" onclick="encreas_qty('{{ $loop->index }}','{{ $product['product']->prix }}') " >+</span>
        </div>
        @endif
		
	</td>
	<td> 
        @if($product['product_with_variant'] == 1)
		<div class="price-wrap" > 
			<!-- do not remove total-product class -->
			<var class="price total-product " id="{{'this_product_total'. $loop->index}}" val="{{$product['price_selected_variant'] * $product['quantity']}}">  {{$product['price_selected_variant'] * $product['quantity']}}</var> 
			<small class="text-muted">{{$product['price_selected_variant']}} each </small> 
		</div> <!-- price-wrap .// -->
        @else
        <div class="price-wrap" > 
			<!-- do not remove total-product class -->
			<var class="price total-product " id="{{'this_product_total'. $loop->index}}" val="{{$product['product']->prix * $product['quantity']}}">  {{$product['product']->prix * $product['quantity']}}</var> 
			<small class="text-muted">{{$product['product']->prix}} each </small> 
		</div> <!-- price-wrap .// -->
        @endif
	</td>
	<td class="text-right"> 
	<a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
	<a href="#" class="btn btn-light" > Remove</a>
	</td>
</tr>
@endforeach
</form>
</tbody>
</table>	
</div> 
</main> 
<aside class="col-md-3">
		<div class="card mb-3">
			<div class="card-body">
			<form>
				<div class="form-group">
					<label>Have coupon?</label>
					<div class="input-group">
						<input type="text" class="form-control" name="" placeholder="Coupon code">
						<span class="input-group-append"> 
							<button class="btn btn-primary">Apply</button>
						</span>
					</div>
				</div>
			</form>
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
		<div class="card">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt>Total products:</dt>
					  <dd class="text-right" id="total_no_coupon">568</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Total shipping:</dt> <small><a href="#map">choisire ma position</a></small>
					  <dd class="text-right" id="total_shipping">568</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Discount:</dt>
					  <dd class="text-right" id="copon_value">000</dd>
					</dl>
					<hr>
					<dl class="dlist-align">
					  <dt>Total:</dt>
					  <dd class="text-right  h5"><strong id="Total_to_pay" >1,650</strong></dd>
					</dl>
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
	</aside> <!-- col.// -->
</div>
</div>

<div class="col-md-9">
    <div class="row position-relative" style="height: 500px;">
	<a href="#map"></a>
        <div id="map">
        </div>
    </div>
    <div class=" m-3">
        <div class="row">
        </div>
        <form action="{{route('store_order',app()->getlocale())}}" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="exampleInputEmail">City</label>
                    <select name="city_id" class="form-control" >
                        <option>Your city</option>
                        @foreach($citeis as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
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
        </form>

    </div>

</div>
</section>
    

@stop
@section('frant_script')
	<script>
	var user_lat = 0
    var user_lng = 0
    @foreach($shops_info as $shop)
        const {{ 'shop_'. $loop->index .'_lat' }}={{$shop['lat']}}
        const {{ 'shop_'. $loop->index .'_lng' }}={{$shop['lng']}}
        @if(!$loop->last)
        var {{ 'distance_'.$loop->index }}
        @endif
    @endforeach

    let map;
    const shipping_fee_first_10_km_Customer=  {{$shipping_fee_first_10_km}}
    const shipping_fee_more_than_10_km_Customer= {{$shipping_fee_more_than_10_km}}
    const min_shipping_fee_Customer= {{$min_shipping_fee}}
    const max_Delivery_price_costumer= {{$max_Delivery_price_costumer}}

    const shipping_fee_first_10_km_Delivery=  {{$Delivery_price_delivery_man_less_than_10_KM}}
    const shipping_fee_more_than_10_km_Delivery= {{$Delivery_price_delivery_man_more_than_10_KM}}
    const min_shipping_fee_Delivery= {{$min_Delivery_price_delivery_man}}
    const max_Delivery_price_Delivery= {{$max_Delivery_price_delivery_man}}

    var delivery_prix=0;
    var price_shipping=0
		function decreas_qty(position,product_price){
			const min =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).getAttribute('min')	;
			const max =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).getAttribute('max')
			var value =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value;
			var product_total = 0;
			value--;
			if(value< min){
				value=min;
			}
			document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value=value
			var product_total=value*product_price;
			document.querySelector('#this_product_total'.concat(position.toString())).innerHTML=product_total;
			calculate_Total_products()
		}
		function encreas_qty(position,product_price){
			const max =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).getAttribute('max')
			var value =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value;
			var product_total = 0;
			value++;
			if(value> max){
				value=max;
			}
			document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value=value
			var product_total=value*product_price;
			document.querySelector('#this_product_total'.concat(position.toString())).innerHTML=product_total;
			calculate_Total_products()
		}
		function calculate_Total_products(){
			var total= 0.0;
			//console.log('total no copun = ',total);
			document.querySelectorAll('.total-product').forEach(element=>{
				total = total+parseFloat(element.innerHTML);
			})
			//console.log('total no copun = ',total);
			document.querySelector('#total_no_coupon').innerHTML=total;
			calculate_Total_to_pay()
		}
		function calculate_Total_to_pay(){
			var total_products = document.querySelector('#total_no_coupon').innerHTML;
			var coupon_value = document.querySelector('#copon_value').innerHTML;
			var Total_to_pay = parseFloat( total_products) + Math.round(price_shipping.toFixed(2)) -parseFloat(coupon_value);
			document.querySelector('#Total_to_pay').innerHTML=Total_to_pay;
			document.querySelector('#total_shipping').innerHTML=Math.round(price_shipping.toFixed(2));			
		}
		function submit_form(){
			document.getElementById('form_checkout').submit();
				}
	</script>
	<script>

</script>

<script>
    
                var x =0
                var y =0
                let total_distance =0;

        var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
        };
        navigator.geolocation.getCurrentPosition((pos)=>{
                x = pos.coords.latitude
                y = pos.coords.longitude
                console.log('xx = ',x)
                console.log('yy = ',y)
                initMap()
            }, error, options);

        function success(pos) {
        var crd = pos.coords;
        console.log('Votre position actuelle est :');
        console.log(`Latitude : ${crd.latitude}`);
        console.log(`Longitude : ${crd.longitude}`);
        console.log(`La précision est de ${crd.accuracy} mètres.`);
        }

        function error(err) {
            //hide the page by using a div and alert to make him accept the geolocation 
        console.warn(`ERREUR (${err.code}): ${err.message}`);
        }
    function initMap() {
        axios.post('https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE').then(function(responce) {
             console.log(responce);
            
            user_lat = x
            user_lng = y
            
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
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: "Votre position",
            }
            
            marker = new google.maps.Marker(center_marker);

            google.maps.event.addListener(map, 'click', function(event) {
                var result = [event.latLng.lat(), event.latLng.lng()];
                transition(result)
            });
         
            calculate_distance_with_google_api()
			calculate_Total_products()
           /*  @if($nbr_shops == 1)
            calculate_distance_one_seller();
            @else
            console.log('Too many shops');
            @endif 
            shop 1 ; 30.421151, -9.605297
            */
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
    var shops=@JSON($shops_info);
    let all_shops=[];
    function transition(result) {
        i = 0;
        deltaLat = (result[0] - user_lat) / numDeltas;
        deltaLng = (result[1] - user_lng) / numDeltas;
        moveMarker();
    }
  
   
    function calculate_distance_with_google_api(){

        var Customer_latlng = new google.maps.LatLng( user_lat, user_lng);
        @foreach($shops_info as $shop)
                const {{ 'origin'. $loop->index  }} = new google.maps.LatLng({{$shop['lat']}} ,{{$shop['lng']}});
        @endforeach
        all_shops=[@foreach($shops_info as $shop){{ 'origin'. $loop->index  }} @if(!$loop->last) , @endif @endforeach]
        //var ordred_shops_by_distance=[];
     //   console.log('All shops = ',all_shops);
        var service_one = new google.maps.DistanceMatrixService();
       

            @foreach($shops_info as $shop)
           // console.log('the shop is = ',all_shops[{{$loop->index}}])
            service_one.getDistanceMatrix(
            {
                origins: [all_shops[{{$loop->index}}]],
                destinations: [Customer_latlng],
                travelMode: 'DRIVING',
            },callback_one_shop_customer_position_distance{{$loop->index}}) 

            @endforeach
            console.log('all_shops =====================',all_shops);
            var temp_origin=[all_shops[0]]
            origin= new google.maps.LatLng(temp_origin[0].lat(),temp_origin[0].lng())
            console.log('first shop latlng === ',temp_origin[0].lat(),temp_origin[0].lng())
            var _origins =[origin];
            var _destinations=[];
            if(all_shops.length != 1){
            for (let i = 1 ; i < all_shops.length ; i++) {
               if(i==all_shops.length-1){
                _destinations.push(new google.maps.LatLng(all_shops[i].lat(),all_shops[i].lng()));
                _destinations.push(Customer_latlng );
               }else{
                _destinations.push(new google.maps.LatLng(all_shops[i].lat(),all_shops[i].lng()));
               }
            }
        }else{
            _destinations.push(Customer_latlng );
        }
            
            //                    _destinations.push(Customer_latlng );

          /*   console.log('origin_ ===',_origins[0].lat(),_origins[0].lng())
            console.log('_destinations[0] ==== ', _destinations[0].lat(),_destinations[0].lng());
            console.log('_destinations[1] ==== ', _destinations[1].lat(),_destinations[1].lng()); */
            var service = new google.maps.DistanceMatrixService();
           
            service.getDistanceMatrix({
                origins: _origins,
                destinations: _destinations,
                travelMode: 'DRIVING',
            }, callback);
    }
   
    var distances_to_compare=[];
    let calculate_shops=true
    @foreach($shops_info as $shop)
    function callback_one_shop_customer_position_distance{{$loop->index}}(response, status){
       
        var distance_from= Object.values( response,status.rows)[0][0]['elements'][0]['distance']['value']/1000;
       // console.log('distance {{$loop->index}} ====>',distance_from)
        distances_to_compare[{{$loop->index}}]=distance_from;
       // console.log('distance to compare ======*====>',distances_to_compare);
        all_shops[{{$loop->index}}].distance=distance_from;
       // console.log('all_shops with distance ======+++====>',all_shops)
    }
    @endforeach

    function callback_one_shop_customer_position_distance(response, status){
        var distance_from= Object.values( response,status.rows)[0][0]['elements'][0]['distance']['value']/1000;
       // console.log('distance ====>',distance_from)
       // console.log(' distances_to_compare ====> ',distances_to_compare)
    }
    
    function callback(response, status) {
        setTimeout(() => {
            all_shops.sort((a, b) => (a.distance < b.distance) ? 1 : -1)
            console.log('sorted all_shops =++++-->',all_shops)
            console.log('status = ',status)    
            console.log('response = ',response) 
            distance = 0

            Object.values( response,status.rows)[0][0]['elements'].forEach(element=>{
                distance += element['distance']['value']/1000 ;
                console.log('element distance =======',element['distance']['value'])
            })
        console.log('xxxdistance = ',distance)   
        var first_distance=0
        var secande_distance=0
        delivery_prix=0;
        if(distance >10){
            first_distance = 10
            secande_distance=distance-10;
            price_shipping=(first_distance * shipping_fee_first_10_km_Customer)+(secande_distance * shipping_fee_more_than_10_km_Customer)
            delivery_prix=(first_distance * shipping_fee_first_10_km_Delivery)+(secande_distance * shipping_fee_more_than_10_km_Delivery)
        }else{
            price_shipping=(distance * shipping_fee_first_10_km_Customer)
            delivery_prix=(distance * shipping_fee_first_10_km_Delivery)
            if(price_shipping < min_shipping_fee_Customer){
                price_shipping=min_shipping_fee_Customer
            }
            if(delivery_prix < min_shipping_fee_Delivery){
                delivery_prix = min_shipping_fee_Delivery
            }
        } 
       if(price_shipping > max_Delivery_price_costumer){
           price_shipping=max_Delivery_price_costumer;
       }
       if(delivery_prix > max_Delivery_price_Delivery){
            delivery_prix=max_Delivery_price_Delivery;
       }
       console.log('delivery shipping price = ',delivery_prix)
		document.querySelector('#total_shipping').innerHTML=Math.round(price_shipping.toFixed(2));			

       // console.log('shipping price = ',price_shipping)
		calculate_Total_to_pay()
		
		/* send shipping price to backend and store it in session */
		axios.post('{{route('Store_shipping_price_and_latlng',app()->getlocale())}}', {
                        params: {
							shipping_price: Math.round(price_shipping.toFixed(2)),
							lat: user_lat,
							lng:user_lng,
							delivery_price_shipping: Math.round(delivery_prix.toFixed(2))
                        }
            }).then(function(responce) {
                console.log(responce);
				calculate_Total_to_pay()
            }).catch(function(err) {

            console.log(err);

            })
        }, 500);

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
            price_shipping=(first_distance * shipping_fee_first_10_km_Customer)+(secande_distance * shipping_fee_more_than_10_km_Customer)
        }else{
            price_shipping=(distance * shipping_fee_first_10_km_Customer)
            if(price_shipping < min_shipping_fee_Customer){
                price_shipping=min_shipping_fee_Customer
            }
        }
        calculate_distance_with_google_api()
     //  document.getElementById('shipping_price').innerHTML= Math.round(price_shipping.toFixed(2)) ;
       executed=false;
    }
    
</script>
@stop