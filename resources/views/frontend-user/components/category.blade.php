 <div class="hidden lg:block w-1/4 bg-white rounded overflow-auto pr-5">
            <ul class="my-4 w-full">
               @php 
               $ids_c = $categories->pluck('id');
              
               @endphp
               @foreach($categories as $key =>$category)
                @php 
                  $sub_categories = \app\models\Category::where('parent_id',$category->id)->get();
                  @endphp
               <li class="py-2 list-none" id='{{$category->id}}' onclick="funtc({{$category->id}})">
                  <a href="@if(count($sub_categories) < 1)  {{route('category.page',['language'=>app()->getLocale(),'slug'=>$sub_category->slug])}} @else javascript:void(0); @endif"
                     class="flex items-center justify-between w-full text-gray-500 font-semibold focus:text-purple-800 text-sm">
                     <span class="flex items-center justify-between">
                        <span class="flex w-5 h-5 mx-2 items-center justify-center">
                           <img src="{{'/storage/'.$category->picture}}" alt="" srcset="">
                        </span>
                        <span>{{$category->name}}</span>
                     </span>
                     <span class="ms-auto">
                        @if(count($sub_categories)>0)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                           class="w-3 h-3">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                           </path>
                        </svg>
                        @endif
                     </span>
                  </a>
                
                  <li class="list-none px-8 text-gray-500 hidden pb-4">
                  <ul>
                      @foreach($sub_categories as $sub_category)
                    <a href="{{ route('category.page',['language'=>app()->getLocale(),'slug'=>$sub_category->slug]) }}">
                        <li class="rounded-md" style="background-color: rgb(255, 255, 255);">
                        <button class="flex items-center w-full py-2 font-semibold   focus:text-purple-800  text-sm">
                           <span>{{$sub_category->name}}</span>

                        </button>
                     </li>
                    </a>
                     @endforeach
                  </ul>
               </li> 
               </li>
               @endforeach
            </ul>



         </div>
 <script type="text/javascript">
     var ids = {{$ids_c}};
    
      function funtc(id) {
         for (let i = 0; i < ids.length; i++) {
            var content = document.getElementById(ids[i]).nextElementSibling;
            if (ids[i] == id) {
               content.classList.toggle("hidden");
            }
            else {
               content.classList.add("hidden");
            }
         }

      }


</script>        