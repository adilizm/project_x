@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header d-flex">
            <h3 class="card-title">creation du manager</h3>
        </div>
        <div class="card-body p-0">
            <form action="{{ route('update_manager_info',app()->getLocale())}}" method="post" class="p-3">
                @csrf
                <div class="row">
                    <input type="hidden" name="manager_id" value="{{$manager->id}}">
                    <div class="form-group col-12 col-md-6">
                        <label for="name">{{translate('manager name')}}</label>
                        <input type="text" class="form-control" name="name" value="{{$manager->User()->first()->name}}" required placeholder="{{translate('manager name')}}">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="name">{{translate('manager phone')}}</label>
                        <input type="text" class="form-control"  value="{{$manager->User()->first()->phone}}" name="phone" required placeholder="{{translate('manager phone')}}">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="name">{{translate('manager email')}}</label>
                        <input type="email" class="form-control" name="email"  value="{{$manager->User()->first()->email}}" required placeholder="{{translate('manager email')}}">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="name">{{translate('manager password')}}</label>
                                <input type="password" class="form-control" name="password" >
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="name">{{translate('confirm password')}}</label>
                                <input type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label>Ville :<span class="text-danger">*</span></label>
                        <select class="form-control" required name="city">
                            <option>select your city</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($city->id == $manager->city_id) selected @endif > {{ $city->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class=" w-100 float-right p-3">
                    <button type="submit" class="btn bg-primary btn-sm float-right">mise a jour le manager</a>
                </div>
            </form>
        </div>
    </div>
</section>
@stop

@section('managment_script')

@stop