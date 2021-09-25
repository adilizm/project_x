@extends('frontend-user.app')
@section('home')


<div class="bg-gray-100 flex flex-col xl:flex-row items-start max-w-1920 w-full mx-auto py-10 px-5 xl:py-14 xl:px-8 2xl:px-14">
  @include('frontend-user.components.side-nav-user')
   @yield('user-section')
</div>


@endsection