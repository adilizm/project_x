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
        <div class=" p-3 d-flex justify-content-between">
            <h3 class="card-title">Shops</h3>
            <div class="d-flex row justify-content-flex-end">
                <form class="mx-2" action="{{ route('shops.index',app()->getLocale()) }}" method="get">
                    @csrf
                    <div class="d-flex justify-content-end">
                        <select name="city_id" class="form-control mr-1">
                            <option>filtrer par ville</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <select name="confirmation" class="form-control mr-1" id="">
                            <option>filtrer par situation</option>
                            <option value="1">vérifié</option>
                            <option value="0">non vérifié</option>
                        </select>
                        <input type="text" class="form-control mr-1" placeholder="tapez et Entrer" name="search" id="search">
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
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Adress</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">is active </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">is confirmed</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Number Sucess orders</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Number returned orders</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Option</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($deliveries as $delivery)
                                    <tr class="even">
                                        <td class="dtr-control" tabindex="0">{{$delivery->id}}</td>
                                        <td class="dtr-control" tabindex="0">{{$delivery->User()->first()->name}} <br> {{$delivery->User()->first()->phone}}</td>
                                        <td class="dtr-control" tabindex="0">{{$delivery->address}} <br> {{ $delivery->City()->first()->name}} </td>
                                        <td>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" onchange="update_active({{$delivery->id}})" @if($delivery->is_active == 1) checked @endif class="custom-control-input" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" onchange="update_confirmation({{$delivery->id}})"  @if($delivery->is_confirmed == 1) checked @endif class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </td>
                                        <td class="dtr-control" tabindex="0">0</td>
                                        <td class="dtr-control" tabindex="0">0</td>
                                        <td>
                                            
                                        <a href="{{ route('delivery.edit',['language'=>app()->getLocale(),'id'=>encrypt($delivery->id)])}}"  class="mx-1" ><i class="fas fa-user-edit"></i></a>

                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $deliveries->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->
</section>

<!-- modals for shops -->
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
<!-- AdminLTE App -->
<script src="/AdminLTE3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE3/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["colvis"],
            "paging": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function update_active(delivery_id){
        
        axios.post('{{route('delivery.update_delivery_activity',app()->getlocale())}}', {
                        params: {
                        id:delivery_id,
                        }
            }).then(function(responce) {
                if(responce.data == '1'){
                    toastr.success("The activation is changed ");
                }
            }).catch(function(err) {
            console.log(err);
            toastr.error("something is wrong pls refresh and try again ");

            })
    }

    function update_confirmation(delivery_id){
        
        axios.post('{{route('delivery.update_delivery_activation',app()->getlocale())}}', {
                        params: {
                        id:delivery_id,
                        }
            }).then(function(responce) {
                if(responce.data == '1'){
                    toastr.success("The confirmation is changed ");
                }
            }).catch(function(err) {
            console.log(err);
            toastr.error("something is wrong pls refresh and try again ");

            })
    }

</script>
@stop