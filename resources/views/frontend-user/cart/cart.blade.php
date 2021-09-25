@extends('frontend-user.app')

@section('head_section')
<script src="{{'https://maps.googleapis.com/maps/api/js?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE&libraries=geometry&language='.app()->getLocale().'&v=weekly'}}" async></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
@stop
@section('content_section')
<div class="flex flex-col lg:flex-row items-center lg:items-start m-auto lg:space-x-8 w-full max-w-5xl mt-20 mb-6">
  {{-- orders --}}
    <div class="lg:max-w-2xl w-full space-y-6" style="margin-top: -55px;">
       <div class="flex items-center justify-start">
          <div class="flex items-center space-x-3 md:space-x-4">
          <span class="rounded-full w-8 h-8 bg-green-600 flex items-center justify-center text-base lg:text-xl text-white">1</span>
          <p class="text-lg lg:text-xl text-heading capitalize">{{translate('My Orders')}}</p>
        </div>
    </div>
    
    @foreach($products_in_cart as $product)
    <div class="shadow-700 bg-white px-2 md:px-5 rounded-lg border">
        <div class="flex items-center py-4   text-sm  justify-between" style="opacity: 1;">
            <div class="flex items-center space-x-4">
                <div class="w-16 sm:w-24 h-16 sm:h-24 flex items-center justify-center overflow-hidden bg-gray-100  flex-shrink-0 relative">
                   <a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product['product']->slug])}}">
                    <div class="rounded-md">
                        <img src="{{ '/storage/'. $product['product']->Images()->where('is_main','1')->first()->path}}" class="rounded-md" onerror="this.onerror=null;this.src='/images/onerror.svg';">
                    </div>
                    </a>
                </div>
                <div>
                    <a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product['product']->slug])}}">
                        <h3 class="font-bold text-heading"> {{$product['product']->name}}</h3>
                    </a>
                    @if($product['product_with_variant'] == 1)
                    <p class="my-1 font-semibold text-green-600">{{$product['price_selected_variant']}} Dhs each</p>
                    @else
                    <p class="my-1 font-semibold text-green-600">{{$product['product']->prix}} Dhs each</p>
                    @endif
                    <span class="text-xs text-body">14 X 1lb</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
            @if($product['product_with_variant'] == 1)
                <div class="flex-shrink-0">           
                    <var id="{{'this_product_total'. $loop->index}}" class="total-product mx-auto font-bold text-heading" val="{{$product['price_selected_variant'] * $product['quantity']}}">{{$product['price_selected_variant'] * $product['quantity']}}</var>
                </div>
            @else
            <div class="flex-shrink-0">           
                    <var id="{{'this_product_total'. $loop->index}}" class="total-product mx-auto font-bold text-heading" val="{{$product['product']->prix * $product['quantity']}}">{{$product['product']->prix * $product['quantity']}}</var>
                </div>
            @endif


            
                <div class="flex-shrink-0">
                @if($product['product_with_variant'] != 1)
                    <div id="{{'div_qty_'.$loop->index}}" class="flex overflow-hidden flex-col-reverse items-center w-8 h-24 bg-gray-100 text-heading rounded-full">
                        <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600hover hover:!bg-gray-100" onclick="decreas_qty('{{ $loop->index }}','{{ $product['product']->prix }}') " >
                            <span class="sr-only">minus</span>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                            </svg>
                        </button>
                        <qty style="width: 33px; padding: 0; text-align: center;border: 0;   border-bottom: 1px #ced4da solid;    border-radius: 0;    border-top: 1px #ced4da solid;" name="qty[]" class="form-control"  min="{{$product['product']->min_quantity}}" max="{{ $product['available_qty'] }}" type="number" > {{$product['quantity']}}"</qty>
                        <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600hover hover:!bg-gray-100" title="" onclick="encreas_qty('{{ $loop->index }}','{{ $product['product']->prix }}') " >
                            <span class="sr-only">plus</span>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>
                    @else
                    <div id="{{'div_qty_'.$loop->index}}" class="flex overflow-hidden flex-col-reverse items-center w-8 h-24 bg-gray-100 text-heading rounded-full">
                        <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600hover hover:!bg-gray-100" onclick="decreas_qty('{{ $loop->index }}','{{$product['price_selected_variant']}}') ">
                            <span class="sr-only">minus</span>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                            </svg>
                        </button>
                        <qty  name="qty[]"  class="flex-1 flex items-center justify-center text-sm font-semibold text-heading" value="{{$product['quantity']}}"  min="{{$product['product']->min_quantity}}" max="{{ $product['available_qty'] }}" type="number" >{{$product['quantity']}}</qty>
                        <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600hover hover:!bg-gray-100" title="" onclick="encreas_qty('{{ $loop->index }}','{{$product['price_selected_variant']}}') " > 
                            <span class="sr-only">plus</span>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>
                    @endif
                </div>
                <div class="flex-shrink-0">
                    <div class="flex  items-center justify-center w-8 h-24 bg-gray-100 text-heading rounded-full">
                        <button class="w-7 h-7  flex items-center justify-center flex-shrink-0 rounded-full text-muted transition-all duration-200 focus:outline-none hover:bg-gray-100 focus:bg-gray-100 hover:text-red-600 focus:text-red-600">
                            <span class="sr-only">close</span>
                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
   </div>
   @endforeach
   {{-- ******************************************* --}}
   <div class="lg:max-w-2xl w-full space-y-6">
       <div class="lg:max-w-2xl w-full space-y-6">
           
     <div class="flex items-center justify-start">
          <div class="flex items-center space-x-3 md:space-x-4">
          <span class="rounded-full w-8 h-8 bg-green-600 flex items-center justify-center text-base lg:text-xl text-white">2</span>
          <p class="text-lg lg:text-xl text-heading capitalize">Choose Adresse</p>
        </div>
    </div>
   <div class="shadow-700 py-2 md:py-5 bg-white px-2 md:px-5 rounded-lg border w-full  space-y-4">
        <div class=" h-72   shadow rounded">
            <a href="#map"></a>
            <div id="map" class="w-full h-full"></div>
        </div>
        <div class="m-4 ">
        <form action="{{route('store_order',app()->getlocale())}}" method="post">
            @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 my-6">
                    <div>
                        <label class="block text-gray-500 font-semibold text-sm leading-none mb-3">{{translate('Business | Building name')}}</label>
                        <input type="text" name="Business" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-500 font-semibold text-sm leading-none mb-3">{{translate('Number')}}</label>
                        <input type="tel" name="number" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 my-6">
                <div>
                    <label  class="block text-gray-500 font-semibold text-sm leading-none mb-3">{{translate('Floor | Door number')}}</label>
                    <input type="number" name="floor" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
                </div>
                <div>
                    <label for="email" class="block text-gray-500 font-semibold text-sm leading-none mb-3">{{translate('District | Zone | Secteur')}}</label>
                    <input type="text" name="Zone" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
                </div>
                </div>
                <div class="my-6">
                    <label for="subject" class="block text-gray-500 font-semibold text-sm leading-none mb-3">More info about address</label>
                    <input id="subject" name="subject" type="text" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
                </div>
                <div class="my-6 flex justify-end">
                    <button class="items-center py-2 px-4 font-bold text-white bg-green-600 rounded hover:bg-green-500 focus:bg-green-700">{{ translate('checkout')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
   </div>
   {{-- end orders --}}
   <div class="w-full lg:w-96 mb-10 sm:mb-12 lg:mb-0  mt-6 lg:mt-0 lg:sticky lg:top-24 space-y-4">
            <div class="w-full bg-white rounded-lg border p-6 space-y-2">
                <div>
                    <h3>Have coupon?</h3>
                </div>
                <div class="relative text-gray-700">
                    <input class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Code Coupon">
                    <button class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-green-600 rounded-r-lg hover:bg-green-500 focus:bg-green-700">Apply</button>
                </div>
            </div>
    
            <div class="w-full bg-white rounded-lg border p-6 space-y-2 relative overflow-hidden">
                <div id="prices_processing" class="w-full h-full absolute bg-white top-0 right-0 flex justify-center items-center" >
                    <div class="flex p-2 rounded">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="#059669" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="#059669" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <h3>{{translate('Processing')}}</h3>
                    </div>
                </div>
                <div class="flex items-center justify-between"><span>Total products</span><div><span id="total_no_coupon">0</span><span> {{translate('Dhs')}}</span></div></div>
                <div class="flex items-center justify-between"><span>Total shipping</span><div><span id="total_shipping">0</span><span> {{translate('Dhs')}}</span></div></div>
                <div class="flex items-center justify-between"><span>Discount</span><div><span id="copon_value">0</span><span> {{translate('Dhs')}}</span></div></div>
                 <div class="border-b border-gray-200 w-full"></div>
                <div class="flex items-center justify-between"><span>Total</span> <div><span id="Total_to_pay"> 15</span><span> {{translate('Dhs')}}</span></div></div>
            </div>
    </div>
</div>
@endsection
@section('script_section')
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
			const min =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' qty')).getAttribute('min')	;
			const max =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' qty')).getAttribute('max')
			var value =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' qty')).innerHTML;
            console.log('value pp == ',value);
            value= parseFloat(value);
            console.log('')
			var product_total = 0;
			value--;
			if(value< min){
				value=min;
			}
            axios.post('{{ route('decreas_qty',['language'=>app()->getLocale()]) }}', {
                        params: {
                            _position:position,
                            _product_price:product_price,
                            _value:value
                        }
            }).then(function(responce) {
               // console.log(responce)
            }).catch(function(err) {
                console.log(err);
            })
			document.querySelector('#div_qty_'.concat(position.toString()).concat(' qty')).innerHTML=value;
			var product_total=value*product_price;
			document.querySelector('#this_product_total'.concat(position.toString())).innerHTML=product_total;
			calculate_Total_products()
		}
		function encreas_qty(position,product_price){
			const max =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' qty')).getAttribute('max')
			var value =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' qty')).innerHTML;

            value= parseFloat(value);
			var product_total = 0;
			value++;
			if(value> max){
				value=max;
			}

            axios.post('{{ route('encreas_qty',['language'=>app()->getLocale()]) }}', {
                        params: {
                            _position:position,
                            _product_price:product_price,
                            _value:value
                        }
            }).then(function(responce) {
               // console.log(responce)
            }).catch(function(err) {
                console.log(err);
            })


			document.querySelector('#div_qty_'.concat(position.toString()).concat(' qty')).innerHTML=value.toString();
			var product_total=value*product_price;
            // console.log('this product total is = ',product_total)
            // console.log('this product total Div is  = ','#this_product_total'.concat(position.toString()))
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
    //  console.log('Votre position actuelle est :');
    // console.log(`Latitude : ${crd.latitude}`);
    //console.log(`Longitude : ${crd.longitude}`);
    //console.log(`La précision est de ${crd.accuracy} mètres.`);
        }

        function error(err) {
            //hide the page by using a div and alert to make him accept the geolocation 
        console.warn(`ERREUR (${err.code}): ${err.message}`);
        }
    function initMap() {
        axios.post('https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyBpi8qc5SF5O4Tok6Iu0wkTEiNb0vn59FE').then(function(responce) {
             console.log('first responce == ',responce);
            
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
            infowindow = new google.maps.InfoWindow();

            google.maps.event.addListener(map, 'click', function(event) {
                var result = [event.latLng.lat(), event.latLng.lng()];
                transition(result)
            });
         
            calculate_distance_with_google_api()
			calculate_Total_products()
            console.log('Hta daba kolhi Zin 1 ');

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
    let address_google_map='';
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
        console.log('All shops = ',all_shops);
        var service_one = new google.maps.DistanceMatrixService();
        const geocoder = new google.maps.Geocoder();
            const latlnggeo = {
                            lat: parseFloat(user_lat),
                            lng: parseFloat(user_lng),
                        };
           
        geocoder.geocode({ location: latlnggeo }).then((response) => {
                if (response.results[0]) {
                 
                    infowindow.setContent(response.results[0].formatted_address);
                    address_google_map=response.results[0].formatted_address;
                    infowindow.open(map, marker);
                } else {
                    window.alert("No results found");
                }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));


            @foreach($shops_info as $shop)
            console.log('the shop is = ',all_shops[{{$loop->index}}])
            service_one.getDistanceMatrix(
            {
                origins: [all_shops[{{$loop->index}}]],
                destinations: [Customer_latlng],
                travelMode: 'DRIVING',
            },callback_one_shop_customer_position_distance{{$loop->index}}) 

            @endforeach
           // console.log('all_shops =====================',all_shops);
            var temp_origin=[all_shops[0]]
            origin= new google.maps.LatLng(temp_origin[0].lat(),temp_origin[0].lng())
           // console.log('first shop latlng === ',temp_origin[0].lat(),temp_origin[0].lng())
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
               console.log('origin_ ===',_origins[0].lat(),_origins[0].lng())
            console.log('_destinations[0] ==== ', _destinations[0].lat(),_destinations[0].lng());
           // console.log('_destinations[1] ==== ', _destinations[1].lat(),_destinations[1].lng()); 
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
        document.getElementById('prices_processing').classList.remove('hidden')

        setTimeout(() => {
            all_shops.sort((a, b) => (a.distance < b.distance) ? 1 : -1)
         //   console.log('sorted all_shops =++++-->',all_shops)
          //  console.log('status = ',status)    
          //  console.log('response = ',response) 
            distance = 0

            document.getElementById('prices_processing').classList.add('hidden')

            Object.values( response,status.rows)[0][0]['elements'].forEach(element=>{
                distance += element['distance']['value']/1000 ;
             //   console.log('element distance =======',element['distance']['value'])
            })
      //  console.log('xxxdistance = ',distance)   
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
     //  console.log('delivery shipping price = ',delivery_prix)
		document.querySelector('#total_shipping').innerHTML=Math.round(price_shipping.toFixed(2));			

       // console.log('shipping price = ',price_shipping)
		calculate_Total_to_pay()
		
		/* send shipping price to backend and store it in session */
		axios.post('{{route('Store_shipping_price_and_latlng',app()->getlocale())}}', {
                        params: {
							shipping_price: Math.round(price_shipping.toFixed(2)),
							lat: user_lat,
							lng:user_lng,
							address:address_google_map,
							delivery_price_shipping: Math.round(delivery_prix.toFixed(2))
                        }
            }).then(function(responce) {
               // console.log(responce);
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
    // executed is a boolean , its make to not calculate distance in every move of marker only when it reached the detination ( after 1000 ms of the click  )
    function executed_to_false(){
        price_shipping=0
       const shop_lat ={{$shops_latlng[0][0]}}
       const shop_lng ={{$shops_latlng[0][1]}}
        latLngA=new google.maps.LatLng(user_lat, user_lng);
        latLngB=new google.maps.LatLng(shop_lat,shop_lng);
        var distance = google.maps.geometry.spherical.computeDistanceBetween(latLngA, latLngB)
        distance=distance/1000 
      //  console.log('distance totak en Km =',distance); 
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

