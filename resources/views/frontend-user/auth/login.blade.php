
@extends('frontend-user.auth.master')
@section('body')
<div class="flex w-full justify-center py-5 md:py-8 relative">
  
   <div class="py-6 px-5 sm:p-8 bg-white w-screen md:max-w-lg min-h-screen md:min-h-0 h-full md:h-auto flex flex-col justify-center md:rounded-xl">
      <div class="flex justify-center">
         <a class="inline-flex" href="/">
            <span class="overflow-hidden relative w-32 md:w-40 h-40">
               <div >
               <img src="{{asset('/images/logo/konly-logo.svg')}}" alt="" srcset="">
                </div>
            </span>
         </a>
      </div>
      <p class="text-center text-sm md:text-base text-gray-500 mt-4 sm:mt-5 mb-8 sm:mb-10">Login with your email &amp; password</p>
      <form novalidate="">
         <div class="mb-5"><label for="email" class="block text-gray-500 font-semibold text-sm leading-none mb-3">Email</label><input id="email" name="email" type="email" class="px-4 flex items-center w-full appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base rounded focus:border-green-600 h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false"></div>
         <div class="mb-5">
            <div class="flex items-center justify-between mb-2"><label for="password" class="font-semibold text-sm text-gray-500">Password</label><button type="button" class="text-xs text-green-600 transition-colors duration-200 focus:outline-none focus:text-green-600-700 focus:font-semibold hover:text-green-hover">Forgot password?</button></div>
            <div class="relative">
               <input id="password" name="password" type="password" class="py-3 pl-4 pr-11 w-full rounded appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base focus:border-green-600" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
               <label for="password" class="absolute right-4 top-5 -mt-2 text-gray-500 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
               </label>
            </div>
         </div>
         <div class="mt-8"><button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-green-700 bg-green-600 text-white border border-transparent hover:bg-green-600-hover px-5 py-0 h-12 w-full h-11 sm:h-12">Login</button></div>
      </form>
      <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8">
         <hr class="w-full">
         <span class="absolute left-2/4 -top-2.5 px-2 -ml-4 bg-white">Or</span>
      </div>
      <div class="grid grid-cols-1 gap-4 mt-2">
         <button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-green-700 bg-green-600 text-white border border-transparent hover:bg-green-600-hover px-5 py-0 h-12 !bg-social-google hover:!bg-social-google-hover !text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.986" height="20.39" viewBox="0 0 19.986 20.39" class="w-4 h-4 mr-3">
               <path data-name="Path 2" d="M10.195 20.39c5.883 0 9.791-4.13 9.791-9.958a8.711 8.711 0 00-.166-1.7H10.2v3.5h5.787a5.522 5.522 0 01-5.787 4.402 6.441 6.441 0 010-12.88 5.727 5.727 0 014.062 1.571l2.764-2.655A9.749 9.749 0 0010.195 0a10.195 10.195 0 000 20.39z" fill="currentColor"></path>
            </svg>
            Login with Google
         </button>
         <button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-green-700 bg-green-600 text-white border border-transparent hover:bg-green-600-hover px-5 py-0 h-12 w-full h-11 sm:h-12 !bg-gray-500 hover:!bg-gray-600 !text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.442 27.442" class="h-5 mr-2 text-white" fill="currentColor">
               <path d="M19.494 0H7.948a1.997 1.997 0 00-1.997 1.999v23.446c0 1.102.892 1.997 1.997 1.997h11.546a1.998 1.998 0 001.997-1.997V1.999A1.999 1.999 0 0019.494 0zm-8.622 1.214h5.7c.144 0 .261.215.261.481s-.117.482-.261.482h-5.7c-.145 0-.26-.216-.26-.482s.115-.481.26-.481zm2.85 24.255a1.275 1.275 0 110-2.55 1.275 1.275 0 010 2.55zm6.273-4.369H7.448V3.373h12.547V21.1z"></path>
            </svg>
            Login with Mobile number
         </button>
      </div>
      <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8">
         <hr class="w-full">
      </div>
      <div class="text-sm sm:text-base text-gray-500 text-center">Don't have any account? <button class="ml-1 underline text-green-600 font-semibold transition-colors duration-200 focus:outline-none hover:text-green-hover focus:text-green-hover hover:no-underline focus:no-underline">Register</button></div>
   </div>
</div>
@endsection