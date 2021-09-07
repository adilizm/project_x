@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="container">
            <img class="w-100" src="{{ '/storage/'. $product->Images()->where('is_main','1')->first()->path}}" alt="">
        </div>
        <div class="d-flex justify-content-center">
            @foreach($product->Images()->where('is_main','0')->get() as $image)
            <img width="90" src="{{'/storage/'.$image->path}}" alt="">
            @endforeach
        </div>
    </div>
    <div class="col-12 col-md-6 p-2">
        <div class="container">
            <div class="name mt-lg-5 mt-md-0" style="font-size: 1.5rem;font-weight: 500;">{{$product->name}}</div>
        </div>
        <div id="prix" class="price" style="font-size: 1.4rem;padding: 10px;font-weight: 800;">
            {{$product->prix}} <span style=" font-size: 1.2rem; padding: -10px; font-weight: 300;">Dhs</span>
        </div>
        @foreach($options as $option)
        @if($option != "qty" && $option != "prix" && $option != "image")
        <div class=" row mx-2">
            <p class="col-12 col-md-4 m-0 text-center align-self-center ">{{$option}} : </p>
            <div class="col-12 col-md-8 d-flex justify-content-center">
                @foreach($variables[$loop->index] as $variable)
                <a href="javascript:void(0);" class="p-2 border m-1 cursor-pointer">{{$variable}}</a>
                @endforeach
            </div>
        </div>
        @endif

        @endforeach
    </div>
</div>
@stop
@section('frant_script')

@stop