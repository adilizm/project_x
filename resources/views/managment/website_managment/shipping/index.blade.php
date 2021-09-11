@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="d-flex ">
            <h4>Shipping Configuration</h4>
        </div>
<div class="container py-4">
    <div class=" border-bottom border-top">
        <form action="{{ route('shipping.update_delivry_fee',app()->getLocale())}}" class=" row" method="POST">
            @csrf
            <div class="form-group col-12 col-md-6">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="col-from-label">Delivery price per kilometer (First 10 Km) (paid by the customer)</label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="Delivery_price_costumer_less_than_10_KM" value="{{$Delivery_price_costumer_less_than_10_KM->value}}" type="number" step="0.01">
                    </div>
                </div>
            </div>
            <div class="form-group col-12 col-md-6">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="col-from-label">Delivery price per kilometer (>10km) </label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="Delivery_price_costumer_more_than_10KM" value="{{$Delivery_price_costumer_more_than_10KM->value}}" type="number" step="0.01"> 
                    </div>
                    
                </div>
            </div>
            <div class="form-group col-12 col-md-6">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="col-from-label">min Delivery price</label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="min_Delivery_price_costumer" value="{{$min_Delivery_price_costumer->value}}" type="number" step="0.01"> 
                    </div>
                    
                </div>
            </div>
            <div class="form-group col-12 col-md-6">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="col-from-label">Delivery price per kilometer (less than 10 km) (delivery man fee)</label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="Delivery_price_delivery_man_less_than_10_KM" value="{{$Delivery_price_delivery_man_less_than_10_KM->value}}" type="number" step="0.01"> 
                    </div>
                    
                </div>
            </div>
            <div class="form-group col-12 col-md-6">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="col-from-label">Delivery price per kilometer (more than 10km) (delivery man fee)</label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="Delivery_price_delivery_man_more_than_10_KM" value="{{$Delivery_price_delivery_man_more_than_10_KM->value}}" type="number" step="0.01"> 
                    </div>
                    
                </div>
            </div>
            <div class="form-group col-12 col-md-6">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="col-from-label">min Delivery price</label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="min_Delivery_price_delivery_man" value="{{$min_Delivery_price_delivery_man->value}}" type="number" step="0.01"> 
                    </div>
                    
                </div>
            </div>
            <div class=" col-12 d-flex justify-content-end p-3">
                <button type="submit" class="btn btn-info">Enregistrer</button>
            </div>
        </form>
        </div>
</div>
</div>
</div>
@stop

@section('managment_script')

@stop