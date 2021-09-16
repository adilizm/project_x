<header class=" h-14 md:h-16 lg:h-22">
         <div
            class="flex justify-between items-center w-full h-14 md:h-16 lg:h-22 md:px-10 lg:px-22 xl:px-40  py-5 z-50 fixed bg-white border-b border-border-200 shadow-sm transition-transform duration-300">
            <div class="flex items-center w-full lg:w-auto"><a class="inline-flex mx-auto lg:mx-0" href="/"><span
                     class="overflow-hidden relative w-32 md:w-40 h-10">
                     <div>
                        <img alt="Pickbazar" sizes="100vw" src="{{asset('/images/logo/PickBazar.png')}}">
                     </div>
                  </span></a></div>
            <div class="hidden lg:block w-full xl:w-11/12 2xl:w-10/12 mx-auto px-10 overflow-hidden">
               <form class="w-full">
                  <div class="rounded md:rounded-lg flex relative h-11 md:h-12"><label for="grocery search at header"
                        class="sr-only">grocery search at header</label><input id="grocery search at header" type="text"
                        autocomplete="off"
                        class="w-full h-full flex item-center appearance-none transition duration-300 ease-in-out text-heading text-sm placeholder-gray-500 overflow-hidden rounded-lg focus:outline-none focus:ring-0 bg-gray-100 pl-10 pr-12 md:pl-14 border border-border-200 focus:border-green-600 focus:bg-white"
                        name="search" placeholder="Search your products from here" value=""><button
                        class="h-full w-10 md:w-14 flex items-center justify-center absolute left-0 text-gray-500 transition-colors duration-200 focus:outline-none hover:text-green-600-hover focus:text-green-600-hover"><span
                           class="sr-only">Search</span><svg viewBox="0 0 17.048 18" class="w-3.5 h-3.5 md:w-4 md:h-4">
                           <path
                              d="M380.321,383.992l3.225,3.218c.167.167.341.329.5.506a.894.894,0,1,1-1.286,1.238c-1.087-1.067-2.179-2.131-3.227-3.236a.924.924,0,0,0-1.325-.222,7.509,7.509,0,1,1-3.3-14.207,7.532,7.532,0,0,1,6,11.936C380.736,383.462,380.552,383.685,380.321,383.992Zm-5.537.521a5.707,5.707,0,1,0-5.675-5.72A5.675,5.675,0,0,0,374.784,384.513Z"
                              transform="translate(-367.297 -371.285)" fill="currentColor"></path>
                        </svg></button></div>
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
                        <div class="py-1" role="none">
                           <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                           <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                              id="menu-item-0">Créer un compte</a>
                           <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                              id="menu-item-1">Se connecter</a>
                           <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                              id="menu-item-2">Mon compte</a>
                           <form method="POST" action="#" role="none">
                              <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm"
                                 role="menuitem" tabindex="-1" id="menu-item-3">
                                 Se deconnecter
                              </button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- end dropdown -->
               </li>
            </ul>
         </div>
      </header>