<!DOCTYPE html>
@php
$language = \App\Models\Language::where('key',app()->getLocale())->first();
@endphp

<html lang="{{ $language->key }} " @if($language->rtl == 1) dir="rtl" @endif >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="application/json" />
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="/images/apple-icon-180.png">
    <link rel="manifest" href="/manifest.json">
    <!-- jQuery -->
    <script src="{{asset('bootstrap_ecom/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{asset('bootstrap_ecom/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('bootstrap_ecom/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />

    <!-- Fonticons -->
    <link href="{{asset('bootstrap_ecom/fonts/fontawesome/css/all.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('bootstrap_ecom/fonts/feathericons/css/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('bootstrap_ecom/fonts/material-icons/css/materialdesignicons.css')}}" rel="stylesheet" type="text/css" />

    <!-- custom style -->
    <link href="{{asset('bootstrap_ecom/css/ui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('bootstrap_ecom/css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" />

    <!-- custom javascript -->
    <script src="{{asset('bootstrap_ecom/js/script.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    @yield('head')

</head>

<body>
    <div id="wrap">
        <div id="main" class="container clear-top">
            @yield('content')
        </div>
    </div>
    @yield('footer')
    @yield('script')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
         const pwaTrackingListeners = () => {
  const fireAddToHomeScreenImpression = event => {
    fireTracking("Add to homescreen shown");
    //will not work for chrome, untill fixed
    event.userChoice.then(choiceResult => {
      fireTracking(`User clicked ${choiceResult}`);
    });
    //This is to prevent `beforeinstallprompt` event that triggers again on `Add` or `Cancel` click
    window.removeEventListener(
      "beforeinstallprompt",
      fireAddToHomeScreenImpression
    );
  };
  window.addEventListener("beforeinstallprompt", fireAddToHomeScreenImpression);
  
  //Track web app install by user
  window.addEventListener("appinstalled", event => {
    fireTracking("PWA app installed by user!!! Hurray");
  });

  //Track from where your web app has been opened/browsed
  window.addEventListener("load", () => {
    let trackText;
    if (navigator && navigator.standalone) {
      trackText = "Launched: Installed (iOS)";
    } else if (matchMedia("(display-mode: standalone)").matches) {
      trackText = "Launched: Installed";
    } else {
      trackText = "Launched: Browser Tab";
    }
    fireTracking(track);
  });
};
    </script>
</body>

</html>