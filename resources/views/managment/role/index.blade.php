@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Roles</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 10%">
                    #
                </th>
                <th style="width: 30%">
                    Role Name
                </th>
                <th style="width: 30%">
                    Number user with this role
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
                    <td>{{$role->name}}</td>
                    <td>{{$role->name}}</td>
                    
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