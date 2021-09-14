@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<div class="cotainer">
    <div class="row">
        <div class="col-12 d-flex justify-content-center m-5">
            <div class="m-5">pls login before cuntinue : <a href="{{ route('login',app()->getLocale()) }}" class=" btn-primary p-2 rounded text-sm text-gray-700 underline">Connectez-vous</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('frant_script')

@stop