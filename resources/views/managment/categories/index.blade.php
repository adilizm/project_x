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
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th> #</th>
                <th>l'image</th>
                <th>la catégorie </th>
                <th>description</th>
                <th>option</th>
            </tr>
        </thead>
        
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
@stop

@section('managment_script')

@stop