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
      <h3 class="card-title">PRODUCTS</h3>
      <div class="d-flex row">
      @if(in_array( "products.create", json_decode(Auth::user()->Role->permissions)))
        <div class="col-12 d-flex justify-content-end mb-2 d-md-none">
        <a href="{{ route('vondeur.products.create')}}" class="btn bg-gradient-primary btn-sm ">ajouter un produit</a>
        </div>
        @endif
        <form class="mx-2" action="{{ route('products.index') }}" method="get">
          @csrf
          <div class="d-flex justify-content-end">
            <input type="number" min="1" class="form-control mr-1" placeholder="10" name="nbr_products" >
            <select name="" class="form-control mr-1" id="">
              <option> filtrer Des produit</option>
              <option value="new">En attente</option>
              <option value="published">Publié</option>
              <option value="unpublished">Non Publié</option>
              <option value="draft">Brouillon</option>
              <option value="banned">Refusé</option>
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nom</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Prix</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ventes</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Statut</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date d'ajout</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>
                      @foreach($product->Images()->get() as $image)
                      @if($image->is_main == 1)
                      <img src="{{'/storage/'.$image->path}}" width="50" alt="{{$product->name}}">
                      @endif
                      @endforeach
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->prix}}</td>
                    <td>0</td>
                    <td>
                      @if($product->status == "new")
                      <span class="badge badge-info">en attente</span>
                      @elseif($product->status == "draft")
                      <span class="badge badge-warning">incomplet</span>
                      @elseif($product->status == "published")
                      <span class="badge badge-success">publié</span>
                      @elseif($product->status == "unpublished")
                      <span class="badge badge-secondary">non publié</span>
                      @elseif($product->status == "banned")
                      <span class="badge badge-danger">refuser par admin</span>
                      @endif
                    </td>
                    <td>
                      {{$product->created_at}}
                    </td>
                    <td>
                      <a href="#" class="mx-1"><i class="fas fa-edit"></i></a>
                    </td>
                  </tr>


                  @endforeach


                </tbody>
                <tfoot>
                  <tr>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">#</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nom</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Prix</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ventes</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Statut</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date d'ajout</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Options</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        {{$products->links()}}
      </div>
     
      <!-- /.card-body -->
    </div>
    @if(in_array( "products.create", json_decode(Auth::user()->Role->permissions)))
        <div class=" d-flex justify-content-end p-2">
        <a href="{{ route('vondeur.products.create')}}" class="btn bg-gradient-primary btn-sm ">ajouter un produit</a>
        </div>
        @endif
  </div>
  <!-- /.card -->
</section>

<!-- modals for categories -->
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