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
                    <td>
                        <form action="{{ route('users.change_Role')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <select onchange="this.form.submit()" class="form-control" name="role">
                            @foreach($Roles as $key=>$role)
                            <option @if($user->Role->id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('users.edit',encrypt($user->id))}}"  class="mx-1" ><i class="fas fa-user-edit"></i></a>
                        @if(Auth::user()->id != $user->id)
                        <a href="{{ route('users.login',encrypt($user->id))}}" class="mx-1"  ><i class="fas fa-sign-in-alt"></i></a>
                        @endif
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