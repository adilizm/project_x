
@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header d-flex">
      <h3 class="card-title">Pages</h3>
    </div>
    <div class="card">
      <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                  <th>page</th>
                  <th>option</th>
                </tr>
                </thead>
                <tbody>
                 <tr>
                     <td>
                        <a href="/" target="_blank">Page d'accueil</a>
                     </td>
                     <td>
                     <a href="{{ route('website.management.edit_home_page',app()->getLocale()) }}" class="mx-1"  ><i class="fas fa-user-edit"></i></a>
                     </td>
                 </tr>
                 <tr>
                     <td>
                        <a href="#">Politique de Confidentialité</a>
                     </td>
                     <td>
                     <a href="#" class="mx-1"  ><i class="fas fa-user-edit"></i></a>
                     </td>
                 </tr>
                 <tr>
                     <td>
                        <a href="#">Politique de retour</a>
                     </td>
                     <td>
                     <a href="#" class="mx-1"  ><i class="fas fa-user-edit"></i></a>
                     </td>
                 </tr>
                 <tr>
                     <td>
                        <a href="#">Acheter sur Project_X</a>
                     </td>
                     <td>
                     <a href="#" class="mx-1"  ><i class="fas fa-user-edit"></i></a>
                     </td>
                 </tr>
           

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

@stop