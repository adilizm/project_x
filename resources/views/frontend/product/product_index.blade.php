@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="container">
            <img class="w-100" src="{{ '/storage/'. $product->Images()->where('is_main','1')->first()->path}}" alt="">
        </div>
        <div class="d-flex justify-content-center">
            @foreach($product->Images()->where('is_main','0')->get() as $image)
            <img width="90" src="{{'/storage/'.$image->path}}" alt="">
            @endforeach
        </div>
    </div>
    <div class="col-12 col-md-6 p-2">
        <div class="container">
            <div class="name mt-lg-5 mt-md-0 " style="font-size: 1.5rem;font-weight: 500;">{{$product->name}}</div>
        </div>
        <div id="prix" class="price" style="font-size: 1.4rem;padding: 10px;font-weight: 800;">
            {{$product->prix}} <span style=" font-size: 1.2rem; padding: -10px; font-weight: 300;">Dhs</span>
        </div>
        @foreach($options as $option)
        @if($option != "qty" && $option != "prix" && $option != "image")
        <div class=" row mx-2">
            <p class="col-12 col-md-4 m-0 text-center align-self-center ">{{$option}} : </p>
            <div class="col-12 col-md-8 d-flex justify-content-center" id="">
                @if($loop->count == 4)
                @foreach($variables[$loop->index] as $variable)
           
                <a href="javascript:void(0);" onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class="@if($loop->first) click @endif p-2 border m-1 cursor-pointer {{'option'.$loop->parent->index}}">{{$variable}}</a>
                @endforeach
                @else
                @foreach($variables[$loop->index] as $variable)
                <a href="javascript:void(0);" onclick="choos_option('{{$option}}','{{$variable}}','{{'option'.$loop->parent->index}}')" id="{{$variable}}" class="@if($loop->first) click @endif p-2 border m-1 cursor-pointer {{'option'.$loop->parent->index}}">{{$variable}}</a>
                @endforeach
                @endif
            </div>
        </div>
        @endif
        @endforeach
        <div class="d-flex align-items-center my-3">
            <div class="d-flex">
                <button class="form-control" id="decreas_qty" >-</button>
                <input class="form-control" value="{{$product->min_quantity}}" min="{{$product->min_quantity}}" type="number" name="qty_wanted" id="qty_wanted">
                <button class="form-control"  id="encreas_qty" >+</button>
            </div>
        </div>
        <div class="d-flex align-items-center my-3">
        <a href="javascript:void(0);" id="add_to_cart" class="btn btn-success w-100 d-block">add to cart</a>
    </div>
    </div>
</div>
@stop
@section('frant_script')
    <script>
    var variant_selected=null;
    const  product_id_ = {{$product->id}};
    var qty_wanted={{$product->min_quantity}};
    const min_qty_wanted={{$product->min_quantity}};
    const  variants=@JSON($variants);
    
        @foreach($options as $option)
            @if($option != "qty" && $option != "prix" && $option != "image")
        var {{'option'.$loop->index}}='{{$variables[$loop->index][0]}}';
            @endif
        @endforeach
       
        @if(count($options) != 0 )
        function choos_option(option,value,option_class){
            document.querySelectorAll('.'.concat(option_class)).forEach(element => {
                element.classList.remove('bg-dark');
                element.classList.remove('text-white');
            });
            document.getElementById(value).classList.add('bg-dark')
            document.getElementById(value).classList.add('text-white')
            if(typeof option0 !== 'undefined' && option_class=='option0'){
                option0=value;
            }else if(typeof option1 != 'undefined' &&  option_class == 'option1'){
                option1=value
            }else if(typeof option2 != 'undefined' && option_class == 'option3'){
                option2=value
            }
            console.log(option,' -- ', value);
            console.log('selected variants = '  @foreach($options as $option)  @if($option != "qty" && $option != "prix" && $option != "image") ,{{'option'.$loop->index}},' -- ' @endif @endforeach)
            variants.forEach((variant)=>{
               if(@foreach($options as $option)  @if($option != "qty" && $option != "prix" && $option != "image") variant['{{$option}}'] ==  @foreach($options as $option)  @if($option != "qty" && $option != "prix" && $option != "image" && $loop->index == $loop->parent->index) {{'option'.$loop->parent->index}} @endif @endforeach @if( ($loop->index+1) == ($loop->count-3))  @else &&  @endif @endif @endforeach){
    
                if(variant['qty']==0 && typeof option1 != 'undefined'){
/*                     alert('this variant is out of stock pls select an other variant')
 */                    document.querySelectorAll('.'.concat(option_class)).forEach(element => {
                        element.classList.remove('bg-dark');
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
                    console.log('variant selected is out of stock')
                    variant_selected=null;
                }else{
                    variant_selected=variant
                    console.log('selected_variant = ',variant_selected)
                    document.getElementById('prix').innerHTML=(variant.prix + ' Dhs');
                }
            }
            })
        }
        @endif

        document.getElementById('add_to_cart').addEventListener('click',()=>{
            console.log('selected variant = ',variant_selected);
            console.log('variants.length = ',variants.length);

           if(variant_selected == null && variants.length > 0 ){
               console.log('no variant selected ')
           }else{
            console.log('variant_selected = ', variant_selected);
            axios.post('{{route('add_to_cart',app()->getlocale())}}', {
                        params: {
                        selected_variant:variant_selected,
                        product_id:product_id_,
                        quantity:qty_wanted
                        }
            }).then(function(responce) {
                console.log(responce);
            }).catch(function(err) {

            console.log(err);

            })
           }

        })
       
        document.querySelectorAll('.click').forEach(element => {
                element.click();
            });
        document.getElementById('decreas_qty').addEventListener('click',()=>{
            qty_wanted--;
            if(qty_wanted < min_qty_wanted ){
                qty_wanted = min_qty_wanted
            }
            document.getElementById('qty_wanted').value = qty_wanted;
        })
        document.getElementById('decreas_qty').addEventListener('click',()=>{
            qty_wanted++;
            document.getElementById('qty_wanted').value = qty_wanted;
        })
    </script>
@stop