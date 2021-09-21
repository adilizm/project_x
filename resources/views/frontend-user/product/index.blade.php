@extends('frontend-user.app')
@section('home')
  <div class="bg-white mb-4">
      <article class="rounded-lg ">
        <div class="flex flex-col md:flex-row border-b border-border-200 border-opacity-70 py-4">
          <div class="md:w-1/2 px-6 lg:px-14 xl:px-16 ">
            <div class="flex items-center justify-between"><a href="{{ url()->previous() }}"
                class="inline-flex items-center justify-center text-green-600 font-semibold transition-colors hover:text-green-600-hover focus:text-green-600-hover focus:outline-none"><svg
                  class="w-5 h-5 me-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                    d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>Back</a>
              <div class="rounded-full text-xs leading-6 font-semibold px-3 bg-yellow-500 text-white ml-auto">{{floor(($product->old_price - $product->prix) * 100 / $product->old_price) }} %</div>
            </div>
            <!-- Aziz -->
            <div class="glide-details w-full">
              <div class="relative">
                <div class="glide__track" data-glide-el="track">
                  <ul class="glide__slides">
                @foreach($product->Images()->where('is_main','0')->get() as $image)
                <li class="glide__slide">
                    <img src="{{'/storage/'.$image->path}}" onerror="this.onerror=null;this.src='/images/onerror.svg';" alt="" class="max-w-md min-w-full min-h-full mx-auto"></li>
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
                    class=" border-2 glide__bullet flex w-24 mr-5 items-center justify-center cursor-pointer rounded overflow-hidden border border-border-200 border-opacity-75 hover:opacity-75">
                    <img src="{{'/storage/'.$image->path}}" onerror="this.onerror=null;this.src='/images/onerror.svg';">
                  </div>
                  @endforeach
                </div>

              </div>
            </div>

          </div>
          <div class="md:w-1/2 px-6 lg:px-14 xl:px-16 flex flex-col items-start">
            <div class="w-full">
              <h1 class="font-semibold text-lg md:text-xl xl:text-2xl tracking-tight text-gray-900">{{$product->name}}</h1>
              {{-- <span class="text-sm font-normal text-gray-500 mt-2 md:mt-3 block">1lb</span> --}}
              <div class="mt-3 md:mt-4 text-gray-500 text-sm leading-7">An apple is a sweet, edible fruit produced by an
                apple
                tree (Malus domestica). Apple trees are ... The skin of ripe apples is generally red, yellow,
                g...<br><span class="mt-1 inline-block"><button style="color: rgb(0, 158, 127); font-weight: 700;">See
                    more</button></span></div><span class="my-5 md:my-10 flex items-center"><ins
                  class="text-2xl md:text-3xl font-semibold text-green-600 no-underline">{{$product->prix}} dh</ins><del
                  class="text-sm md:text-base font-normal text-gray-500 ml-2">{{$product->old_price}} dh</del></span>
              <div class="mt-4 md:mt-6 flex flex-col lg:flex-row items-center">
                <div class="mb-3 lg:mb-0 w-full lg:max-w-[400px]">
                  <div
                    class="flex overflow-hidden w-full h-14 rounded text-white bg-green-600 inline-flex justify-between">
                    <button
                      class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover px-5"><span
                        class="sr-only">minus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-3 w-3 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                      </svg></button>
                    <div class="flex-1 flex items-center justify-center text-sm font-semibold">1</div><button
                      class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover px-5"
                      title=""><span class="sr-only">plus</span><svg fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                      </svg></button>
                  </div>
                </div>
                @if($product->qty)
                <span class="text-base text-gray-500 whitespace-nowrap lg:ml-7">{{$product->qty}} pieces available</span>
                @else
                 <span class="text-base text-red-500 whitespace-nowrap lg:ml-7">Out of stock</span>
                @endif
              </div>
            </div>
            <div
              class="w-full mt-4 md:mt-6 pt-4 md:pt-6 flex flex-row items-start border-t border-border-200 border-opacity-60">
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
            <div class="flex items-center mt-2"><span
                class="text-sm font-semibold text-gray-900 capitalize mr-6 py-1">Vendeur</span><button
                class="text-sm text-green-600 tracking-wider transition underline hover:text-green-600-hover hover:no-underline">{{$product->Shop()->first()->name}}</button></div>
          </div>
        </div>
        <div name="details" class="py-4 px-5 lg:px-16 lg:py-14 border-b border-border-200 border-opacity-70">
          <h2 class="text-lg text-gray-900 tracking-tight font-semibold mb-4 md:mb-6">Details</h2>
          {{-- <p class="text-sm text-gray-500">An apple is a sweet, edible fruit produced by an apple tree (Malus domestica).
            Apple trees are ... The skin of ripe apples is generally red, yellow, green, pink, or russetted, though many
            bi- or tri-colored cultivars may be found.</p> --}}
            <div>
                {!!$product->description!!}
            </div>
        </div>
      </article>
      <div class="px-4 mt-4">
        <h2 class="text-lg text-gray-900 tracking-tight font-semibold mb-6">Related Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4 lg:grid-cols-4 2xl:grid-cols-5 !gap-3">
          <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64"><span
                class="sr-only">Product Image</span>
              <div
                style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                <img alt="Baby Spinach" src="public/BabySpinach.jpg"></div>
            </div>
            <header class="p-3 md:p-6">
              <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$0.60</span></div>
              <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Baby Spinach</h3>
              <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded"><button
                  class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"><span
                    class="sr-only">minus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-3 w-3 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                  </svg></button>
                <div class="flex-1 flex items-center justify-center text-sm font-semibold">2</div><button
                  class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"
                  title=""><span class="sr-only">plus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg></button>
              </div>
            </header>
          </article>
          <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64"><span
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
              <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded"><button
                  class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"><span
                    class="sr-only">minus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-3 w-3 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                  </svg></button>
                <div class="flex-1 flex items-center justify-center text-sm font-semibold">1</div><button
                  class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"
                  title=""><span class="sr-only">plus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg></button>
              </div>
            </header>
          </article>
          <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64"><span
                class="sr-only">Product Image</span>
              <div
                style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                <img alt="Brussels Sprout" src="./public/BrusselsSprouts.jpg">
                 </div>
              <div
                class="absolute top-3 right-3 md:top-4 md:right-4 rounded text-xs leading-6 font-semibold px-1.5 sm:px-2 md:px-2.5 bg-green-600 text-white">
                40%</div>
            </div>
            <header class="p-3 md:p-6">
              <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$3.00</span><del
                  class="text-xs md:text-sm text-gray-500 ml-2">$5.00</del></div>
              <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Brussels Sprout</h3><button
                class="group w-full h-7 md:h-9 flex items-center justify-between text-xs md:text-sm text-gray-500-dark rounded bg-gray-100 transition-colors hover:bg-green-600 hover:border-green-600 hover:text-white focus:outline-none focus:bg-green-600 focus:border-green-600 focus:text-white"><span
                  class="flex-1">Add</span><span
                  class="w-7 h-7 md:w-9 md:h-9 bg-gray-200 grid place-items-center rounded-te rounded-be transition-colors duration-200 group-hover:bg-green-600-600 group-focus:bg-green-600-600"><svg
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 stroke-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg></span></button>
            </header>
          </article>
          <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64"><span
                class="sr-only">Product Image</span>
              <div
                style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                <img alt="Clementines" src="./public/clementines.jpg"></div>
              <div
                class="absolute top-3 right-3 md:top-4 md:right-4 rounded text-xs leading-6 font-semibold px-1.5 sm:px-2 md:px-2.5 bg-green-600 text-white">
                17%</div>
            </div>
            <header class="p-3 md:p-6">
              <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$2.50</span><del
                  class="text-xs md:text-sm text-gray-500 ml-2">$3.00</del></div>
              <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Clementines</h3><button
                class="group w-full h-7 md:h-9 flex items-center justify-between text-xs md:text-sm text-gray-500-dark rounded bg-gray-100 transition-colors hover:bg-green-600 hover:border-green-600 hover:text-white focus:outline-none focus:bg-green-600 focus:border-green-600 focus:text-white"><span
                  class="flex-1">Add</span><span
                  class="w-7 h-7 md:w-9 md:h-9 bg-gray-200 grid place-items-center rounded-te rounded-be transition-colors duration-200 group-hover:bg-green-600-600 group-focus:bg-green-600-600"><svg
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 stroke-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg></span></button>
            </header>
          </article>
          <article
            class="product-card cart-type-neon border border-border-200 rounded h-full bg-white overflow-hidden shadow-sm transition-all duration-200 hover:shadow transform hover:-translate-y-0.5">
            <div class="relative flex items-center justify-center cursor-pointer w-auto h-48 sm:h-64"><span
                class="sr-only">Product Image</span>
              <div
                style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                <img alt="Sweet Corn" src="./public/Corn.jpg"></div>
              <div
                class="absolute top-3 right-3 md:top-4 md:right-4 rounded text-xs leading-6 font-semibold px-1.5 sm:px-2 md:px-2.5 bg-green-600 text-white">
                20%</div>
            </div>
            <header class="p-3 md:p-6">
              <div class="flex items-center mb-2"><span
                  class="text-sm md:text-base text-gray-900 font-semibold">$4.00</span><del
                  class="text-xs md:text-sm text-gray-500 ml-2">$5.00</del></div>
              <h3 class="text-xs md:text-sm text-gray-500 truncate mb-4 cursor-pointer">Sweet Corn</h3>
              <div class="flex overflow-hidden w-full h-7 md:h-9 bg-green-600 text-white rounded"><button
                  class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"><span
                    class="sr-only">minus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-3 w-3 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path>
                  </svg></button>
                <div class="flex-1 flex items-center justify-center text-sm font-semibold">1</div><button
                  class="cursor-pointer p-2 transition-colors duration-200 focus:outline-none hover:bg-green-600-hover"
                  title=""><span class="sr-only">plus</span><svg fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-3.5 w-3.5 md:h-4.5 md:w-4.5 stroke-2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg></button>
              </div>
            </header>
          </article>
     
          
         
         
        </div>
      </div>
    </div>
      <script>

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