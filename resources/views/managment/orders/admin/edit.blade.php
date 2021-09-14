@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">
    <div class="card">
        <div class="px-3 py-2 d-flex border-bottom justify-content-between align-items-center">
            <h3 class="card-title">Edition d'une commande </h3>

        </div>
        <div class="card-body">

            <input type="hidden" name="order_id" value="{{encrypt($order->id)}}">
            <div class="row">
                <div class="col-sm-12 col-md-6 text-center">
                    <strong>name:</strong> {{$order->User()->first()->name}} <br>
                    <strong>Telephone:</strong> {{$order->User()->first()->phone}}<br>
                    <strong>email:</strong> {{$order->User()->first()->email}}<br>
                </div>
                <div class="col-md-6 d-flex text-center">
                    <div class="px-2 d-flex" style="align-items: center;">
                        <label for=""> status :</label>
                        <select name="status" class="form-control " style="width: fit-content;padding-right: 25px;">
                            <option value="new" @if($order->status == "new_arival") selected @endif >new_arival</option>
                            <option value="published" @if($order->status == "confirmed") selected @endif >confirmed</option>
                            <option value="unpublished" @if($order->status == "cancled") selected @endif >cancled</option>
                            <option value="draft" @if($order->status == "returned") selected @endif >returned</option>
                            <option value="banned" @if($order->status == "successed") selected @endif >successed</option>
                        </select>
                    </div>
                    <div class="px-2 d-flex" style="align-items: center;">
                        <label for=""> delivery_status :</label>
                        <select name="confermed" class="form-control" style="width: fit-content;padding-right: 25px;">
                            <option value="new" @if($order->delivery_status == "not_assigned") selected @endif >not_assigned</option>
                            <option value="published" @if($order->delivery_status == "in_the_way") selected @endif >in_the_way</option>
                            <option value="unpublished" @if($order->delivery_status == "successed") selected @endif >successed</option>
                            <option value="draft" @if($order->delivery_status == "returned") selected @endif >returned</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">product name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">variant</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">price</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Quntity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders_detailes as $order_product)
                                <tr>
                                    <td>{{$order_product->id}}</td>
                                    <td><img width="60" src="{{'/storage/'.$order_product->Product()->first()->Images()->where('is_main','1')->first()->path}}" alt=""></td>
                                    <td>{{$order_product->Product()->first()->name}}</td>
                                    <td>
                                        @php
                                            $variant = get_object_vars(json_decode($order_product->variant)); 
                                            $options= array_keys( get_object_vars(json_decode($order_product->variant)));
                                            $price_for_each=0;
                                        @endphp
                                        @foreach($options as $option_selected)
                                            @if($option_selected != 'qty' && $option_selected != 'image' && $option_selected != 'prix'  )
                                                <strong>{{$option_selected}} :</strong> {{ $variant[$option_selected] }} <br>
                                            @endif
                                            @if($option_selected == 'prix')
                                            <strong>Prix unit :</strong>  {{ $variant[$option_selected] }} 
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$order_product->price * $order_product->qty }}</td>
                                    <td>{{$order_product->qty}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <hr>
        </div>
    </div>
</section>

<!-- modals for categories -->
@stop

@section('managment_script')

@stop