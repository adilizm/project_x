@extends('frontend-user.app')
@section('home')
<div class="bg-white mb-4">
   <article class="rounded-lg ">
      <div class="flex flex-col md:flex-row border-b border-border-200 border-opacity-70 py-4">
         <div class="md:w-1/2 px-6 lg:px-14 xl:px-16 ">
            <div class="flex items-center justify-between">
               <a href="{{ url()->previous() }}"
                  class="inline-flex items-center justify-center text-green-600 font-semibold transition-colors hover:text-green-600-hover focus:text-green-600-hover focus:outline-none">
                  <svg
                     class="w-5 h-5 me-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                        d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                  </svg>
                  Back
               </a>
               <div class="rounded-full text-xs leading-6 font-semibold px-3 bg-yellow-500 text-white ml-auto">{{floor(($product->old_price - $product->prix) * 100 / $product->old_price) }} %</div>
            </div>
            <!-- Aziz -->
            <div class="glide-details w-full">
               <div class="relative">
                  <div class="glide__track" data-glide-el="track">
                     <ul class="glide__slides">
                        @foreach($product->Images()->where('is_main','0')->get() as $image)
                        <li class="glide__slide">
                           <img id="img-x" src="{{'/storage/'.$image->path}}" onerror="this.onerror=null;this.src='/images/onerror.svg';" alt="" class=" mx-auto">
                        </li>
                        @endforeach
                     </ul>
                  </div>
                  <div class="glide__arrows absolute top-2/4 flex w-full justify-between" data-glide-el="controls">
                     <div data-glide-dir="<"
                        class="glide__arrow glide__arrow--left cursor-pointer  -start-4 md:-start-5 z-10 -mt-4 md:-mt-5 w-8 h-8 md:w-9 md:h-9 rounded-full bg-white shadow-xl border border-border-200 border-opacity-70 flex items-center justify-center text-heading transition-all duration-200 hover:bg-gray-100">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                     </div>
                     <div data-glide-dir=">"
                        class="glide__arrow glide__arrow--right cursor-pointer  top-2/4 -end-4 md:-end-5 z-10 -mt-4 md:-mt-5 w-8 h-8 md:w-9 md:h-9 rounded-full bg-white shadow-xl border border-border-200 border-opacity-70 flex items-center justify-center text-heading transition-all duration-200 hover:bg-gray-100">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                     </div>
                  </div>
               </div>
               <div class="max-w-md  mx-auto relative flex justify-center">
                  <div class="flex space-x-3 glide__bullets" data-glide-el="controls[nav]">
                     @foreach($product->Images()->where('is_main','0')->get() as $key => $image)
                     <div data-glide-dir="={{$key}}"
                        class=" border-2 glide__bullet flex w-24  items-center justify-center cursor-pointer rounded overflow-hidden border border-border-200 border-opacity-75 hover:opacity-75">
                        <img src="{{'/storage/'.$image->path}}" onerror="this.onerror=null;this.src='/images/onerror.svg';">
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
         <div class="md:w-1/2 px-6 lg:px-14 xl:px-16 flex flex-col items-start mt-6 md:mt-0">
            <div class="w-full">
               <h1 class="font-semibold text-lg md:text-xl xl:text-2xl tracking-tight text-gray-900">{{$product->name}}</h1>
               {{-- <span class="text-sm font-normal text-gray-500 mt-2 md:mt-3 block">1lb</span> --}}
               <div class="mt-3 md:mt-4 text-gray-500 text-sm leading-7">An apple is a sweet, edible fruit produced by an
                  apple
                  tree (Malus domestica). Apple trees are ... The skin of ripe apples is generally red, yellow,
                  g...<br><span class="mt-1 inline-block"><button style="color: rgb(0, 158, 127); font-weight: 700;">See
                  more</button></span>
               </div>
               {{--  --}}
  
               {{--  --}}
               {{-- Variants --}}
                @foreach($options as $option)
        @if($option != "qty" && $option != "prix" && $option != "image")
            <div class="w-full mt-2 flex flex-row items-start ">
               <span class="text-sm font-semibold text-gray-900 capitalize mr-6 py-1">{{$option}} :</span>
               <div class="flex flex-row flex-wrap">
                 @if($loop->count == 4)
                  @foreach($variables[$loop->index] as $variable)
                    @if ($loop->first)
                  <button  onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class="click {{'option'.$loop->parent->index}} lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200 rounded-l  mb-2 hover:border-green-600">
                  {{ $variable}}
                  </button>
                    
                    @elseif ($loop->last)
                  <button  onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class="{{'option'.$loop->parent->index}} lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200 rounded-r  mb-2 hover:border-green-600">
                  {{ $variable}}
                  </button>
                    @else
                  <button  onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class="{{'option'.$loop->parent->index}} lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200   mb-2 hover:border-green-600">
                  {{ $variable}}
                  </button>
                   @endif
                   @endforeach
                   @else
                    @foreach($variables[$loop->index] as $variable)
                    @if ($loop->first)
                  <button  onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class=" click  {{'option'.$loop->parent->index}} lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200 rounded-l  mb-2 hover:border-green-600">
                  {{ $variable}}
                  </button>
                    
                    @elseif ($loop->last)
                  <button  onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class=" {{'option'.$loop->parent->index}} lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200 rounded-r  mb-2 hover:border-green-600">
                  {{ $variable}}
                  </button>
                    @else
                  <button  onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class=" {{'option'.$loop->parent->index}} lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200   mb-2 hover:border-green-600">
                  {{ $variable}}
                  </button>
                   @endif
                   @endforeach
              @endif
               </div>
            </div>
            @endif
            @endforeach
               {{-- End Variants --}}
                
               <span class="my-2 md:my-5 flex items-center">
               <ins class="text-2xl md:text-3xl font-semibold text-green-600 no-underline" id="prix">{{$product->prix}} Dhs</ins>
               <del class="text-sm md:text-base font-normal text-gray-500 ml-2">{{$product->old_price}} Dhs</del>
              </span>
               <div class="mt-4 md:mt-6 flex flex-col lg:flex-row items-center space-x-0 lg:space-x-2">
                  <div class="mb-3 lg:mb-0 w-full lg:max-w-[400px]">
                     <div class="flex overflow-hidden w-full h-10 rounded inline-flex justify-between">
                        <button id="decreas_qty" class="font-medium bg-gray-300 text-gray-600 hover:bg-green-600 cursor-pointer p-2 focus:outline-none hover:bg-green-600-hover px-5">-</button>
                        <div class="flex-1 flex items-center justify-center font-medium bg-gray-100 text-gray-600 " id="qty_wanted">1</div>
                        <button id="encreas_qty" class="font-medium bg-gray-300 text-gray-600 hover:bg-green-600 cursor-pointer p-2 focus:outline-none hover:bg-green-600-hover px-5">+</button>
                     </div>
                  </div>
                  <div class="mb-3 lg:mb-0 w-full lg:max-w-[400px]">
                        <button onclick="dragImg()" id="add_to_cart" class="cursor-pointer text-white rounded h-10 focus:outline-none bg-green-600 hover:bg-green-600-hover px-5 text-center w-full">
                           Add To Card
                        </button>
                  </div>
   
               </div>
            </div>
            <div class="w-full mt-4 md:mt-6 pt-4 md:pt-6 flex flex-row items-start border-t border-border-200 border-opacity-60">
               <span class="text-sm font-semibold text-gray-900 capitalize mr-6 py-1">Categories</span>
               <div class="flex flex-row flex-wrap">
                  <a href="{{route('category.page',['language'=>app()->getLocale(),'slug'=>$product->Category()->first()->slug])}}" class="lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200 rounded mr-2 mb-2 hover:border-green-600 hover:text-green-600 focus:outline-none focus:bg-opacity-100">
                  {{$product->Category()->first()->name}}
                  </a>
                  @foreach(\App\Models\Category::where('parent_id',$product->Category()->first()->id)->orWhere('id',$product->Category()->first()->parent_id)->get() as $category)
                  @if($loop->count <= 3)
                  <a href="{{route('category.page',['language'=>app()->getLocale(),'slug'=>$category->slug])}}" class="lowercase text-sm text-gray-900 whitespace-nowrap py-1 px-2.5 bg-transparent border border-border-200 rounded mr-2 mb-2 hover:border-green-600 hover:text-green-600 focus:outline-none focus:bg-opacity-100">
                  {{ $category->name}}
                  </a>
                  @endif
                  @endforeach
               </div>
            </div>
            <div class="flex items-center mt-2">
              <span class="text-sm font-semibold text-gray-900 capitalize mr-6 py-1">Vendeur</span>
              <button class="text-sm text-green-600 tracking-wider transition underline hover:text-green-600-hover hover:no-underline"> 
                {{$product->Shop()->first()->name}} 
              </button>
            </div>
         </div>
      </div>
      <div name="details" class="py-4 px-5 lg:px-16 lg:py-14 border-b border-border-200 border-opacity-70">
         <h2 class="text-lg text-gray-900 tracking-tight font-semibold mb-4 md:mb-6">Details</h2>
         {{-- 
         <p class="text-sm text-gray-500">An apple is a sweet, edible fruit produced by an apple tree (Malus domestica).
            Apple trees are ... The skin of ripe apples is generally red, yellow, green, pink, or russetted, though many
            bi- or tri-colored cultivars may be found.
         </p>
         --}}
         <div>
            {!!$product->description!!}
         </div>
      </div>
   </article>
   {{-- <div class="px-4 mt-4">
      <h2 class="text-lg text-gray-900 tracking-tight font-semibold mb-6">Related Products</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 lg:grid-cols-4 2xl:grid-cols-5 !gap-3">
         <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64">
               <span
                  class="sr-only">Product Image</span>
               <div
                  style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                  <img alt="Baby Spinach" src="public/BabySpinach.jpg">
               </div>
            </div>
            <header class="p-3 md:p-6">
               <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$0.60</span></div>
               <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Baby Spinach</h3>
               <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded">
                  <button
                     class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover">
                     <span
                        class="sr-only">minus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3 w-3 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                     </svg>
                  </button>
                  <div class="flex-1 flex items-center justify-center text-sm font-semibold">2</div>
                  <button
                     class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"
                     title="">
                     <span class="sr-only">plus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                     </svg>
                  </button>
               </div>
            </header>
         </article>
         <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64">
               <span
                  class="sr-only">Product Image</span>
               <div
                  style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                  <img alt="Blueberries" src="./public/blueberries.jpg">
               </div>
            </div>
            <header class="p-3 md:p-6">
               <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$3.00</span></div>
               <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Blueberries</h3>
               <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded">
                  <button
                     class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover">
                     <span
                        class="sr-only">minus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3 w-3 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                     </svg>
                  </button>
                  <div class="flex-1 flex items-center justify-center text-sm font-semibold">1</div>
                  <button
                     class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"
                     title="">
                     <span class="sr-only">plus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                     </svg>
                  </button>
               </div>
            </header>
         </article>
         <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64">
               <span
                  class="sr-only">Product Image</span>
               <div
                  style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                  <img alt="Brussels Sprout" src="./public/BrusselsSprouts.jpg">
               </div>
               <div
                  class="absolute top-3 right-3 md:top-4 md:right-4 rounded text-xs leading-6 font-semibold px-1.5 sm:px-2 md:px-2.5 bg-green-600 text-white">
                  40%
               </div>
            </div>
            <header class="p-3 md:p-6">
               <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$3.00</span><del
                  class="text-xs md:text-sm text-gray-500 ml-2">$5.00</del></div>
               <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Brussels Sprout</h3>
               <button
                  class="group w-full h-7 md:h-9 flex items-center justify-between text-xs md:text-sm text-gray-500-dark rounded bg-gray-100 transition-colors hover:bg-green-600 hover:border-green-600 hover:text-white focus:outline-none focus:bg-green-600 focus:border-green-600 focus:text-white">
                  <span
                     class="flex-1">Add</span>
                  <span
                     class="w-7 h-7 md:w-9 md:h-9 bg-gray-200 grid place-items-center rounded-te rounded-be transition-colors duration-200 group-hover:bg-green-600-600 group-focus:bg-green-600-600">
                     <svg
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 stroke-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                     </svg>
                  </span>
               </button>
            </header>
         </article>
         <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64">
               <span
                  class="sr-only">Product Image</span>
               <div
                  style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                  <img alt="Clementines" src="./public/clementines.jpg">
               </div>
               <div
                  class="absolute top-3 right-3 md:top-4 md:right-4 rounded text-xs leading-6 font-semibold px-1.5 sm:px-2 md:px-2.5 bg-green-600 text-white">
                  17%
               </div>
            </div>
            <header class="p-3 md:p-6">
               <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$2.50</span><del
                  class="text-xs md:text-sm text-gray-500 ml-2">$3.00</del></div>
               <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Clementines</h3>
               <button
                  class="group w-full h-7 md:h-9 flex items-center justify-between text-xs md:text-sm text-gray-500-dark rounded bg-gray-100 transition-colors hover:bg-green-600 hover:border-green-600 hover:text-white focus:outline-none focus:bg-green-600 focus:border-green-600 focus:text-white">
                  <span
                     class="flex-1">Add</span>
                  <span
                     class="w-7 h-7 md:w-9 md:h-9 bg-gray-200 grid place-items-center rounded-te rounded-be transition-colors duration-200 group-hover:bg-green-600-600 group-focus:bg-green-600-600">
                     <svg
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 stroke-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                     </svg>
                  </span>
               </button>
            </header>
         </article>
         <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64">
               <span
                  class="sr-only">Product Image</span>
               <div
                  style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                  <img alt="Sweet Corn" src="./public/Corn.jpg">
               </div>
               <div
                  class="absolute top-3 right-3 md:top-4 md:right-4 rounded text-xs leading-6 font-semibold px-1.5 sm:px-2 md:px-2.5 bg-green-600 text-white">
                  20%
               </div>
            </div>
            <header class="p-3 md:p-6">
               <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$4.00</span><del
                  class="text-xs md:text-sm text-gray-500 ml-2">$5.00</del></div>
               <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Sweet Corn</h3>
               <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded">
                  <button
                     class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover">
                     <span
                        class="sr-only">minus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3 w-3 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                     </svg>
                  </button>
                  <div class="flex-1 flex items-center justify-center text-sm font-semibold">1</div>
                  <button
                     class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"
                     title="">
                     <span class="sr-only">plus</span>
                     <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                     </svg>
                  </button>
               </div>
            </header>
         </article>
      </div>
   </div> --}}
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>

   function dragImg () {
   
        var cart = $('.shopping-cart');
        var imgtodrag = $('#img-x');
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.8',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
    } 
     var variant_selected=null;
    const  product_id_ = {{$product->id}};
    var qty_wanted={{$product->min_quantity}};
    const min_qty={{$product->min_quantity}};
    const  variants=@JSON($variants);

    
        @foreach($options as $option)
            @if($option != "qty" && $option != "prix" && $option != "image")
        var {{'option'.$loop->index}}='{{$variables[$loop->index][0]}}';
            @endif
        @endforeach
       
        @if(count($options) != 0 )
        function choos_option(option,value,option_class){
            document.querySelectorAll('.'.concat(option_class)).forEach(element => {
                element.classList.remove('bg-green-600');
                element.classList.remove('text-white');
            });
            document.getElementById(value).classList.add('bg-green-600')
            document.getElementById(value).classList.add('text-white')
            if(typeof option0 !== 'undefined' && option_class=='option0'){
                option0=value;
            }else if(typeof option1 != 'undefined' &&  option_class == 'option1'){
                option1=value
            }else if(typeof option2 != 'undefined' && option_class == 'option3'){
                option2=value
            }
           
           
            variants.forEach((variant)=>{
               if(@foreach($options as $option)  @if($option != "qty" && $option != "prix" && $option != "image") variant['{{$option}}'] ==  @foreach($options as $option)  @if($option != "qty" && $option != "prix" && $option != "image" && $loop->index == $loop->parent->index) {{'option'.$loop->parent->index}} @endif @endforeach @if( ($loop->index+1) == ($loop->count-3))  @else &&  @endif @endif @endforeach){
    
                if(variant['qty']==0 && typeof option1 != 'undefined'){
/*                     alert('this variant is out of stock pls select an other variant')
 */                    document.querySelectorAll('.'.concat(option_class)).forEach(element => {
                        element.classList.remove('bg-green-600');
                        element.classList.remove('text-white');
                    });
                    if(typeof option0 !== 'undefined' && option_class=='option0'){
                    option0='';
                    }
                    if(typeof option1 != 'undefined' &&  option_class == 'option1'){
                        option1='';
                    }
                    if(typeof option2 != 'undefined' && option_class == 'option3'){
                    option2='';
                    }
                    
                    variant_selected=null;
                    document.getElementById('prix').innerHTML=('Out of stock');

                }else{
                    variant_selected=variant
                   
                    document.getElementById('prix').innerHTML=(variant.prix + ' Dhs');
                }
                // if(variant['image'] != null){
                //     document.getElementById('main_image').removeAttribute('src');
                //     document.getElementById('main_image').setAttribute('src','/storage/'.concat(variant['image']));
                // }
            }
            })
        }
        @endif
            document.getElementById('add_to_cart').addEventListener('click',()=>{
            

           if(variant_selected == null && variants.length > 0 ){
              
           }else{
            // console.log('variant_selected = ', variant_selected);
            axios.post('{{route('add_to_cart',app()->getlocale())}}', {
                        params: {
                        selected_variant:variant_selected,
                        product_id:product_id_,
                        quantity:qty_wanted
                        }
            }).then(function(responce) {
                
                nbr_products_in_cart++;
                increas_nbr_products();
                
            
               //  {
               //     console.log('delete no-cart')
               //    var cartEmpty = document.getElementById("no-cart");
               //    cartEmpty.parentNode.removeChild(cartEmpty);
               //  }
                 var cart_nbr = document.getElementById('card_product_number').innerHTML;
                 //console.log('nbr prdct in cart :' + cart_nbr + ' pstn prdct in cart :' + (cart_nbr - 1));
                var node = ` <div class="to-remove-${cart_nbr - 1} product-cardy flex items-center justify-between py-4 px-4 sm:px-6 text-sm border-b border-solid border-border-200 border-opacity-75" >
                               
                              <span class="flex items-center">
                                    <div class="w-10 sm:w-16 h-10 sm:h-16 flex items-center justify-center overflow-hidden bg-gray-100 mx-2">
                                    
                                        <img alt="Sliced Turkey Breast" class="rounded-full" src="/storage/${variant_selected.image}"  onerror="this.onerror=null;this.src='/images/onerror.svg';">
                                    
                                </div>
                                <div>
                                    <h3 class="font-bold text-heading overflow-ellipsis overflow-hidden whitespace-nowrap w-52"> {{$product->name}}</h3>
                                    <p class="my-1 font-semibold text-accent">${variant_selected.prix}</p>
                                    <span class="text-xs text-body">${qty_wanted} X 1Pc</span>
                                </div>
                              </span>
                              <span class="flex items-center">
                                  <span class="ms-auto font-bold text-heading text-green-600">${variant_selected.prix * qty_wanted } Dhs</span>
                                  
                                <button onclick="remove_product_from_cart(${cart_nbr - 1})" class="w-7 h-7 ml-3 -mr-2 flex items-center justify-center flex-shrink-0 rounded-full text-muted  focus:outline-none hover:bg-gray-100 focus:bg-gray-100 hover:text-red-600 focus:text-red-600">X</button>
                            
                              </span>
                            </div>`;
            document.getElementById("card-body").insertAdjacentHTML('beforeend',node);
            var totalPrice = document.getElementById('total-price').innerHTML;
             totalPrice =parseInt(totalPrice) + parseInt(qty_wanted) * parseInt(variant_selected.prix);
            document.getElementById('total-price').innerHTML = totalPrice;
            
            
            }).catch(function(err) {

            console.log(err);

            })
           }

         })
        function increas_nbr_products(){
           console.log("nbr",nbr_products_in_cart);
            document.querySelectorAll('#card_product_number').forEach(element => {
                element.innerHTML = nbr_products_in_cart;
            });
        
        }
        document.querySelectorAll('.click').forEach(element => {
                element.click();
            });
        document.getElementById('decreas_qty').addEventListener('click',()=>{
            qty_wanted = qty_wanted - 1;
            if(qty_wanted < min_qty ){
                qty_wanted = min_qty
               
            }
            document.getElementById('qty_wanted').innerHTML =parseInt(qty_wanted);
        })
        document.getElementById('encreas_qty').addEventListener('click',()=>{
            qty_wanted++;
            document.getElementById('qty_wanted').innerHTML = qty_wanted;
        })

        /**/////
   var glide = new Glide('.glide-details');
   var bullets = document.getElementsByClassName('glide__bullet');
   bullets[0].classList.add('border-green-600');
   glide.on('run.after', function() {
     var bullets = document.getElementsByClassName('glide__bullet');
     for (let i = 0; i < bullets.length; i++) {
       const element = bullets[i];
       if(i == glide.index) element.classList.add('border-green-600');
       else element.classList.remove('border-green-600');
     }
    
     
   })
   glide.mount();
</script>
@endsection