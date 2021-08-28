@extends('managment.managment_master')

@section('managment_head')
@stop

@section('managment_content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header d-flex">
            <h3 class="card-title">edit shop</h3>
        </div>

        <form action="{{ route('admin.shops.admin_update_shop')}}" method="post"> 
            @csrf
            <div class="card">
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <div class="card-body">
                    <div class="d-flex m-3">
                        <div class="d-none d-md-flex">
                            <img class="cursor-pointer profile-user-img img-fluid img-circle" src="{{'/storage/'.$shop->logo_path}}">
                        </div>
                        <div class="d-flex flex-column justify-content-center px-3">
                            <div class="d-flex ">
                                <h3>{{$shop->name}}</h3>
                                @if($shop->is_published == 1)
                                <span style="height: fit-content; align-self: center; margin-left: 7px;" class="badge badge-success">vérifié</span>
                                @else
                                <span style="height: fit-content; align-self: center; margin-left: 7px;" class="badge badge-danger">non vérifié</span>
                                @endif
                            </div>
                            <p>{{$shop->address}}</p>
                        </div>
                        <div style="width: 100%; display: flex; justify-content: flex-end;">
                            <h6>créé en : <strong>{{$shop->created_at}}</strong></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated budget</span>
                                    <span class="info-box-number text-center text-muted mb-0">2300</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                                    <span class="info-box-number text-center text-muted mb-0">2000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                    <span class="info-box-number text-center text-muted mb-0">20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="">nom</label>
                            <input type="text" name="name" class="form-control" value="{{$shop->name}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Situation </label>
                            <select name="activation" class="form-control">
                                <option value="1" @if($shop->is_published == 1) selected @endif >active</option>
                                <option value="0" @if($shop->is_published == 0) selected @endif >unactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-md-6">
                            <label for="">adress</label>
                            <input type="text" name="address" class="form-control" value="{{$shop->address}}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Ville</label>
                            <select name="city_id" class="form-control">
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" @if($city->id == $shop->id) selected @endif >{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-md-6 d-flex justify-content-center">
                            <a class="mx-1" target="_blank" href="{{'https://www.google.com/maps/?q='.$shop->map_latitude . ','.$shop->map_longitude}}"> {{$shop->map_latitude}}/{{$shop->map_longitude}}<i class="fas fa-map-marked-alt"></i></a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-right" style="justify-content: flex-end;">
                        <button class="btn btn-primary" type="submit">mise a jour</button>
                    </div>
                </div>

                <!-- /.card-body -->
            </div>
        </form>
    </div>

    <!-- /.card -->
</section>

<!-- modals for shops -->
@stop

@section('managment_script')

@stop