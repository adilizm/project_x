@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<div class="cotainer">
    <div class="d-flex justify-content-center text-center">
        <h3>choisir votre Ville</h3>
    </div>
    <div class="row">
              @foreach($cities as $city)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card text-center w-100 p-3">
                            <a href="{{route('store_city',['language'=>app()->getLocale(),'id'=>encrypt($city->id)])}}">{{$city->name}}</a>
                        </div>
                    </div>
              @endforeach
    </div>
</div>
@stop
@section('frant_script')

@stop