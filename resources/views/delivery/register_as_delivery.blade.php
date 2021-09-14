@extends('frant_master')

@section('frant_head')

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
            <h4 class="card-title">create a delivery man account</h4>
        </header>

        <form action="{{ route('delivery.signup',app()->getLocale())}}" method="post">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors }}
            </div>
            @endif

            <div class="form-group my-1">
                <label>nom et prenom <span class="text-danger">*</span></label>
                <input type="text" required name="name" class="form-control" >
            </div> 
            <div class="form-group my-1">
                <label>phone number  <span class="text-danger">*</span></label>
                <input type="text"  required name="phone" class="form-control" >
            </div>
            <div class="form-group my-1">
                <label>Email  <span class="text-danger">*</span></label>
                <input type="email"  required name="email" class="form-control" >
            </div>
            <div class="form-group my-1">
                <label>Password  <span class="text-danger">*</span></label>
                <input type="password"  required name="password" class="form-control" >
            </div>
            <div class="form-group my-1">
                <label>Confirme Password <span class="text-danger">*</span></label>
                <input type="password"  required name="password_confirmation" class="form-control" >
            </div>
            <div class="form-group my-1">
                <label>Adresse <span class="text-danger">*</span></label>
                <textarea name="address"  required class="form-control" id="address" cols="30" rows="3"></textarea>
            </div>
            <div class="form-group my-1">
                <label>Ville :<span class="text-danger">*</span></label>
                <select class="form-control"  required name="city">
                    <option >select your city</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"> {{ $city->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group " style="margin-top:2.5rem">
                <label>more info <span class="text-danger">*</span></label>
                <textarea name="description"  required class="form-control" id="description" cols="30" rows="3"></textarea>
            </div> 

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-block"> S'inscrire </button>
            </div> 
            <p class="text-muted">En cliquant sur le bouton « S'inscrire », vous confirmez que vous acceptez nos conditions d'utilisation et notre politique de confidentialité.</p>
        </form>
    </article> 
</div>





@stop
@section('frant_script')

@stop