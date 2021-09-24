@extends('frontend-user.profile.index')
@section('user-section')
<div class="p-5 md:p-8 bg-white shadow rounded w-full">
   <h1 class="mb-5 sm:mb-8 text-lg sm:text-xl text-heading font-semibold">Change Password</h1>
   <form class="flex flex-col" novalidate="">
      <div class="mb-5">
         <div class="flex items-center justify-between mb-2"><label for="oldPassword" class="font-semibold text-sm text-body">Old Password</label></div>
         <div class="relative">
            <input id="oldPassword" name="oldPassword" type="password" class="py-3 pr-4 pr-11 w-full rounded appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base focus:border-green-600" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false">
            <label for="oldPassword" class="absolute right-4 top-5 -mt-2 text-body cursor-pointer">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
               </svg>
            </label>
         </div>
      </div>
      <div class="mb-5">
         <div class="flex items-center justify-between mb-2"><label for="newPassword" class="font-semibold text-sm text-body">New Password</label></div>
         <div class="relative">
            <input id="newPassword" name="newPassword" type="password" class="py-3 pr-4 pr-11 w-full rounded appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base focus:border-green-600" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false">
            <label for="newPassword" class="absolute right-4 top-5 -mt-2 text-body cursor-pointer">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
               </svg>
            </label>
         </div>
      </div>
      <div class="mb-5">
         <div class="flex items-center justify-between mb-2"><label for="passwordConfirmation" class="font-semibold text-sm text-body">Confirm Password</label></div>
         <div class="relative">
            <input id="passwordConfirmation" name="passwordConfirmation" type="password" class="py-3 pr-4 pr-11 w-full rounded appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 border border-border-base focus:border-green-600" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false">
            <label for="passwordConfirmation" class="absolute right-4 top-5 -mt-2 text-body cursor-pointer">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
               </svg>
            </label>
         </div>
      </div>
      <button data-variant="normal" class="inline-flex items-center justify-center flex-shrink-0 font-semibold leading-none rounded outline-none transition duration-300 ease-in-out focus:outline-none focus:shadow focus:ring-1 focus:ring-green-700 bg-green-600 text-white border border-transparent hover:bg-green-hover px-5 py-0 h-12 mr-auto">Submit</button>
   </form>
</div>
@endsection