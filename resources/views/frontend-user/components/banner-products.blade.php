<!-- products 1-->
<div class="w-full  my-4">
   <div class="w-full border-b-2 border-gray-200 my-6 py-2" >
      <span class="border-b-2 border-green-600 py-2 text-lg text-gray-900 tracking-tight font-semibold">Recommandé par Konly</span>
   </div>
   @if(count($products) > 0)
   <div class="glide-banner w-full h-full">
      <div class="relative h-full">
         <div class="glide__track h-full" data-glide-el="track">
            <div class="glide__slides h-full">
               @foreach($products as $product)
              
                  <article class="glide__slide h-full  border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm  hover:shadow transform hover:-translate-y-0.5">
                  <a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product->slug])}}">
                     <div class="relative flex items-center justify-center cursor-pointer w-auto h-44">
                     <span class="sr-only">Product Image</span>
                     <div><img alt="{{ $product->name }}" sizes="100vw" onerror="this.onerror=null;this.src='/images/onerror.svg';" src="{{'/storage/'.$product->Images()->where('is_main','1')->first()->path}}" class="mt-4 absolute object-contain max-w-full max-h-full min-w-full min-h-full -inset-0"></div>
                     <div class="absolute top-3 right-3 md:top-4 md:end-4 rounded text-xs leading-6 font-semibold px-1.5 sm:px-2 md:px-2.5 bg-green-600 text-white">20%</div>
                  </div>
                  </a>
                  <header class="p-3 md:p-6">
                     <div class="flex items-center mb-2">
                        <span class="text-sm md:text-base text-heading font-semibold">{{ $product->prix}}</span>
                        @if($product->old_price != null)
                        <del class="text-xs md:text-sm text-gray-500 ml-2">{{$product->old_price}}</del>
                        @endif
                     </div>
                      <a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product->slug])}}">
                     <h3 class="text-xs md:text-sm text-gray-600  mb-4 cursor-pointer leading-6 h-11 overflow-hidden overflow-ellipsis">{{ $product->name }}</h3>
                      </a>
                     <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded">
                           <button
                              class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover">
                              <span class="sr-only">minus</span>
                              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-3">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                              </svg>
                           </button>
                           <div class="flex-1 flex items-center justify-center text-sm font-semibold">1</div>
                           <button
                              class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"
                              title="">
                              <span class="sr-only">plus</span>
                              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-3">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                 </path>
                              </svg>
                           </button>
                     </div>
                     {{-- <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded">
                        <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover">
                           <span class="sr-only text-white">minus</span>
                           <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3 w-3 stroke-2.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                           </svg>
                        </button>
                        <div class="flex-1 flex items-center justify-center text-sm font-semibold">13</div>
                        <button class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover" title="">
                           <span class="sr-only text-white">plus</span>
                           <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                           </svg>
                        </button>
                     </div> --}}
                  </header>
               </article>
              </a>
               @endforeach
            </div>
         </div>
         <div class="glide__arrows absolute top-2/4 flex w-full justify-between" data-glide-el="controls">
            <div data-glide-dir="<"
               class="glide__arrow glide__arrow--left cursor-pointer  -start-4 md:-start-5 z-10 -mt-4 md:-mt-5 w-8 h-8 md:w-9 md:h-9 rounded-full bg-white shadow-xl border border-border-200 border-opacity-70 flex items-center justify-center text-heading transition-all duration-200 hover:bg-gray-100">
               <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                  </path>
               </svg>
            </div>
            <div data-glide-dir=">"
               class="glide__arrow glide__arrow--right cursor-pointer  top-2/4 -end-4 md:-end-5 z-10 -mt-4 md:-mt-5 w-8 h-8 md:w-9 md:h-9 rounded-full bg-white shadow-xl border border-border-200 border-opacity-70 flex items-center justify-center text-heading transition-all duration-200 hover:bg-gray-100">
               <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                  </path>
               </svg>
            </div>
         </div>
      </div>
   </div>
   @endif
</div>
      <!-- end products 1-->
<script type="text/javascript">

        var glide = new Glide('.glide-banner', {
         type: 'carousel',
         perView: 5,
         breakpoints: {
            1200: {
               perView: 4
            },
            992: {
               perView: 3
            },
            720: {
               perView: 3
            },
            540: {
               perView: 2
            }
                     }
      }).mount();

</script>    