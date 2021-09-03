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
      <h3 class="card-title">PRODUITS</h3>
      <div class="d-flex  row">
        <form class="mx-2" action="{{ route('products.index,app()->getLocale()') }}" method="get">
          @csrf
          <div class="d-flex justify-content-end">
            <select name="status" class="form-control mr-1" id="">
              <option>filtrer Des produit</option>
              <option value="new">En attente</option>
              <option value="published">Publié</option>
              <option value="unpublished">Non Publié</option>
              <option value="draft">Brouillon</option>
              <option value="banned">Refusé</option>
            </select>
            <select name="confirmation" class="form-control mr-1" id="">
              <option>filtrer Des produit</option>
              <option value="1">Confirmé</option>
              <option value="0">Non confirmé</option>
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
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Confirmation</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Date d'ajout</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">magasin</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td >
                      @foreach($product->Images()->get() as $image)
                      @if($image->is_main == 1)
                      <img style="border-radius: 4px;" src="{{'/storage/'.$image->path}}"  width="50" alt="{{$product->name}}">
                      @endif
                      @endforeach
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->prix}}</td>
                    <td>0</td>
                    <td>
                      <form action="{{ route('admin.products.admin_update_status,app()->getLocale()')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <input type="hidden" name="product_id" value="{{encrypt($product->id)}}">
                          <select onchange="this.form.submit()" name="status" class="form-control" style="width: fit-content;padding-right: 25px;">
                            <option value="new" @if($product->status == "new") selected @endif >En attente</option>
                            <option value="published" @if($product->status == "published") selected @endif >publié</option>
                            <option value="unpublished" @if($product->status == "unpublished") selected @endif >non publié</option>
                            <option value="draft" @if($product->status == "draft") selected @endif >incomplet</option>
                            <option value="banned" @if($product->status == "banned") selected @endif >refusé</option>
                          </select>
                        </div>
                      </form>
                    </td>
                    <td>
                      <form action="{{ route('admin.products.admin_update_confirmation_product,app()->getLocale()')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <input type="hidden" name="product_id" value="{{encrypt($product->id)}}">
                          <select onchange="this.form.submit()" name="confermed" class="form-control" style="width: fit-content;padding-right: 25px;">
                            <option value="1" @if($product->confermed == 1) selected @endif >confirmé</option>
                            <option value="0" @if($product->confermed == 0) selected @endif >non confirmé</option>
                          </select> 
                        </div>
                      </form>
                    </td>
                    <td>
                      {{$product->created_at}}
                    </td>
                    <td>
                      <a href="">
                        {{$product->Shop()->first()->name}}
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('admin.products.edit',app()->getLocale(),encrypt($product->id)) }}" class="mx-1"><i class="fas fa-edit"></i></a>
                      <span class="mx-1 cursor-pointer" data-toggle="modal" data-target="{{'#model_delete'.$product->id}}">
                        <i class="fas fa-trash-alt text-danger"></i>
                      </span>                    </td>
                  </tr>
                  @endforeach


                </tbody>
                
              </table>
              <div class="d-flex justify-content-end">
              {{
                $products->links();
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

<!-- modals for products to delet  -->

@foreach($products as $product)
<div class="modal fade" id="{{'model_delete'.$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerte de suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        êtes-vous sûr de vouloir supprimer le produit <strong>{{$product->name}}</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <form action="{{ route('admin.products.delete,app()->getLocale()')}}" method="post">
          @csrf
          <input type="hidden" name="product_id" value="{{encrypt($product->id)}}">
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach 
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

      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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