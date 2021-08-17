@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header d-flex">
    <h3 class="card-title">Utilisateurs</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th >
                    #
                </th>
                <th >
                Nom d'utilisateur
                </th>
                <th >
                numéro de téléphone
                </th>
                <th >
                email
                </th>
                <th >
                rôle
                </th>
                <th >
                Options
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->Role->name}}</td>
                    <td>
                        <a href="#" class="mx-1" ><i class="fas fa-user-edit"></i></a>
                        <a href="#" class="mx-1"  ><i class="fas fa-sign-in-alt"></i></a>
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