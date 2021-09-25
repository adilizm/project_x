
@extends('frontend-user.auth.master')
@section('body')
<div class="flex w-full justify-center py-5 md:py-8 relative">
   <button class="w-8 md:w-16 h-8 md:h-16 flex items-center justify-center absolute top-5 md:top-1/2 left-5 md:left-10 md:-mt-8 text-gray-200 md:text-gray-300 hover:text-gray-400 transition-colors">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 219.151 219.151" fill="currentColor">
         <path d="M109.576 219.151c60.419 0 109.573-49.156 109.573-109.576C219.149 49.156 169.995 0 109.576 0S.002 49.156.002 109.575c0 60.42 49.155 109.576 109.574 109.576zm0-204.151c52.148 0 94.573 42.426 94.574 94.575 0 52.149-42.425 94.575-94.574 94.576-52.148-.001-94.573-42.427-94.573-94.577C15.003 57.427 57.428 15 109.576 15z"></path>
         <path d="M94.861 156.507a7.502 7.502 0 0010.606 0 7.499 7.499 0 00-.001-10.608l-28.82-28.819 83.457-.008a7.5 7.5 0 00-.001-15l-83.46.008 28.827-28.825a7.5 7.5 0 00-10.607-10.608l-41.629 41.628a7.495 7.495 0 00-2.197 5.303 7.51 7.51 0 002.198 5.305l41.627 41.624z"></path>
      </svg>
   </button>
   <div class="py-6 px-5 sm:p-8 bg-white w-screen md:max-w-[480px] min-h-screen md:min-h-0 h-full md:h-auto flex flex-col justify-center md:rounded-xl">
      <div class="flex justify-center">
         <a class="inline-flex" href="/">
            <span class="overflow-hidden relative w-32 md:w-40 h-10">
               <div style="display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;"><img alt="Pickbazar" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fpickbazarlaravel.s3.ap-southeast-1.amazonaws.com%2F860%2FPickBazar.png&amp;w=3840&amp;q=75" decoding="async" data-nimg="true" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: contain;"></div>
            </span>
         </a>
      </div>
      <p class="text-center text-sm md:text-base text-body mt-4 sm:mt-5 mb-8 sm:mb-10">Login with your email &amp; password</p>
      <form novalidate="">
         <div class="mb-5"><label for="email" class="block text-body-dark font-semibold text-sm leading-none mb-3">Email</label><input id="email" name="email" type="email" class="px-4 flex items-center w-full appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base rounded focus:border-accent h-12" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" aria-invalid="false"></div>
         <div class="mb-5">
            <div class="flex items-center justify-between mb-2"><label for="password" class="font-semibold text-sm text-body">Password</label><button type="button" class="text-xs text-green-600 transition-colors duration-200 focus:outline-none focus:text-green-600-700 focus:font-semibold hover:text-green-600-hover">Forgot password?</button></div>
            <div class="relative">
               <input id="password" name="password" type="password" class="py-3 ps-4 pe-11 w-full rounded appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base focus:border-accent" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
               <label for="password" class="absolute right-4 top-5 -mt-2 text-body cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
               </label>
            </div>
         </div>
         <div class="mt-8"><button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full h-11 sm:h-12">Login</button></div>
      </form>
      <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8">
         <hr class="w-full">
         <span class="absolute left-2/4 -top-2.5 px-2 -ms-4 bg-white">Or</span>
      </div>
      <div class="grid grid-cols-1 gap-4 mt-2">
         <button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 !bg-social-google hover:!bg-social-google-hover !text-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.986" height="20.39" viewBox="0 0 19.986 20.39" class="w-4 h-4 me-3">
               <path data-name="Path 2" d="M10.195 20.39c5.883 0 9.791-4.13 9.791-9.958a8.711 8.711 0 00-.166-1.7H10.2v3.5h5.787a5.522 5.522 0 01-5.787 4.402 6.441 6.441 0 010-12.88 5.727 5.727 0 014.062 1.571l2.764-2.655A9.749 9.749 0 0010.195 0a10.195 10.195 0 000 20.39z" fill="currentColor"></path>
            </svg>
            Login with Google
         </button>
         <button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-accent-700 bg-accent text-light border border-transparent hover:bg-accent-hover px-5 py-0 h-12 w-full h-11 sm:h-12 !bg-gray-500 hover:!bg-gray-600 !text-light">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.442 27.442" class="h-5 me-2 text-light" fill="currentColor">
               <path d="M19.494 0H7.948a1.997 1.997 0 00-1.997 1.999v23.446c0 1.102.892 1.997 1.997 1.997h11.546a1.998 1.998 0 001.997-1.997V1.999A1.999 1.999 0 0019.494 0zm-8.622 1.214h5.7c.144 0 .261.215.261.481s-.117.482-.261.482h-5.7c-.145 0-.26-.216-.26-.482s.115-.481.26-.481zm2.85 24.255a1.275 1.275 0 110-2.55 1.275 1.275 0 010 2.55zm6.273-4.369H7.448V3.373h12.547V21.1z"></path>
            </svg>
            Login with Mobile number
         </button>
      </div>
      <div class="flex flex-col items-center justify-center relative text-sm text-heading mt-8 sm:mt-11 mb-6 sm:mb-8">
         <hr class="w-full">
      </div>
      <div class="text-sm sm:text-base text-body text-center">Don't have any account? <button class="ms-1 underline text-green-600 font-semibold transition-colors duration-200 focus:outline-none hover:text-green-600-hover focus:text-green-600-hover hover:no-underline focus:no-underline">Register</button></div>
   </div>
</div>
@endsection