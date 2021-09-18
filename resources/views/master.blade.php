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
            <button class="btn btn-primary d-none" id="buttonInstall">install app</button>
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
        let deferredPrompt;
        buttonInstall=  document.getElementById('buttonInstall');
window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent the mini-infobar from appearing on mobile
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  // Update UI notify the user they can install the PWA
  showInstallPromotion();
  // Optionally, send analytics event that PWA install promo was shown.
  console.log(`'beforeinstallprompt' event was fired.`);
});
 function showInstallPromotion(){
    buttonInstall.classList.remove('d-none')
    buttonInstall.classList.add('d-block')
 }
 buttonInstall.addEventListener('click', async () => {
  // Hide the app provided install promotion
  hideInstallPromotion();
  // Show the install prompt
  deferredPrompt.prompt();
  // Wait for the user to respond to the prompt
  const { outcome } = await deferredPrompt.userChoice;
  // Optionally, send analytics event with outcome of user choice
  console.log(`User response to the install prompt: ${outcome}`);
  // We've used the prompt, and can't use it again, throw it away
  deferredPrompt = null;
});
function hideInstallPromotion(){
    buttonInstall.classList.remove('d-block')
    buttonInstall.classList.add('d-none')
}
window.addEventListener('appinstalled', () => {
  // Hide the app-provided install promotion
  hideInstallPromotion();
  // Clear the deferredPrompt so it can be garbage collected
  deferredPrompt = null;
  // Optionally, send analytics event to indicate successful install
  console.log('PWA was installed');
});
    </script>
</body>

</html>