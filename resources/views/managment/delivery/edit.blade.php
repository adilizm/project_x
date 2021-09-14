@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="p-3 d-flex justify-content-between border-bottom">
            <h3 class="card-title">Edition livreur</h3>
            @if($delivery->User()->first()->is_banned == 1)
            <span class="badge badge-danger">banned user </span>
            @else
            <span class="badge badge-success">Active user </span>
            @endif
        </div>
        <div class="card-body p-0">
            <form action="{{ route('delivery.update_info',app()->getLocale())}}" method="post" class="p-3">
                @csrf
                <input type="hidden" name="delivery_id" value="{{encrypt($delivery->id)}}">
                <div class="row px-3">
                    <div class="col-12 col-md-6 form-group">
                        <label for="">Nom</label>
                        <input class="form-control" type="text" name="name" value="{{$delivery->User()->first()->name}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Téléphone</label>
                        <input class="form-control" type="text" name="phone" value="{{$delivery->User()->first()->phone}}">
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-12 col-md-6 form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="text" name="email" value="{{$delivery->User()->first()->email}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Situation as user</label>
                        <select class="form-control" name="is_banned" id="">
                            <option value="1" @if($delivery->User()->first()->is_banned == 1) selected @endif >utilisateur banni</option>
                            <option value="0" @if($delivery->User()->first()->is_banned == 0) selected @endif >utilisateur active</option>
                        </select>
                    </div>
                </div>
                <div class="row px-3">
                   
                    <div class="col-12 ">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" cols="30" rows="4">{{$delivery->description}}</textarea>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-12 col-md-6">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" name="is_active" @if($delivery->is_active == 1) checked @endif class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Livraison activation</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_confirmed"  @if($delivery->is_confirmed == 1) checked @endif class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">status de confirmation</label>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-12 col-md-6">
                    <label for="">City</label>
                        <select class="form-control" name="city_id" id="">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($delivery->city_id == $city->id) selected @endif >{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                    <label for="">Address</label>
                        <textarea class="form-control" name="address" cols="30" rows="2">{{$delivery->address}}</textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end p-3">
                    <button class="btn btn-primary" type="submit">mise a jour</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@stop

@section('managment_script')

@stop