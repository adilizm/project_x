@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">
@include('managment.layout.flash_messages')
<!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">Roles</h3>
    <div class=" w-100 float-right">
        <a href="{{ route('roles.create')}}" class="btn bg-gradient-primary btn-sm float-right">ajouter un role</a>
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
                <th style="width: 30%">
                   option
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach( $roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->number_user_with_that_role}}</td>
                    <td>
                        <a href="{{ route('roles.edit', encrypt($role->id))}}" class="mx-1" ><i class="fas fa-edit"></i></a>
                        <a href="{{ route('roles.destroy',encrypt($role->id) )}}" class="mx-1"  ><i class="fas fa-trash-alt"></i></a>
                    </td>
                    
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