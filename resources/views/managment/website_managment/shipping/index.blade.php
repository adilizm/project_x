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
                        <label class="col-from-label">Delivery price per kilometer (paid by the customer)</label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="Delivery_price_costumer_each_KM" value="{{$Delivery_price_costumer_each_KM->value}}" type="number" step="0.01">
                    </div>
                </div>
            </div>
            <div class="form-group col-12 col-md-6">
                <div class="row p-2">
                    <div class="col-lg-6">
                        <label class="col-from-label">Delivery price per kilometer (delivery fee)</label>
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control" name="Delivery_price_delivery_man_each_KM" value="{{$Delivery_price_delivery_man_each_KM->value}}" type="number" step="0.01"> 
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