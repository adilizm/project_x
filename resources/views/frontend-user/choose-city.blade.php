@extends('frontend-user.app')
@section('content_section')
<div class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="flex items-center justify-start space-x-2">
          <div class="h-12 w-12 sm:mx-0 sm:h-10 sm:w-10">
            <!-- Heroicon name: outline/exclamation -->
           <svg xmlns="http://www.w3.org/2000/svg" id="Calque_1" data-name="Calque 1" viewBox="0 0 100 100"><defs><style>.cls-1{fill:#0d3959;}.cls-2{fill:#d66739;}</style></defs><rect class="cls-1" x="26.84" y="22.66" width="10.19" height="60.73"/><rect class="cls-2" x="26.84" y="9.72" width="10.19" height="12.95"/><path class="cls-1" d="M61,22.68H74.67L47.13,52,76.42,83H63.21L38.66,58s-.45-.39-.69-.58c-1.35-1.11-5.28-5.24,1.2-12.12Z"/><path class="cls-2" d="M77.17,14.22H42.84v3.36H77.17a7.5,7.5,0,0,1,7.5,7.5V79.42a7.5,7.5,0,0,1-7.5,7.5H22.83a7.5,7.5,0,0,1-7.5-7.5V25.08a7.5,7.5,0,0,1,5.22-7.14V14.46A10.88,10.88,0,0,0,12,25.08V79.42A10.87,10.87,0,0,0,22.83,90.28H77.17A10.87,10.87,0,0,0,88,79.42V25.08A10.87,10.87,0,0,0,77.17,14.22Z"/></svg>
          </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 " id="modal-title">
              {{translate('Choose One City')}}
            </h3>
        </div>
        
            <div class="flex flex-wrap justify-center my-4">
            @foreach($cities as $city)
            <a href="{{route('store_city',['language'=>app()->getLocale(),'id'=>encrypt($city->id)])}}">
                <div class="rounded-md border border-gray-100 shadow hover:border-green-600 mx-2 my-4 px-4 py-2">{{$city->name}}</div>
            </a>
            @endforeach
            
        </div>
        
      </div>
     
    </div>
  </div>
</div>
@endsection
 
              