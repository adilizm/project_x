@extends('frontend-user.app')

@section('home')
<div class="flex flex-col lg:flex-row items-center lg:items-start m-auto lg:space-x-8 w-full max-w-5xl mt-20 mb-6">
  {{-- orders --}}
    <div class="lg:max-w-2xl w-full space-y-6" style="margin-top: -55px;">
       <div class="flex items-center justify-start">
          <div class="flex items-center space-x-3 md:space-x-4">
          <span class="rounded-full w-8 h-8 bg-green-600 flex items-center justify-center text-base lg:text-xl text-white">1</span>
          <p class="text-lg lg:text-xl text-heading capitalize">{{translate('My Orders')}}</p>
        </div>
    </div>
    <div class="shadow-700 bg-white px-2 md:px-5 rounded-lg border">
      <div class="flex items-center py-4   text-sm  justify-between" style="opacity: 1;">
         <div class="flex items-center space-x-4">
            
            <div class="w-16 sm:w-24 h-16 sm:h-24 flex items-center justify-center overflow-hidden bg-gray-100  flex-shrink-0 relative">
               <div class="rounded-md">
                  <img src="/images/onerror.svg" class="rounded-md" onerror="this.onerror=null;this.src='/images/onerror.svg';">
               </div>
            </div>
            
            <div>
               <h3 class="font-bold text-heading">Sliced Turkey Breast</h3>
               <p class="my-1 font-semibold text-green-600">$7.50</p>
               <span class="text-xs text-body">14 X 1lb</span>
            </div>
            
         </div>
         <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">           
               <span class="mx-auto font-bold text-heading">$105.00</span>
            </div>
            
            <div class="flex-shrink-0">
               <div class="flex overflow-hidden flex-col-reverse items-center w-8 h-24 bg-gray-100 text-heading rounded-full">
                  <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600hover hover:!bg-gray-100">
                     <span class="sr-only">minus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                     </svg>
                  </button>
                  <div class="flex-1 flex items-center justify-center text-sm font-semibold text-heading">14</div>
                  <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600hover hover:!bg-gray-100" title="">
                     <span class="sr-only">plus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                     </svg>
                  </button>
               </div>
            </div>
            
            <div class="flex-shrink-0">
               <div class="flex  items-center justify-center w-8 h-24 bg-gray-100 text-heading rounded-full">
                  <button class="w-7 h-7  flex items-center justify-center flex-shrink-0 rounded-full text-muted transition-all duration-200 focus:outline-none hover:bg-gray-100 focus:bg-gray-100 hover:text-red-600 focus:text-red-600">
                     <span class="sr-only">close</span>
                     <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                     </svg>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
   {{-- ******************************************* --}}
   <div class="lg:max-w-2xl w-full space-y-6">
       <div class="lg:max-w-2xl w-full space-y-6">
           
     <div class="flex items-center justify-start">
          <div class="flex items-center space-x-3 md:space-x-4">
          <span class="rounded-full w-8 h-8 bg-green-600 flex items-center justify-center text-base lg:text-xl text-white">2</span>
          <p class="text-lg lg:text-xl text-heading capitalize">Choose Adresse</p>
        </div>
    </div>
   <div class="shadow-700 bg-white px-2 md:px-5 rounded-lg border w-full  space-y-4">
      <div class="m-4  h-72   shadow rounded">
          <a href="#map"></a>
        <div id="map">
            
        </div>
      </div>
      <div class="m-4 ">
          <form novalidate="">
   <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 my-6">
      <div>
          <label for="name" class="block text-gray-500 font-semibold text-sm leading-none mb-3">Business | Building name</label>
          <input id="name" name="name" type="text" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
      </div>
      <div>
          <label for="email" class="block text-gray-500 font-semibold text-sm leading-none mb-3">Number</label>
          <input id="email" name="email" type="tel" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
      </div>
   </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 my-6">
      <div>
          <label for="name" class="block text-gray-500 font-semibold text-sm leading-none mb-3">Floor | Door number</label>
          <input id="name" name="name" type="number" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
      </div>
      <div>
          <label for="email" class="block text-gray-500 font-semibold text-sm leading-none mb-3">District | Zone | Secteur</label>
          <input id="email" name="email" type="text" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
      </div>
   </div>
   <div class="my-6">
       <label for="subject" class="block text-gray-500 font-semibold text-sm leading-none mb-3">More info about address</label>
       <input id="subject" name="subject" type="text" class="px-4 flex items-center w-full appearance-none  text-heading text-sm focus:outline-none  border border-border-base rounded focus:border-green-600 h-10">
    </div>
   
</form>
      </div>
   </div>
</div>

</div>
   </div>
   {{-- end orders --}}
   <div class="w-full lg:w-96 mb-10 sm:mb-12 lg:mb-0  mt-6 lg:mt-0 lg:sticky lg:top-24 space-y-4">
            <div class="w-full bg-white rounded-lg border p-6 space-y-2">
                <div>
                    <h3>Have coupon?</h3>
                </div>
                <div class="relative text-gray-700">
                    <input class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Code Coupon">
                    <button class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-green-600 rounded-r-lg hover:bg-green-500 focus:bg-green-700">Apply</button>
                </div>
            </div>
    
            <div class="w-full bg-white rounded-lg border p-6 space-y-2">
                <div class="flex items-center justify-between"><span>Total products</span><span>15</span></div>
                <div class="flex items-center justify-between"><span>Total shipping</span><span>15</span></div>
                <div class="flex items-center justify-between"><span>Discount</span><span>15</span></div>
                 <div class="border-b border-gray-200 w-full"></div>
                <div class="flex items-center justify-between"><span>Total</span><span>15</span></div>
                
            </div>
    </div>
</div>
@endsection
