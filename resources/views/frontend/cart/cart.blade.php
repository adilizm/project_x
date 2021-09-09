@extends('frant_master')

@section('frant_head')

@stop
@section('frant_content')
<section class="section-content padding-y">
<div class="container">

<div class="row">
	<main class="col-md-9">
<div class="card">

<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody>
@foreach($products_in_cart as $product)
<tr>
	<td>
		<a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product['product']->slug])}}">
		<figure class="itemside">
			<div class="aside"><img src=" {{ '/storage/'. $product['product']->Images()->where('is_main','1')->first()->path}}" class="img-sm"></div>
			<figcaption class="info">
				<a href="{{route('product.index',['language'=>app()->getLocale(),'slug'=>$product['product']->slug])}}" class="title text-dark">  {{$product['product']->name}}</a>
				<p class="text-muted small">Size: XL, Color: blue, <br> Brand: Gucci</p>
			</figcaption>
		</figure>
		</a>
	</td>
	<td> 
			<div class="d-flex" id="{{'div_qty_'.$loop->index}}">
                <button class="form-control" onclick="decreas_qty('{{ $loop->index }}','{{$product['product']->prix}}') "  >-</button>
                <input style="width: 33px; padding: 0; padding-left:2px" class="form-control " value="{{$product['quantity']}}"  min="{{$product['product']->min_quantity}}" max="{{ $product['available_qty'] }}" type="number" id="qty_wanted">
                <button class="form-control"  onclick="encreas_qty('{{ $loop->index }}','{{$product['product']->prix}}') " >+</button>
            </div>
		
	</td>
	<td> 
		<div class="price-wrap" > 
			<!-- do not remove total-product class -->
			<var class="price total-product " id="{{'this_product_total'. $loop->index}}" val="{{$product['product']->prix * $product['quantity']}}">  {{$product['product']->prix * $product['quantity']}}</var> 
			<small class="text-muted"> {{$product['product']->prix}} each </small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a data-original-title="Save to Wishlist" title="" href="#" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
	<a href="#" class="btn btn-light" > Remove</a>
	</td>
</tr>
@endforeach
</tbody>
</table>

<div class="card-body border-top">
	<a href="{{ route('create_order',['language'=>app()->getLocale()]) }}" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
	<a href="#" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
</div>	
</div> <!-- card.// -->

<div class="alert alert-success mt-3">
	<p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
</div>

	</main> <!-- col.// -->
	<aside class="col-md-3">
		<div class="card mb-3">
			<div class="card-body">
			<form>
				<div class="form-group">
					<label>Have coupon?</label>
					<div class="input-group">
						<input type="text" class="form-control" name="" placeholder="Coupon code">
						<span class="input-group-append"> 
							<button class="btn btn-primary">Apply</button>
						</span>
					</div>
				</div>
			</form>
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
		<div class="card">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt>Total price:</dt>
					  <dd class="text-right" id="total_no_coupon">568</dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Discount:</dt>
					  <dd class="text-right" id="copon_value">000</dd>
					</dl>
					<hr>
					<dl class="dlist-align">
					  <dt>Total:</dt>
					  <dd class="text-right  h5"><strong id="Total_to_pay" >1,650</strong></dd>
					</dl>
					
					
					
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
    

@stop
@section('frant_script')
	<script>
		function decreas_qty(position,product_price){
			const min =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).getAttribute('min')	;
			const max =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).getAttribute('max')
			var value =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value;
			var product_total = 0;
			value--;
			if(value< min){
				value=min;
			}
			document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value=value
			var product_total=value*product_price;
			document.querySelector('#this_product_total'.concat(position.toString())).innerHTML=product_total;
			calculate_Total_products()
		}
		function encreas_qty(position,product_price){
			const max =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).getAttribute('max')
			var value =	document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value;
			var product_total = 0;
			value++;
			if(value> max){
				value=max;
			}
			document.querySelector('#div_qty_'.concat(position.toString()).concat(' input')).value=value
			var product_total=value*product_price;
			document.querySelector('#this_product_total'.concat(position.toString())).innerHTML=product_total;
			calculate_Total_products()
		}
		function calculate_Total_products(){
			var total= 0.0;
			//console.log('total no copun = ',total);
			document.querySelectorAll('.total-product').forEach(element=>{
				total = total+parseFloat(element.innerHTML);
			})
			//console.log('total no copun = ',total);
			document.querySelector('#total_no_coupon').innerHTML=total;
			calculate_Total_to_pay()
		}
		function calculate_Total_to_pay(){
			var total_products = document.querySelector('#total_no_coupon').innerHTML;
			var coupon_value = document.querySelector('#copon_value').innerHTML;
			var Total_to_pay = total_products-coupon_value;
			document.querySelector('#Total_to_pay').innerHTML=Total_to_pay;
			
		}
	</script>
@stop