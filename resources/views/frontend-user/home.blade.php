@extends('frontend-user.app')
@section('home')
  <!-- sectio 1 -->
   <div class="w-full  flex my-4 h-56 md:h-80 lg:h-96">
         <!-- categories -->
         @include('frontend-user.components.category',['categories'=>$parent_categoreis])
         <!-- slider -->
         @include('frontend-user.components.slider', ['sliders' => $sliders])
         <!-- end slider -->
         <!-- banner product 1 -->
         
   </div>
@include('frontend-user.components.banner-products', ['products' => $top_10_requested_products])

{{-- @include('frontend-user.components.banner-products', ['products' => $top_10_requested_products]) --}}
 
    
@endsection
