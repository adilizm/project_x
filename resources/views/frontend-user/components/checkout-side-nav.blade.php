<style>
    .scroll {
  
}
.scroll::-webkit-scrollbar {
    width: 0px;
}
</style>
@php 
$total_price = 0;
@endphp
<aside class="fixed inset-0 overflow-hidden h-full z-50 hidden" id="my-nav">
   <div class="absolute inset-0 overflow-hidden">
      <div class="absolute inset-0 bg-black bg-opacity-40" onclick="showCheckoutSideNav()"></div>
      <div class="absolute inset-y-0 max-w-full flex outline-none right-0">
         <div class="h-full w-screen max-w-md">
            <div class="h-full flex flex-col text-base bg-white shadow-xl">
               <div class="w-full h-full ">
                   <section class="flex flex-col h-full relative">
                              <header class="sticky max-w-md w-full top-0 z-10 bg-white py-4 px-6 flex items-center justify-between border-b border-border-200 border-opacity-75">
                                 <div class="flex text-green-600 font-semibold">
                                    <svg width="24" height="22" class="flex-shrink-0" viewBox="0 0 12.686 16">
                                       <g transform="translate(-27.023 -2)">
                                          <g transform="translate(27.023 5.156)">
                                             <g>
                                                <path d="M65.7,111.043l-.714-9A1.125,1.125,0,0,0,63.871,101H62.459V103.1a.469.469,0,1,1-.937,0V101H57.211V103.1a.469.469,0,1,1-.937,0V101H54.862a1.125,1.125,0,0,0-1.117,1.033l-.715,9.006a2.605,2.605,0,0,0,2.6,2.8H63.1a2.605,2.605,0,0,0,2.6-2.806Zm-4.224-4.585-2.424,2.424a.468.468,0,0,1-.663,0l-1.136-1.136a.469.469,0,0,1,.663-.663l.8.8,2.092-2.092a.469.469,0,1,1,.663.663Z" transform="translate(-53.023 -101.005)" fill="currentColor"></path>
                                             </g>
                                          </g>
                                          <g transform="translate(30.274 2)">
                                             <g>
                                                <path d="M160.132,0a3.1,3.1,0,0,0-3.093,3.093v.063h.937V3.093a2.155,2.155,0,1,1,4.311,0v.063h.937V3.093A3.1,3.1,0,0,0,160.132,0Z" transform="translate(-157.039)" fill="currentColor"></path>
                                             </g>
                                          </g>
                                       </g>
                                    </svg>
                                    <span class="flex ms-2 " id="card_product_number">
                                       @if(session()->get('cart') != null ) {{count(session()->get('cart'))}} 
                                       @else 0 
                                       @endif 
                                       
                                    </span>
                                    <span class="mx-1">Item</span>
                                 </div>
                                 <button onclick="showCheckoutSideNav()" class="w-7 h-7 ml-3 -mr-2 flex items-center justify-center rounded-full text-muted bg-gray-100 transition-all duration-200 focus:outline-none hover:bg-green-600 focus:bg-green-600 hover:text-light focus:text-light">
                                    <span class="sr-only">close</span>
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                       <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                 </button>
                              </header>
                            <div class="h-full overflow-auto scroll" id="card-body">
                           @if(session()->get('cart') != null )
                           
                           @foreach (session()->get('cart') as $product)
                           @php $name =  \App\Models\Product::find($product['product_id'])->name;
                           $total_price  = $total_price + $product['quantity'] * $product['variant_info']['prix'];
                           @endphp
                              <div class="to-remove-{{$loop->index}} product-cardy flex items-center justify-between py-4 px-4 sm:px-6 text-sm border-b border-solid border-border-200 border-opacity-75" >
                               
                              <span class="flex items-center">
                                    <div class="w-10 sm:w-16 h-10 sm:h-16 flex items-center justify-center overflow-hidden bg-gray-100 mx-2">
                                    
                                        <img alt="Sliced Turkey Breast" class="rounded-full" src="{{'/storage/'.$product['variant_info']['image']}}" onerror="this.onerror=null;this.src='/images/onerror.svg';">
                                    
                                </div>
                                <div>
                                    <h3 class="font-bold text-heading overflow-ellipsis overflow-hidden whitespace-nowrap w-52"> {{$name}}</h3>
                                    <p class="my-1 font-semibold text-accent">{{$product['variant_info']['prix']}}</p>
                                    <span class="text-xs text-body">{{$product['quantity']}} X 1Pc</span>
                                </div>
                              </span>
                              <span class="flex items-center">
                                 <span class="ms-auto font-bold text-heading text-green-600"><span>{{$product['quantity'] * $product['variant_info']['prix']}}</span><span>Dhs</span> </span>
                                <button onclick="remove_product_from_cart({{$loop->index}})" class="w-7 h-7 ml-3 -mr-2 flex items-center justify-center flex-shrink-0 rounded-full text-muted  focus:outline-none hover:bg-gray-100 focus:bg-gray-100 hover:text-red-600 focus:text-red-600">X</button>
                            
                              </span>
                            </div>
                           @endforeach
                              @endif
                            </div>
                              <footer class="sticky left-0 bottom-0 w-full py-4 px-6 z-10 bg-white">
                                  <button class="flex justify-between w-full h-12 md:h-14 p-1 text-sm font-bold bg-green-600 rounded-full shadow-700  focus:outline-none hover:bg-green-600-hover focus:bg-green-600-hover">
                                      <span class="flex flex-1 items-center h-full px-5 text-white">Checkout</span>
                                      <span class="flex items-center flex-shrink-0 h-full bg-white text-green-600 rounded-full px-5" ><span id="total-price">{{$total_price}}</span> Dhs</span>
                                  </button>
                             </footer>
                           </section>
                        </div>
            </div>
         </div>
      </div>
   </div>
</aside>
<script type="text/javascript">
   function showCheckoutSideNav(id){
       var element = document.getElementById("my-nav");
           element.classList.toggle("hidden");
   }
    function remove_product_from_cart(position) {
        
    axios.post('{{route('remove_from_carte',app()->getlocale())}}', {
                        params: {
                          position_to_delete:position,
                        }
            }).then(function(responce) {
            
                nbr_products_in_cart--;
                
                // document.getElementById('card_product_number').innerHTML = nbr_products_in_cart;
                
                 document.querySelectorAll('#card_product_number').forEach(element => {
                   element.innerHTML = nbr_products_in_cart;
                 });
               
                var toRemove = document.getElementsByClassName('to-remove-' + position);
                
                var to_subs = toRemove[0].lastElementChild.firstElementChild.firstElementChild.innerHTML;
                
                
                var totalPrice = document.getElementById('total-price').innerHTML;
                
             totalPrice = parseInt(totalPrice) - parseInt(to_subs);
            document.getElementById('total-price').innerHTML = totalPrice;
                toRemove[0].parentNode.removeChild(toRemove[0]);
                
                document.querySelectorAll('.product-cardy').forEach((element, index) => {
                   
                   element.className = '';
                   element.className = 'to-remove-' + index +' product-cardy flex items-center justify-between py-4 px-4 sm:px-6 text-sm border-b border-solid border-border-200 border-opacity-75';
                   element.lastElementChild.lastElementChild.removeAttribute("onclick");
                   element.lastElementChild.lastElementChild.setAttribute("onclick", "remove_product_from_cart(" + index + ")");
                   
                   
                  });
                  
                  

            }).catch(function(err) {

            console.log(err);

            })
  }
</script>