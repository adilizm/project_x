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
    <div class="  p-3 d-flex justify-content-between ">
      <h3 class="card-title">Utilisateurs</h3>
      @if( in_array( "Admin", json_decode(Auth::user()->Role->permissions)))
      <a href="{{ route('managers.create',app()->getLocale())}}" class="btn btn-primary">create new manager</a>
      @endif
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >nom du manager</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >téléphone et email</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Ville</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >activation </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Activities</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Options</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach( $managers as $manager)
                  <tr>
                    <td>{{$manager->id}}</td>
                    <td>{{$manager->User()->first()->name}}</td>
                    <td>{{$manager->User()->first()->phone}} <br>{{$manager->User()->first()->email}}</td>
                    <td>{{$manager->City()->first()->name}}</td>
                    <td>
                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" onchange="ban_manager({{$manager->User()->first()->id}})" @if($manager->User()->first()->is_banned == 0) checked @endif class="custom-control-input" id="customSwitch3">
                        <label class="custom-control-label" for="customSwitch3"></label>
                      </div>
                    </td>
                    <td>
                      see Activities
                    </td>
                    <td>
                    <a href="{{ route('admin.manager.edit',['language'=>app()->getLocale(),'id'=>encrypt($manager->id)]) }}" class="mx-1"><i class="fas fa-edit"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- /.card -->
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
  function ban_manager(manager_id){
    axios.post('{{route('manager.change_bann_status',app()->getlocale())}}', {
                        params: {
                        id:manager_id,
                        }
            }).then(function(responce) {
                if(responce.data == '1'){
                    toastr.success("The manager is banned now and he/she cant join");
                }else{
                  toastr.success("The manager is active now ");
                }
                console.log(responce)
            }).catch(function(err) {
            console.log(err);
            toastr.error("something is wrong pls refresh and try again ");

            })
  }
</script>
@stop