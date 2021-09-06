@extends('managment.managment_master')

@section('managment_head')
<!-- DataTables -->
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/AdminLTE3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



@section('managment_content')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="p-2 d-flex justify-content-between">
      <h3 class="card-title">Villes</h3>
      <div class="d-flex row">
        @if(in_array( "cities.create", json_decode(Auth::user()->Role->permissions)))
        <div class="col-12 d-flex justify-content-end mb-2">
          <span class="btn bg-gradient-primary btn-sm cursor-pointer" data-toggle="modal" data-target="#add_city">ajouter une ville</span>
        </div>
        <div class="modal fade" id="add_city" tabindex="-1" aria-labelledby="add_citylabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_citylabel">Ajouter une ville</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('cities.store',app()->getLocale())}}" method="post">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>nom de la ville</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Ajouter la ville</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
  @if(in_array( "cities.create", json_decode(Auth::user()->Role->permissions)))
  <div class="card">
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row d-flex justify-content-center">
          <div class="col-8 ">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nom</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Options</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach( $cities as $city)
                <tr>
                  <td>{{$city->id}}</td>
                  <td>{{$city->name}}</td>
                  <td>
                    <a href="#">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  @else
  <div class="card">
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row d-flex justify-content-center">
          <div class="col-8 ">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nom</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach( $cities as $city)
                <tr>
                  <td>{{$city->id}}</td>
                  <td>{{$city->name}}</td>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  @endif
  </div>
  <!-- /.card -->
</section>

<!-- modals for products -->

@stop

@section('managment_script')
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "paging": false,
      "info": false,
    })
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
</script>
<!-- DataTables  & Plugins -->
<script src="/AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- <script src="/AdminLTE3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
<!-- <script src="/AdminLTE3/plugins/jszip/jszip.min.js"></script>
<script src="/AdminLTE3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/AdminLTE3/plugins/pdfmake/vfs_fonts.js"></script> -->
<!-- <script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/AdminLTE3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->

@stop