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
    <div class="card-header d-flex">
      <h3 class="card-title">CATÉGORIES</h3>
      @if(in_array( "category.create", json_decode(Auth::user()->Role->permissions)))
      <div class=" w-100 float-right">
        <a href="{{ route('category.create',app()->getLocale())}}" class="btn bg-primary btn-sm float-right">ajouter une catégorie</a>
      </div>
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">description</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">percentage</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">category mére</th>
                    @if(in_array( "category.create", json_decode(Auth::user()->Role->permissions)))
                     <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">options</th>
                    @endif
                    </tr>
                </thead>
                <tbody>
                 
                 @foreach($categories as $category)
                  <tr class="even">
                    <td class="dtr-control" tabindex="0">{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->admin_percent}}</td>
                    @if($category->parent_id != null)
                      @foreach($categories as $cat)
                        @if($cat->id == $category->parent_id)
                        <td>{{$cat->name}}</td>
                        @endif
                      @endforeach
                    @else
                      <td>-</td>
                    @endif
                    @if(in_array( "category.create", json_decode(Auth::user()->Role->permissions)))
                    <td>
                      <a href="{{ route('category.edit',['language'=>app()->getLocale(),'id'=>encrypt($category->id)])}}" title="{{ translate('edit') }}"><i class="mx-1 fas fa-language"></i></a>
                    </td>
                    @endif
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
      "buttons": ["colvis"],"paging": false,
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
</script>
@stop