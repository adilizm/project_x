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
        <a href="{{ route('category.create')}}" class="btn bg-gradient-primary btn-sm float-right">ajouter une catégorie</a>
      </div>
      @endif
    </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button></div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Rendering engine</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Browser</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="">Platform(s)</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">Engine version</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column descending" aria-sort="ascending" style="">CSS grade</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd">
                    <td class="dtr-control" tabindex="0">Misc</td>
                    <td class="" style="">NetFront 3.4</td>
                    <td class="" style="">Embedded devices</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="even">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Nokia N800</td>
                    <td class="" style="">N800</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="odd">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera for Wii</td>
                    <td class="" style="">Wii</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="even">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera 9.2</td>
                    <td class="" style="">Win 88+ / OSX.3+</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="odd">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera 9.5</td>
                    <td class="" style="">Win 88+ / OSX.3+</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="even">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera 7.0</td>
                    <td class="" style="">Win 95+ / OSX.1+</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="odd">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera 7.5</td>
                    <td class="" style="">Win 95+ / OSX.2+</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="even">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera 8.0</td>
                    <td class="" style="">Win 95+ / OSX.2+</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="odd">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera 8.5</td>
                    <td class="" style="">Win 95+ / OSX.2+</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                  <tr class="even">
                    <td class="dtr-control" tabindex="0">Presto</td>
                    <td class="" style="">Opera 9.0</td>
                    <td class="" style="">Win 95+ / OSX.3+</td>
                    <td class="" style="">-</td>
                    <td class="sorting_1" style="">A</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">Rendering engine</th>
                    <th rowspan="1" colspan="1" style="">Browser</th>
                    <th rowspan="1" colspan="1" style="">Platform(s)</th>
                    <th rowspan="1" colspan="1" style="">Engine version</th>
                    <th rowspan="1" colspan="1" style="">CSS grade</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                  <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                  <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                </ul>
              </div>
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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