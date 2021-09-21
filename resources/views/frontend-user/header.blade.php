<header class=" h-14 md:h-16 lg:h-22 sticky top-0 bg-white w-full z-50 border-b border-border-200 shadow-sm">
         <div
            class="flex justify-between items-center w-full h-14 md:h-16 lg:h-22 container mx-auto  py-5">
            <div class="flex items-center w-full lg:w-auto"><a class="inline-flex mx-auto lg:mx-0" href="/"><span
                     class="overflow-hidden relative w-32 md:w-40 h-10">
                     <div>
                        <img alt="Pickbazar" sizes="100vw" src="{{asset('/images/logo/PickBazar.png')}}">
                     </div>
                  </span></a></div>
            <div class="hidden lg:block w-full xl:w-11/12 2xl:w-10/12 mx-auto px-10 ">
               <form class="w-full relative">
                  <div class="rounded md:rounded-lg flex relative h-11 md:h-12">
                      <label for="grocery search at header" class="sr-only">konly search at header</label>
                      <input  type="text" onkeyup="search_typing()" id="search"
                        autocomplete="off"
                        class="w-full h-full flex item-center appearance-none transition duration-300 ease-in-out text-heading text-md placeholder-gray-500 overflow-hidden rounded-lg focus:outline-none focus:ring-0 bg-gray-100 pl-10 pr-12 md:pl-14 border border-border-200 focus:border-green-600 focus:bg-white"
                        name="search" placeholder="Search your products from here" value=""><button
                        class="h-full w-10 md:w-14 flex items-center justify-center absolute left-0 text-gray-500 transition-colors duration-200 focus:outline-none hover:text-green-600-hover focus:text-green-600-hover"><span
                           class="sr-only">Search</span><svg viewBox="0 0 17.048 18" class="w-3.5 h-3.5 md:w-4 md:h-4">
                           <path
                              d="M380.321,383.992l3.225,3.218c.167.167.341.329.5.506a.894.894,0,1,1-1.286,1.238c-1.087-1.067-2.179-2.131-3.227-3.236a.924.924,0,0,0-1.325-.222,7.509,7.509,0,1,1-3.3-14.207,7.532,7.532,0,0,1,6,11.936C380.736,383.462,380.552,383.685,380.321,383.992Zm-5.537.521a5.707,5.707,0,1,0-5.675-5.72A5.675,5.675,0,0,0,374.784,384.513Z"
                              transform="translate(-367.297 -371.285)" fill="currentColor"></path>
                        </svg></button>
                </div>
                <div class="absolute bg-white w-full  rounded-b" id="search_result">
                   
                </div>
               </form>
            </div>
            
            <ul class="hidden lg:flex items-center flex-shrink-0 space-x-10">

               <li>
                  <!-- dropdown -->
                  <div class="relative">
                     <img src="{{asset('/images/nav/shopping-cart.svg')}}" alt="" srcset="" class="img-responsive w-7" onClick="toggleDropCart()"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        <div id="pol-cart"
                        class="hidden origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                           <svg class="feather feather-frown text-gray-800 mx-auto my-2" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" ><circle cx="12" cy="12" r="10"/><path d="M16 16s-1.5-2-4-2-4 2-4 2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>                        </div>
                              <p class="text-center text-gray-800 my-2">Votre Panier Est Vide</p>
                        </div>
                  </div>
                  <!-- end dropdown -->
               </li>
               <li>
                  <!-- dropdown -->
                  <div class="relative">
                     <img src="{{asset('/images/nav/user.svg')}}" alt="" srcset="" class="img-responsive w-7"
                        onClick="toggleDropUser()" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        <div id="pol-user"
                        class="hidden origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="text-gray-700 px-4" role="none">
                            @auth
                            <a class="py-1 block" href="{{ route('myprofil',app()->getLocale())}}"> Mon profil </a>
                            <a class="py-1 block" href="{{ route('panier',app()->getLocale())}}"> Ma carte </a>
                  @if(Auth::user()->role_id == 1)
                  <a class="py-1 block" href="{{ route('managment.index',app()->getLocale())}}"> Admin managment </a>
                  @elseif(Auth::user()->role_id == 2)
                  <a class="py-1 block" href="#"> {{ translate('manager managment')}} </a>
                  @elseif(Auth::user()->role_id == 3)
                  <a class="py-1 block" href="{{ route('managment.index',app()->getLocale()) }}"> vendor managment </a>
                  @elseif(Auth::user()->role_id == 4)
                    @if(Auth::user()->Livreur()->first()->is_active == 1 && Auth::user()->Livreur()->first()->is_confirmed == 1 )
                      <a class="py-1 block" href="#">livreur managment </a>
                    @else
                      <a class="py-1 block" href="#">livreur not active</a>
                    @endif
                    @endif
                  
                    <form method="POST" action="{{ route('logout',app()->getLocale()) }}">
                      @csrf
                      <a class="py-1 block" :href="route('logout',app()->getLocale())" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                      </a>
                    </form>
                  @else
             
                    {{-- <a href="{{ route('login',app()->getLocale()) }}" class="py-1 block">Connectez-vous</a> --}}
                    <button onclick="showModelLogin()" class="py-1 block">Connectez-vous</button>
                    
                    {{-- <a href="{{ route('register',app()->getLocale()) }}" class="py-1 block">Créer un compte</a> --}}
                    <a onclick="showModelRegister()" class="py-1 block">Créer un compte</a>
               
                @endauth
                        </div>
                     </div>
                  </div>
                  <!-- end dropdown -->
               </li>
            </ul>
         </div>
      </header>
<div class="visible lg:hidden h-12 md:h-14">
         <nav
            class="h-12 md:h-14 w-full py-1.5 px-2 flex justify-between fixed start-0 bottom-0 z-10 bg-white shadow-400">
            <button class="flex p-2 h-full items-center justify-center focus:outline-none focus:text-green-600"><span
                  class="sr-only">Burger Menu</span><svg width="25.567" height="18" viewBox="0 0 25.567 18"
                  class="false">
                  <g transform="translate(-776 -462)">
                     <rect width="12.749" height="2.499" rx="1.25" transform="translate(776 462)" fill="currentColor">
                     </rect>
                     <rect width="25.567" height="2.499" rx="1.25" transform="translate(776 469.75)"
                        fill="currentColor"></rect>
                     <rect width="17.972" height="2.499" rx="1.25" transform="translate(776 477.501)"
                        fill="currentColor"></rect>
                  </g>
               </svg></button><button
               class="flex p-2 h-full items-center justify-center focus:outline-none focus:text-green-600"><span
                  class="sr-only">Home</span><svg width="17.996" height="20.442" viewBox="0 0 17.996 20.442">
                  <g transform="translate(-30.619 0.236)">
                     <path
                        d="M48.187,7.823,39.851.182A.7.7,0,0,0,38.9.2L31.03,7.841a.7.7,0,0,0-.211.5V19.311a.694.694,0,0,0,.694.694H37.3A.694.694,0,0,0,38,19.311V14.217h3.242v5.095a.694.694,0,0,0,.694.694h5.789a.694.694,0,0,0,.694-.694V8.335a.7.7,0,0,0-.228-.512ZM47.023,18.617h-4.4V13.522a.694.694,0,0,0-.694-.694H37.3a.694.694,0,0,0-.694.694v5.095H32.2V8.63l7.192-6.98L47.02,8.642v9.975Z"
                        transform="translate(0 0)" fill="currentColor" stroke="currentColor" stroke-width="0.4"></path>
                  </g>
               </svg></button><button
               class="flex p-2 product-cart h-full relative items-center justify-center focus:outline-none focus:text-green-600"><span
                  class="sr-only">Cart</span><svg width="18" height="18" viewBox="0 0 18 18">
                  <g transform="translate(-127 -122)">
                     <path
                        d="M4.7,3.8H17.3a.9.9,0,0,1,.9.9V17.3a.9.9,0,0,1-.9.9H4.7a.9.9,0,0,1-.9-.9V4.7A.9.9,0,0,1,4.7,3.8ZM2,4.7A2.7,2.7,0,0,1,4.7,2H17.3A2.7,2.7,0,0,1,20,4.7V17.3A2.7,2.7,0,0,1,17.3,20H4.7A2.7,2.7,0,0,1,2,17.3ZM11,11C8.515,11,6.5,8.583,6.5,5.6H8.3c0,2.309,1.5,3.6,2.7,3.6s2.7-1.291,2.7-3.6h1.8C15.5,8.583,13.485,11,11,11Z"
                        transform="translate(125 120)" fill="currentColor" fill-rule="evenodd"></path>
                  </g>
               </svg><span
                  class="bg-green-600 py-1 px-1.5 text-10px leading-none font-semibold text-white rounded-full absolute top-0 end-0 mt-0.5 -mr-0.5">8</span></button><button
               class="flex p-2 h-full items-center justify-center focus:outline-none focus:text-green-600"><span
                  class="sr-only">User</span><svg width="16.577" height="18.6" viewBox="0 0 16.577 18.6">
                  <g transform="translate(-95.7 -121.203)">
                     <path
                        d="M-7722.37,2933a.63.63,0,0,1-.63-.63c0-4.424,2.837-6.862,7.989-6.862s7.989,2.438,7.989,6.862a.629.629,0,0,1-.63.63Zm.647-1.251h13.428c-.246-3.31-2.5-4.986-6.713-4.986s-6.471,1.673-6.714,4.986Zm2.564-12.518a4.1,4.1,0,0,1,1.172-3,4.1,4.1,0,0,1,2.979-1.229,4.1,4.1,0,0,1,2.979,1.229,4.1,4.1,0,0,1,1.171,3,4.341,4.341,0,0,1-4.149,4.5,4.344,4.344,0,0,1-4.16-4.5Zm1.251,0a3.1,3.1,0,0,0,2.9,3.254,3.094,3.094,0,0,0,2.9-3.253,2.878,2.878,0,0,0-.813-2.109,2.88,2.88,0,0,0-2.085-.872,2.843,2.843,0,0,0-2.1.856,2.841,2.841,0,0,0-.806,2.122Z"
                        transform="translate(7819 -2793.5)" fill="currentColor" stroke="currentColor"
                        stroke-width="0.6"></path>
                  </g>
               </svg></button>
         </nav>
</div>
 @include('frontend-user.components.login-model')
  @include('frontend-user.components.register-model')
      <script>
               function toggleDropUser() {
         document.getElementById('pol-user').style.display = 'block';
      }
      function toggleDropCart() {
         document.getElementById('pol-cart').style.display = 'block';
      }
     window.addEventListener('mouseup', function (event) {
         var polUser = document.getElementById('pol-user');
         var polCart = document.getElementById('pol-cart');
         if (event.target != polUser && event.target.parentNode != polUser) {
            polUser.style.display = 'none';
         }
         if (event.target != polCart && event.target.parentNode != polCart) {
            polCart.style.display = 'none';
         }
      });

        function search() {
    axios.post('{{route('search',app()->getlocale())}}', {
        params: {
          keyword:document.getElementById('search').value,
        }
      }).then(function(responce) {
        if(responce.data == '0'){
          document.getElementById('search_result').innerHTML = null;
          console.log('null');
        }else {
           document.getElementById('search_result').innerHTML =responce.data;
     

        }
    }).catch(function(err) {
      console.log(err);
    })
  }

  function search_typing() {
     console.log(document.getElementById('search'));
     var keyword=document.getElementById('search').value;
     document.getElementById('search_result').innerHTML ='';
     if(keyword.length >2){
       search();
     }
    
  }
    
      </script>