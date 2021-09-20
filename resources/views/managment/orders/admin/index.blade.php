@extends('managment.managment_master')

@section('managment_head')
<!-- DataTables -->
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@stop

@section('managment_content')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="p-3 d-flex justify-content-between" style="content: none ">
      <h3 class="card-title">Orders</h3>
      <div class="d-flex  row">
        <form class="mx-2" action="#" method="get">
          @csrf
          <div class="d-flex justify-content-end">
            <select name="city_id" class="form-control mr-1" id="">
              <option>filtrer par ville</option>
              @foreach($cities as $city)
              <option value="{{$city->id}}">{{$city->name}}</option>
             @endforeach
            </select>
            <select name="status" class="form-control mr-1" id="">
              <option>filtrer Des ordres</option>
              <option value="new">new_arrivale</option>
              <option value="published">confirmed</option>
              <option value="unpublished">cancled</option>
              <option value="draft">returned</option>
              <option value="banned">successed</option>
            </select>
            <select name="delivery_status" class="form-control mr-1" id="">
              <option>delivery_status</option>
              <option value="1">not_assigned</option>
              <option value="0">in_the_way</option>
              <option value="0">successed</option>
              <option value="0">returned</option>
            </select>            
            <button type="submit" class="btn btn-primary">Filtrer</button>
          </div>
        </form>
      </div>
    </div>

    <div class="card">

      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

          <div class="row">
            <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">date</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">user_info</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">address</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">price</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Order status</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">delivery status</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td><strong>name:</strong> {{$order->User()->first()->name}} <br> <strong>phone: </strong> {{$order->User()->first()->phone}} </td>
                    <td><strong>adress on Map :</strong><a class="mx-1" target="_blank" href="{{'https://www.google.com/maps/?q='.$order->lat . ','.$order->lng}}" title="show on map" ><i class="fas fa-map-marked-alt"></i></a> <br> <strong>ville: </strong> {{$order->City()->first()->name}} </td>
                    <td><strong>Total:</strong> {{$order->price_total}} <br> <strong>Shipping: </strong>{{$order->price_shipping}} </td>
                    <td>{{$order->status}} </td>
                    <td>{{$order->delivery_status}} </td>
                    @if(in_array("orders.edit", json_decode(Auth::user()->Role->permissions)))
                    <td>
                    <a class="mx-1" href="{{ route('admin.orders.admin_edit_order',['language'=>app()->getLocale(),'id'=>encrypt($order->id)]) }}"><i class="fas fa-eye"></i></a>
                    </td>
                    @endif
                  </tr>
                  @endforeach


                </tbody>
                
              </table>
              <div class="d-flex justify-content-end">
              {{
                $orders->links();
              }}</div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- /.card -->
</section>

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

      "buttons": ["pdf", "print", "colvis"]
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
@stop