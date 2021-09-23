@extends('managment.managment_master')

@section('managment_head')
<!-- DataTables -->
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                    <strong>address:</strong> @if($order->number != null) N° {{$order->number}}, @endif @if($order->floor != null) Etage, {{$order->floor}}, @endif {{$order->address_more_info}} <a class="mx-1" target="_blank" title="Voir sur la carte" href="{{'https://www.google.com/maps/?q='.$order->lat . ','.$order->lng}}"><i class="fas fa-map-marked-alt"></i></a> <br>
                </div>
                @if($order->Livreur_id == null)
                <div class="col-sm-12 col-md-6" style="text-align-last: left; padding: 0px 32px;">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" onchange="take_order({{$order->id}})" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Prendre cette commande</label>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-sm-12 col-md-6" style="text-align-last: left; padding: 0px 32px;">
                    <div class="form-group">
                        <select class="form-control" id="delivery_status" onchange="update_delivery_status()">
                            <option disabled selected>select delivery status</option>
                            <option value="successed">successed</option>
                            <option value="returned">returned</option>
                        </select>
                    </div>
                </div>
                @endif
            </div>
            <div class="row my-3">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">image</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">product name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">shop</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">variant</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Quntity</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders_detailes as $order_product)
                            <tr>
                                <td><img width="60" src="{{'/storage/'.$order_product->Product()->first()->Images()->where('is_main','1')->first()->path}}" alt=""></td>
                                <td>{{$order_product->Product()->first()->name}}</td>
                                <td> <strong>shop name:</strong> {{$order_product->Product()->first()->Shop()->first()->name}} <br>
                                    <strong>shop address:</strong> <a class="mx-1" target="_blank" href="{{'https://www.google.com/maps/?q='.$order_product->Product()->first()->Shop()->first()->map_latitude . ','.$order_product->Product()->first()->Shop()->first()->map_longitude}}"> {{$order_product->Product()->first()->Shop()->first()->address}} <i class="fas fa-map-marked-alt"></i></a> <br>
                                </td>
                                <td>
                                    @php
                                    $variant = get_object_vars(json_decode($order_product->variant));
                                    $options= array_keys( get_object_vars(json_decode($order_product->variant)));
                                    $price_for_each=0;
                                    @endphp
                                    @foreach($options as $option_selected)
                                    @if($option_selected != 'qty' && $option_selected != 'image' && $option_selected != 'prix' )
                                    <strong>{{$option_selected}} :</strong> {{ $variant[$option_selected] }} <br>
                                    @endif
                                    @if($option_selected == 'prix')
                                    <strong>Prix unit :</strong> {{ $variant[$option_selected] }}
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
                        <div>votre récompense:<strong> {{$order->delivery_price_shipping}}</strong></div>
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
<!-- DataTables  & Plugins -->
<script src="/AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/AdminLTE3/plugins/jszip/jszip.min.js"></script>
<script src="/AdminLTE3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/AdminLTE3/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/AdminLTE3/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "paging": false,

            "buttons": ["pdf", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>

<script>
    function update_delivery_status() {
        axios.post('{{route('delivery_change_delivery_status',app()->getlocale())}}', {
                params: {
                    order_id: {{$order->id}},
                    delivery_status:document.getElementById('delivery_status').value,
                }
            }).then(function(responce) {
            console.log('responce.data =', responce.data)
            if (responce.data == '1') {
                toastr.success("order delivery_status has been changed with success");
            } else {
                toastr.error("Erreur dans cett commande");
            }
        }).catch(function(err) {
            console.log(err);
        })
    }
</script>
@stop