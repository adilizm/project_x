<div  class="shadow   w-full  rounded max-h-select overflow-y-auto">
                    <div class="flex flex-col w-full">
                        @foreach($prod_result as $product)
                        
                            <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-green-500 hover:bg-green-100">
                                <div class="w-6 flex flex-col items-center">
                                    <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                       <img class="rounded-full" alt="A" src="{{'/storage/'.$product->Images()->where('is_main','1')->first()->path}}"> </div>
                                </div>
                                <div class="w-full items-center flex">
                                    <div class="mx-2 text-gray-900 text-heading text-md">
                                        {!! $product->name !!}
                                        {{-- <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">aziz.hissi@gmaild</div> --}}
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach 
                    </div>
</div>