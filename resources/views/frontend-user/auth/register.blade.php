
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
   <p class="text-center text-sm md:text-base leading-relaxed px-2 sm:px-0 text-gray-500 mt-4 sm:mt-5 mb-7 sm:mb-10">By signing up, you agree to our<span class="mx-1 underline cursor-pointer text-green-600 hover:no-underline">terms</span>&amp;<span class="ml-1 underline cursor-pointer text-green-600 hover:no-underline">policy</span></p>
   <form novalidate="">
      <div class="mb-5"><label for="name" class="block text-gray-500 font-semibold text-sm leading-none mb-3">Name</label><input id="name" name="name" type="text" class="px-4 flex items-center w-full appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base rounded focus:border-green-600 h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false"></div>
      <div class="mb-5"><label for="email" class="block text-gray-500 font-semibold text-sm leading-none mb-3">Email</label><input id="email" name="email" type="email" class="px-4 flex items-center w-full appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base rounded focus:border-green-600 h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false"></div>
      <div class="mb-5">
         <div class="flex items-center justify-between mb-2"><label for="password" class="font-semibold text-sm text-gray-500">Password</label></div>
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
      <div class="mt-8"><button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-green-700 bg-green-600 text-white border border-transparent hover:bg-green-hover px-5 py-0 h-12 w-full h-12">Register</button></div>
   </form>
   <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8">
      <hr class="w-full">
      <span class="absolute start-2/4 -top-2.5 px-2 -ml-4 bg-white">Or</span>
   </div>
   <div class="text-sm sm:text-base text-gray-500 text-center">Already have an account? <button class="ml-1 underline text-green-600 font-semibold transition-colors duration-200 focus:outline-none hover:text-green-hover focus:text-green-hover hover:no-underline focus:no-underline">Login</button></div>
</div>
</div>
@endsection