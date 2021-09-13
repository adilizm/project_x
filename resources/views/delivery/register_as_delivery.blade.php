@extends('frant_master')

@section('frant_head')

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

@stop