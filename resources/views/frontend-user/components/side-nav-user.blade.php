<aside class="bg-white rounded border border-border-200 overflow-hidden flex-shrink-0 hidden xl:block xl:w-80 mr-8">
      <ul class="py-8">
         <li class="py-2"><a class="block py-2 px-10 font-semibold text-heading @if(Route::currentRouteName()== 'myprofil') border-l-4 border-transparent border-green-600 text-green-600 @endif hover:text-green-600 focus:text-green-600  " href="{{route('myprofil',['language'=>app()->getLocale()])}}">Profile</a></li>
         <li class="py-2"><a class="block py-2 px-10 font-semibold text-heading @if(Route::currentRouteName()== 'users.update.password') border-l-4 border-transparent border-green-600 text-green-600 @endif hover:text-green-600 focus:text-green-600" href="{{route('users.update.password',['language'=>app()->getLocale()])}}">Change Password</a></li>
         <li class="py-2"><a class="block py-2 px-10 font-semibold text-heading @if(Route::currentRouteName()== 'users.orders') border-l-4 border-transparent border-green-600 text-green-600 @endif hover:text-green-600 focus:text-green-600" href="{{route('users.orders',['language'=>app()->getLocale()])}}">My Orders</a></li>
         
      </ul>
      <ul class="bg-white border-t border-border-200 py-4">
         <li class="py-2"><a class="block py-2 px-10 font-semibold text-heading hover:text-green-600 focus:text-green-600" href="{{route('logout',['language'=>app()->getLocale()])}}">Logout</a></li>
      </ul>
</aside>