@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<div class="card col-lg-6 m-auto jusify-content-center">
<article class="card-body">
<header class="mb-4">
	<h4 class="card-title">Inscrivez-vous en tant que vendeur</h4>
</header>
<div class="tracking-wrap " style="margin-bottom: 6rem; margin-top: 3rem;">
	<div class="step active">
		<span class="icon"> <i class="fa fa-user"></i> </span>
		<span class="text">Informations personnelles</span>
	</div> <!-- step.// -->
	<div class="step ">
		<span class="icon"> <i class="fa fa-home"></i> </span>
		<span class="text"> informations sur la boutique</span>
	</div> <!-- step.// -->
	<div class="step">
		<span class="icon"> <i class="fa fa-check"></i> </span>
		<span class="text"> Enregistrement complet </span>
	</div> <!-- step.// -->
</div>
<form action="{{ route('create_vondeur')}}" method="post">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
   {{ $errors }}
    </div>
    @endif
	<div class="form-row">
		<div class="col form-group">
			<label>nom <span class="text-danger">*</span></label>
		  	<input type="text" name="nom" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>prenom <span class="text-danger">*</span></label>
		  	<input type="text" name="prenom" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
    
		<div class="form-group ">
		  <label>Telephone <span class="text-danger">*</span></label>
		  <input type="text" name="phone" class="form-control">
		</div> <!-- form-group end.// -->
	

	<div class="form-group">
		<label>Email <span class="text-danger">*</span></label>
		<input type="email" name="email" class="form-control" placeholder="">
		<small class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
	</div> <!-- form-group end.// -->
		<div class="form-group ">
		  <label>Ville <span class="text-danger">*</span></label>
		  <input type="text" name="ville" class="form-control">
		</div> <!-- form-group end.// -->
		<div class="form-group ">
		  <label>Adresse <span class="text-danger">*</span></label>
		  <textarea  name="address" class="form-control" ></textarea>
		</div> <!-- form-group end.// -->
        
	<div class="form-row">
		<div class="form-group col-md-6">
			<label>le mot de passe <span class="text-danger">*</span></label>
		    <input class="form-control" name="password" type="password">
		</div> <!-- form-group end.// --> 
		<div class="form-group col-md-6">
			<label>retaper le mot de passe <span class="text-danger">*</span></label>
		    <input class="form-control" name="password_confirmation" type="password">
		</div> <!-- form-group end.// -->  
	</div>
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary btn-block"> S'inscrire </button>
    </div> <!-- form-group// -->      
    <p class="text-muted">En cliquant sur le bouton « S'inscrire », vous confirmez que vous acceptez nos conditions d'utilisation et notre politique de confidentialité.</p>                                          
</form>
<hr>
<p class="text-center">Avoir un compte? <a href="{{ route('login')}}">Connexion</a></p>
</article> <!-- card-body end .// -->
</div>
@stop
@section('frant_script')

@stop