<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- jQuery -->
    <script src="{{asset('bootstrap_ecom/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{asset('bootstrap_ecom/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('bootstrap_ecom/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Fonticons -->
    <link href="{{asset('bootstrap_ecom/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('bootstrap_ecom/fonts/feathericons/css/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('bootstrap_ecom/fonts/material-icons/css/materialdesignicons.css')}}" rel="stylesheet" type="text/css" />

    <!-- custom style -->
    <link href="{{asset('bootstrap_ecom/css/ui.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('bootstrap_ecom/css/responsive.css')}}" rel="stylesheet" />

    <!-- custom javascript -->
    <script src="{{asset('bootstrap_ecom/js/script.js')}}" type="text/javascript"></script>
    <style>
        html, body {
  height: 100%;
}

#wrap {
  min-height: 100%;
}

#main {
  overflow:auto;
  padding-bottom:410px; /* this needs to be bigger than footer height*/
}

.footer {
  position: relative;
  margin-top: -396px; /* negative value of footer height */
  height: 396px;
  clear:both;
  padding-top:20px;
} 
    </style>
    @yield('head')
</head>
<body>
    <div id="wrap">
        <div id="main" class="container clear-top">
            @yield('content')
        </div>
    </div>
    @extends('layouts.footer')
    @yield('script')

</body>
</html>