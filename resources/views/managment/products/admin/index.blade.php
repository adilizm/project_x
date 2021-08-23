@extends('managment.managment_master')

@section('managment_head')

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
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >description</th>
                  </tr>
                </thead>
                <tbody>
                 @forelse($products as $product)
                 <tr>
                     <td>{{$product->id}}</td>
                     <td>{{$product->name}}</td>
                     <td>{{$product->Shop->name}}</td>
                 </tr>
                 @empty
                 <tr>
                     <td>No data</td>
                     <td>No data</td>
                     <td>No data</td>
                 </tr>
                 @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >description</th>
                  </tr>
                </tfoot>
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

<!-- AdminLTE App -->
<script src="/AdminLTE3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE3/dist/js/demo.js"></script>
<!-- Page specific script -->

@stop