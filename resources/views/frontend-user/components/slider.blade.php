<div class="w-full lg:w-3/4">
            <div class="glide-details w-full lg:pl-4 h-full">
               <div class="relative h-full">
                  <div class="glide__track h-full" data-glide-el="track">
                     <ul class="glide__slides h-full">
                          @foreach($sliders as $slider)
                        <li class="glide__slide h-full "><img src="{{'/storage/'.$slider->laptop_path}}"  
                            class="rounded h-full object-fill w-full"></li>
                           @endforeach
                        
                     </ul>
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

</div>
<script type="text/javascript">
var glide = new Glide('.glide-details', {
         type: 'carousel',
         autoplay: 2000,
         hoverpause: true,
         perView: 1
      }).mount();
        var glide = new Glide('.glide-product', {
         type: 'carousel',
         
         perView: 4
      }).mount();

</script>    