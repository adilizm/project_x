@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<div class="card col-lg-10 m-auto jusify-content-center">
    <article class="card-body">
        <header class="mb-4">
            <h4 class="card-title">Enregistrement complète avec succès</h4>
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
            <div class="step active">
                <span class="icon"> <i class="fa fa-check"></i> </span>
                <span class="text"> Enregistrement complet </span>
            </div> <!-- step.// -->
        </div>
        <div class=" d-flex justify-content-center">
            <a href="#">Voir la boutique</a>
        </div>
    </article> <!-- card-body end .// -->
</div>

@stop
@section('frant_script')

@stop