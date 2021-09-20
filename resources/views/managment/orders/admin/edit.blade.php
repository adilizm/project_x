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
                <div class="col-sm-12 col-md-6" style="text-align-last: left; padding: 0px 32px;">
                    <strong>name:</strong> {{$order->User()->first()->name}} <br>
                    <strong>Telephone:</strong> {{$order->User()->first()->phone}}<br>
                    <strong>email:</strong> {{$order->User()->first()->email}}<br>
                    <strong>address:</strong> @if($order->number != null) N° {{$order->number}}, @endif  @if($order->floor != null) Etage, {{$order->floor}}, @endif {{$order->address_more_info}}                       <a class="mx-1" target="_blank" title="Voir sur la carte" href="{{'https://www.google.com/maps/?q='.$order->lat . ','.$order->lng}}"><i class="fas fa-map-marked-alt"></i></a> <br>
                </div>
                <div class="col-md-6 d-flex text-center">
                    <div class="px-2 d-flex" style="align-items: center;">
                        <label for=""> status :</label>
                        <select id="order_status" name="status" onchange="change_order_status({{$order->id}})" class="form-control " style="width: fit-content;padding-right: 25px;">
                            <option value="new_arival" @if($order->status == "new_arival") selected @endif >new_arival</option>
                            <option value="confirmed" @if($order->status == "confirmed") selected @endif >confirmed</option>
                            <option value="cancled" @if($order->status == "cancled") selected @endif >cancled</option>
                            <option value="returned" @if($order->status == "returned") selected @endif >returned</option>
                            <option value="successed" @if($order->status == "successed") selected @endif >successed</option>
                        </select>
                    </div>
                    <div class="px-2 d-flex" style="align-items: center;">
                        <label for=""> le livreur  :</label>
                        <select onchange="update_delivery_order({{$order->id}})" id="delivery" name="confermed" class="form-control" style="width: fit-content;padding-right: 25px;">
                                <option value="null" @if($order->Livreur_id == null) selected @endif >not assigned</option>
                            @foreach($livreurs as $livreur)
                                <option value="{{$livreur->id}}" @if($order->Livreur_id == $livreur->id) selected @endif>{{$livreur->User()->first()->name}} (</strong>{{ $livreur->User()->first()->phone}} )</option>
                            @endforeach
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
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Quntity</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">price</th>
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
                                    <td>{{$order_product->qty}}</td>
                                    <td>{{$order_product->price * $order_product->qty }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        <div class="d-flex flex-column" style="align-items: end; padding: 0px 40px;">
                            <div>Total des produit:<strong> {{$order->price_total - $order->price_shipping}}</strong></div>
                            <div>Prix shipping:<strong> {{$order->price_shipping}}</strong></div>
                            <div>Total a payer:<strong> {{$order->price_total}}</strong></div>
                        </div> 
                    </div>
                </div>
            <hr>
            <div id="responce"></div>
        </div>
    </div>
</section>

<!-- modals for categories -->
@stop

@section('managment_script')
<script>
    function change_order_status(order_id){
        let status= document.getElementById('order_status').value;
        axios.post('{{route('update_order_status',app()->getlocale())}}', {
        params: {
                order_id:order_id,
                order_status:status
        }
      }).then(function(responce) {
        if(responce.data == '1'){
            toastr.success("le status de la commande est changer");
        }else {
            toastr.error("somthing is wrang");
        }
    }).catch(function(err) {
      console.log(err);
    })
    }
    function update_delivery_order(order_id){
        let delivery= document.getElementById('delivery').value;
        axios.post('{{route('update_order_delivery',app()->getlocale())}}', {
        params: {
                order_id:order_id,
                order_delivery:delivery
        }
      }).then(function(responce) {
        if(responce.data == '1'){
            toastr.success("the delivery is updated");
        }else if(responce.data == '2'){
            toastr.success("the delivery is deleted and order status is updated");
        }
    }).catch(function(err) {
      console.log(err);
    })
    }

</script>
@stop