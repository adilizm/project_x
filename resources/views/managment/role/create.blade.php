@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">Roles</h3>
    <div class=" w-100 float-right">
        <a href="{{ route('roles.create')}}" class="btn bg-gradient-primary btn-sm float-right">ajouter un role</a>
    </div>
  </div>
  <div class="card-body p-0">
    <form action="{{ route('roles.store')}}" method="post" class="p-3">
        @csrf
        <div class="form-group">
          <label for="name">nom de rôle</label>
          <input type="text" class="form-control" id="name" name="name" required placeholder="nom de rôle">
        </div>
        <div class="row">
        @foreach($auths as $auth)
        <div class="form-group col-sm-12 col-md-6 ">
            <label for="name">{{ $auth->name}}</label>
            @foreach($auth->childs as $child)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="permissions[]" value={{ $child->autorisation_key }} >
                <label class="form-check-label" >{{ $child->autorisation_description }}</label>
            </div>
            @endforeach
        </div>
        @endforeach
        </div>
        <div class=" w-100 float-right">
            <button type="submit" class="btn bg-gradient-primary btn-sm float-right">ajouter un role</a>
        </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
@stop

@section('managment_script')

@stop