@extends('master')

@section('head')
<title>Ecom local</title>
@stop

@section('content')
<header class="section-header">
    <nav class="navbar navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="bootstrap_ecom/images/logo.png" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#"> Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> About </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> Solutions </a></li>

                </ul>
                @auth <a href="#" class="ml-md-3 btn btn-primary">My cart (2)</a> @endauth
                <ul class="navbar-nav">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> {{ Auth::user()->name}} </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a class="dropdown-item" href="#"> Mon profil </a></li>
                            <li><a class="dropdown-item" href="#"> Ma carte </a></li>
                            @if(Auth::user()->role_id == 1)
                            <li><a class="dropdown-item" href="#"> Admin managment  </a></li>
                            @elseif(Auth::user()->role_id == 2)
                            <li><a class="dropdown-item" href="#"> manager managment  </a></li>
                            @elseif(Auth::user()->role_id == 3)
                            <li><a class="dropdown-item" href="#"> vendor managment  </a></li>
                            @elseif(Auth::user()->role_id == 4)
                            <li><a class="dropdown-item" href="#"> livreur managment  </a></li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}" >
                                    @csrf
                                    <x-dropdown-link class="dropdown-item" :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form></li>
                        </ul>
                    </li>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                    @endauth

                </ul>
            </div> <!-- navbar-collapse.// -->
        </div> <!-- container.// -->
    </nav>
</header>
@stop

@section('script')
<script>

</script>
@stop