@extends('managment.managment_master')

@section('managment_head')

@stop

@section('managment_content')
<section class="content">
<!-- Default box -->
<div class="card">
  <div class="p-3 d-flex justify-content-between border-bottom">
    <h3 class="card-title">Edition Utilisateurs</h3>
    @if($user->is_banned == 1)
    <span class="badge badge-danger">banned user </span>
    @else
    <span class="badge badge-success">Active user </span>
    @endif
  </div>
  <div class="card-body p-0">
 <form action="{{ route('users.update',app()->getLocale()) }}" method="post" class="p-3">
     @csrf
     <input type="hidden" name="user_id" value="{{encrypt($user->id)}}">
     <div class="row px-3">
         <div class="col-12 col-md-6 form-group">
            <label for="">Nom</label>
             <input class="form-control" type="text" name="name" value="{{$user->name}}">
         </div>
         <div class="col-12 col-md-6">
            <label for="">Téléphone</label>
             <input class="form-control" type="text" name="phone" value="{{$user->phone}}">
         </div>
     </div>
     <div class="row px-3">
         <div class="col-12 col-md-6 form-group">
             <label for="">Email</label>
             <input class="form-control" type="text" name="email" value="{{$user->email}}">
         </div>
         <div class="col-12 col-md-6">
         <label for="">Role</label>
            <select class="form-control" name="role" id="">
                @foreach($roles as $role)
                <option value="{{$role->id}}" @if($role->id == $user->role_id) selected @endif >{{$role->name}}</option>
                @endforeach
            </select>
         </div>
     </div>
     <div class="row px-3">
         <div class="col-12 col-md-6">
         <label for="">Situation</label>
            <select class="form-control" name="is_banned" id="">
                <option value="1" @if($user->is_banned == 1) selected @endif >utilisateur banni</option>
                <option value="0" @if($user->is_banned == 0) selected @endif >utilisateur active</option>
            </select>
         </div>
     </div>
     <div class="d-flex justify-content-end px-3">
         <button class="btn btn-primary" type="submit">mise a jour</button>
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