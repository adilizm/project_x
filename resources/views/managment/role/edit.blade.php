@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">modification du role {{ $role->name}}</h3>
  </div>
  <div class="card-body p-0">
    <form action="{{ route('roles.update',['language'=>app()->getLocale(),'id'=>encrypt($role->id)])}}" method="post" class="p-3">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">nom de rôle</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}" required placeholder="nom de rôle">
        </div>
        @foreach($auths as $auth)
        <div class="form-group">
            <label for="name">{{ $auth->name}}</label>
            @foreach($auth->childs as $child)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" @if(in_array($child->autorisation_key,json_decode($role->permissions))) checked  @endif  name="permissions[]" value={{ $child->autorisation_key }} id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">{{ $child->autorisation_description }}</label>
            </div>
            @endforeach
        </div>
        @endforeach
        <div class=" w-100 float-right">
            <button type="submit" class="btn bg-gradient-primary btn-sm float-right">modifier le role</a>
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