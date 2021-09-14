@extends('master')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
  .glide__arrow {
    border-radius: 50% !important;
  }
</style>
@section('head')
@yield('frant_head')
<style>
  .item {
    width: 60vw;
    background-color: beige;
    height: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px chartreuse solid;
  }

  .li-login:hover {
    background-color: #d3d3d3;
    color: white;
  }
</style>
<!-- Required Core Stylesheet -->
<link rel="stylesheet" href="/glide/css/glide.core.min.css">
<!-- Optional Theme Stylesheet -->
<link rel="stylesheet" href="/glide/css/glide.theme.min.css">
@stop

@php
$disktop_top_annonce = \App\Models\Businesssetting::where('name','disktop_top_annonce')->first();
$tablet_top_annonce = \App\Models\Businesssetting::where('name','tablet_top_annonce')->first();
$phone_top_annonce = \App\Models\Businesssetting::where('name','phone_top_annonce')->first();
$languages= \App\Models\Language::all();
$products_in_cart=[];
if(session()->get('cart') != null){
            foreach(session()->get('cart') as $product_selected){
                $product=\App\Models\Product::find($product_selected['product_id']);
                $prod=[];
                if($product->variants != '[]'){
                    $options=[];
                    $selected_variant=[];
                    $options= array_keys(get_object_vars( json_decode($product->variants)[0])); 
                    /* dd($options); */ 
                    //dd($product_selected); 

                    foreach( $options as $option ){
                        if($option != 'qty' && $option != 'image' && $option != 'prix'){
                            $selected_variant[$option]=$product_selected['variant_info'][$option];
                        }
                        /* get the min qty */
                   }
                   $available_qty=$product_selected['variant_info']['qty'];
                   $prod['options']=$options;
                }else{
                  $prod['options']=null;
                }
                $quantity=$product_selected['quantity'];
                if($quantity > $available_qty){
                    $quantity=$available_qty;
                }
               
                $prod['selected_variants']=$selected_variant;
                $prod['options']=$options;
                $prod['available_qty']=$available_qty;
                $prod['quantity']=$quantity;
                $prod['product']=$product;
                array_push($products_in_cart,$prod);
                 
             
                
            }
       }
@endphp


@section('content')
<header class="section-header">
  <div class="alert alert-dismissible fade show position-relative p-0" style="width: 100%;margin: 0px;border: 0px;" role="alert">
    <a class="d-none d-lg-block" style="width: 100%;" href="{{$disktop_top_annonce->link}}">
      <img class="alert-dismissible fade show" style="width: 100%; padding:0px;" src="{{'/storage/'.$disktop_top_annonce->value}}" alt="">
    </a>
    <a class=" d-none d-sm-block d-lg-none" style="width: 100%;" href="{{$tablet_top_annonce->link}}">
      <img class="alert-dismissible fade show" style="width: 100%; padding:0px;" src="{{'/storage/'.$tablet_top_annonce->value}}" alt="">
    </a>
    <a class=" d-sm-none" style="width: 100%;" href="{{$phone_top_annonce->link}}">
      <img class="alert-dismissible fade show" style="width: 100%; padding:0px;" src="{{'/storage/'.$phone_top_annonce->value}}" alt="">
    </a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="container">

    <nav class="navbar navbar-main navbar-expand-md navbar-light px-0 py-2" style="min-width: 300;">
      <div class="d-flex">
        <span class="px-2 d-md-none" style="align-self: center;" data-toggle="collapse" data-target="#main_nav2" aria-expanded="false" aria-label="Toggle navigation">
          <svg xmlns="http://www.w3.org/2000/svg" style="height: 30px;" class="ionicon" viewBox="0 0 512 512">
            <title>List</title>
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M160 144h288M160 256h288M160 368h288" />
            <circle cx="80" cy="144" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            <circle cx="80" cy="256" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            <circle cx="80" cy="368" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
          </svg>
        </span>
        <a class="navbar-brand" href="/"><img src="/bootstrap_ecom/images/logo.png" class="logo"></a>
      </div>
      <div class="d-flex p-1" style="align-items: center;">
        <div class="position-relative d-md-none cursor-pointer" style="margin-right: 13px; align-self: center;"  data-toggle="modal" data-target="#exampleModal"> 
          <!-- pls make shure to leave card_product_number -->
          <span class="badge badge-primary card_product_number"  style="top: -4px;position: absolute;right: -4px;font-size: x-small;">@if(session()->get('cart') != null ) {{count(session()->get('cart'))}} @else 0 @endif</span>
          <svg xmlns="http://www.w3.org/2000/svg" style="height: 27px;" class="ionicon" viewBox="0 0 512 512">
            <title>Cart</title>
            <circle cx="176" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            <circle cx="400" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 80h64l48 272h256" />
            <path d="M160 288h249.44a8 8 0 007.85-6.43l28.8-144a8 8 0 00-7.85-9.57H128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
          </svg>
        </div>
        @Auth
        <span class="d-md-none" id="drop_down_login_register" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a href="{{ route('myprofil',app()->getLocale())}}">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 25px;" class="ionicon" viewBox="0 0 512 512">
              <title>Mon profil</title>
              <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
              <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
            </svg>
            </a>
          </span>
        @else
        <div class="dropdown px-2">
          <span class="d-md-none" id="drop_down_login_register" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a href=""> </a>
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 25px;" class="ionicon" viewBox="0 0 512 512">
              <title>Mon profil</title>
              <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
              <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
            </svg>
           
          </span>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop_down_login_register">
            <a href="{{ route('login',app()->getLocale()) }}" class="dropdown-item text-sm text-gray-700 underline">Connectez-vous</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('register',app()->getLocale()) }}" class="dropdown-item text-sm text-gray-700 underline">Créer un compte</a>
          </div>
        </div>
        @endAuth
        <ul class="d-md-none navbar-nav align-items-center">
          <li class="nav-item dropdown ">
            @foreach($languages as $language)
            @if($language->key == App::getLocale())
            <a class="nav-link  dropdown-toggle dropdown-toggle_lang" href="#" data-toggle="dropdown"> <img src="{{ '/storage/'.$language->image_path }}" alt=""> </a>
            @endif
            @endforeach
            <ul class="dropdown-menu dropdown-menu-right">
              @foreach($languages as $language)
              <li class="d-flex"><a class="dropdown-item " href="{{ route('change_languageyy',['language'=>app()->getLocale(),'key'=>$language->key]) }}"> {{ $language->name }} <img src="{{ '/storage/'.$language->image_path }}" alt=""> </a></li>
              @endforeach
            </ul>
          </li>
        </ul>

      </div>
      <div class="collapse navbar-collapse  justify-content-md-between" id="main_nav2">

        <form action="#" method="get" class="d-none d-md-block m-0 position-relative" style="width: 60%;">
          @csrf
          <div class="d-none d-md-flex m-0 position-relative">
            <input type="text"  onkeyup="search_typing()" id="search" placeholder="Cherchez un produit, une marque ou une catégorie" class="form-control" style="padding-right: 51px;">
            <button class="btn btn-primary" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; margin-left: -48px;" type="submit"><svg xmlns="http://www.w3.org/2000/svg" style="height: 20px;" class="ionicon" viewBox="0 0 512 512">
                <title>Search</title>
                <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448" />
              </svg></button>
          </div>
          <div class="position-absolute bg-danger w-100 " style="z-index: 1000;" id="search_result"> </div>

        </form>
        <div class="d-none d-md-flex ">
         
          <div class="position-relative cursor-pointer" style="align-self: center;" data-toggle="modal" data-target="#exampleModal">
          <!-- pls make shure to leave card_product_number -->
            <span class="badge badge-primary card_product_number" style="top: -4px;position: absolute;right: -4px;font-size: x-small;" > @if(session()->get('cart') != null ) {{count(session()->get('cart'))}} @else 0 @endif  </span>
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 25px;" class="ionicon" viewBox="0 0 512 512">
              <title>Cart</title>
              <circle cx="176" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
              <circle cx="400" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 80h64l48 272h256" />
              <path d="M160 288h249.44a8 8 0 007.85-6.43l28.8-144a8 8 0 00-7.85-9.57H128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
            </svg>
          </div>
          <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown">
              @foreach($languages as $language)
              @if($language->key == App::getLocale())
              <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> <img src="{{ '/storage/'.$language->image_path }}" alt=""> </a>
              @endif
              @endforeach
              <ul class="dropdown-menu dropdown-menu-right">
                @foreach($languages as $language)
                <li class="d-flex"><a class="dropdown-item " href="{{ route('change_languageyy',['language'=>app()->getLocale(),'key'=>$language->key]) }}"> {{ $language->name }} <img src="{{ 'storage/'.$language->image_path }}" alt=""> </a></li>
                @endforeach
              </ul>
            </li>
            <ul class="navbar-nav align-items-center">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> {{ Auth::user()->name}} </a>
                <ul class="dropdown-menu dropdown-menu-right align-items-center">
                  <li><a class="dropdown-item" href="{{ route('myprofil',app()->getLocale())}}"> Mon profil </a></li>
                  <li><a class="dropdown-item" href="{{ route('panier',app()->getLocale())}}"> Ma carte </a></li>
                  @if(Auth::user()->role_id == 1)
                  <li><a class="dropdown-item" href="{{ route('managment.index',app()->getLocale())}}"> Admin managment </a></li>
                  @elseif(Auth::user()->role_id == 2)
                  <li><a class="dropdown-item" href="#"> {{ translate('manager managment')}} </a></li>
                  @elseif(Auth::user()->role_id == 3)
                  <li><a class="dropdown-item" href="{{ route('managment.index',app()->getLocale())}}"> vendor managment </a></li>
                  @elseif(Auth::user()->role_id == 4)
                  <li><a class="dropdown-item" href="#"> livreur managment </a></li>
                  @endif
                  <li>
                    <form method="POST" action="{{ route('logout',app()->getLocale()) }}">
                      @csrf
                      <x-dropdown-link class="dropdown-item" :href="route('logout',app()->getLocale())" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                      </x-dropdown-link>
                    </form>
                  </li>
                </ul>
              </li>
              @else
              <li class="nav-item dropdown">
                <div class="dropdown">
                  <span class="" id="drop_down_login_register" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span style="font-weight: 600;    cursor: pointer;">{{ translate('log in') }}</span>
                  </span>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop_down_login_register">
                    <a href="{{ route('login',app()->getLocale()) }}" class="dropdown-item text-sm text-gray-700 underline">Connectez-vous</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('register',app()->getLocale()) }}" class="dropdown-item text-sm text-gray-700 underline">Créer un compte</a>
                  </div>
                </div>
              </li>
              @endauth
            </ul>
        </div>
      </div>
  </div>
  </nav>
</header>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cart_body" class="modal-body">
      @foreach($products_in_cart as $product)
       <!-- dont remove class div-remover -->
       <div class="d-flex div-remover @if(!$loop->last) border-bottom @endif my-1 " id="{{'cart_item'.$loop->index}}">
          <img width="80" style="align-self: center; height: min-content;" src="{{ '/storage/'.$product['product']->Images()->where('is_main','1')->first()->path}}" alt="">
          {{$product['product']->name}} <br>
          -- Qty -> {{$product['quantity']}} <br>
          @if($product['options'] != null)
            @foreach($product['options'] as $option)
              @if($option !='qty' && $option != 'prix' && $option !='image' ) 
              -- {{$option}} -> {{$product['selected_variants'][$option]}} <br>
              @endif
            @endforeach
          @endif
          <!-- dont remove class dropper -->
          <a href="javascript:void(0);" onclick="remove_product_from_cart({{$loop->index}})" class="dropper badge cursor-pointer badge-danger m-2">x</a>
       </div>
      @endforeach 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@yield('frant_content')
@stop

@section('footer')
<!-- Footer -->
<footer class="footer text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="{{route('login.vondeur',app()->getLocale())}}" class="text-reset">Devenir vendeur</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
          <a href="{{route('login.delivery',app()->getLocale())}}" class="text-reset">Devenir Livreur</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
@stop


@section('script')

<script>
  /* get nbr_products */
  var nbr_products_in_cart= @if(session()->get('cart') != null ) {{count(session()->get('cart'))}} @else 0 @endif ;
  function search() {
    axios.post('{{route('search',app()->getlocale())}}', {
        params: {
          keyword:document.getElementById('search').value,
        }
      }).then(function(responce) {
        if(responce.data == '0'){
          document.getElementById('search_result').innerHTML = null;
          console.log('null');
        }else {
           document.getElementById('search_result').innerHTML =responce.data;
           console.log('kayna data');

        }
    }).catch(function(err) {
      console.log(err);
    })
  }

  function search_typing() {
    var keyword=document.getElementById('search').value;
    document.getElementById('search_result').innerHTML ='';
    if(keyword.length >2){
      search();
    }
    
  }
  function remove_product_from_cart(position) {

    axios.post('{{route('remove_from_carte',app()->getlocale())}}', {
                        params: {
                          position_to_delete:position,
                        }
            }).then(function(responce) {
                console.log(responce);
                document.getElementById('cart_item'.concat(position.toString())).remove();
                nbr_products_in_cart--;
                document.querySelectorAll('.card_product_number').forEach(element => {
                  element.innerHTML=nbr_products_in_cart;
                });
                var i = 0;
                document.querySelectorAll('.dropper').forEach(element => {
                  element.setAttribute('onclick','remove_product_from_cart('.concat(i.toString())+')');
                  i++;
                });
                 i = 0;
                document.querySelectorAll('.div-remover').forEach(element => {
                  element.setAttribute('id','cart_item'.concat(i.toString()));
                  i++;
                });

            }).catch(function(err) {

            console.log(err);

            })

     
  }
</script>
@yield('frant_script')
@stop