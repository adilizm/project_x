<div class="w-100">
   @foreach($prod_result as $product)
   <a href="#">
        <div class="d-flex justify-content-center">
           <img width="40" src="{{'/storage/'.$product->Images()->where('is_main','1')->first()->path}}" alt="{{$product->name}}"> 
            {{$product->name}}
        </div>
        </a>
   @endforeach  
</div>