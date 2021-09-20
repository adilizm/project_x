@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">
<!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">LES RÔLES</h3>
    <div class=" w-100 float-right">
        <a href="{{ route('roles.create',app()->getLocale())}}" class="btn bg-primary btn-sm float-right">ajouter un role</a>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 10%">
                    #
                </th>
                <th style="width: 30%">
                le Rôle
                </th>
                <th style="width: 30%">
                Numéro d'utilisateur avec ce rôle
                </th>
                @if(in_array("role.edit", json_decode(Auth::user()->Role->permissions)))
                <th style="width: 30%">
                   option
                </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach( $roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->number_user_with_that_role}}</td>
                    @if(in_array("role.edit", json_decode(Auth::user()->Role->permissions)) ||in_array("role.destroy", json_decode(Auth::user()->Role->permissions)))
                    <td>
                        @if(in_array("role.edit", json_decode(Auth::user()->Role->permissions)))
                            <a href="{{ route('roles.edit',['language'=>app()->getLocale(),'id'=>encrypt($role->id)] )}}" class="mx-1" ><i class="fas fa-edit"></i></a>
                        @endif
                        @if(in_array("role.destroy", json_decode(Auth::user()->Role->permissions)))
                            <a href="{{ route('roles.destroy',['language'=>app()->getLocale(),'id'=>encrypt($role->id)] )}}" class="mx-1"  ><i class="fas fa-trash-alt"></i></a>
                        @endif
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
@stop

@section('managment_script')

@stop