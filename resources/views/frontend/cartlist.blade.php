@extends('layouts/frontend/main')

@section('fcontent')

<section id="cart_items">


	{{-- @php
	use App\Models\Cart;
	$i = 1;
	$products = Cart::select('*')
	->join('products','carts.prId','products.prId')
	->join('catagories','products.catId','catagories.catId')
	->join('brands','products.brId','brands.brId')
	->where('cusId', '=', Auth::user()->id)
	->get();

	@endphp --}}

	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@php
					$subtotal = 0;
					$cartContents = Cart::content();
					// echo "<pre>";
					// print_r($cartContents);
					// echo "</pre>";
					@endphp
					@foreach ($cartContents as $product)
					<tr>
						<td class="cart_product">
							<a href=""><img height="50px" width="50px" src="{{ Storage::url($product->options->image) }}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $product->name }}</a></h4>
							<p>Web ID: 1089772</p>
						</td>
						<td class="cart_price">
							<p>{{ $product->price }}</p>
						</td>
						<td>
							<div>
								<form method="post" action="{{ route('upQuantity') }}">
									@csrf
									<input type="hidden" name="rowId" value="{{ $product->rowId }}">
									<input type="number" min="1" name="quantity" value="{{ $product->qty }}">
									<input type="submit" name="" id="" value="Update">

								</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{ $product->price*$product->qty }}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{ route('cartDelete', [$product->rowId]) }}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
						<li>Eco Tax <span>{{ Cart::tax() }} (0%)</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>{{ Cart::total() }}</span></li>
					</ul>

				</div>
					<form action="{{ route('order') }}" method="post">
						@csrf
						<div class="form-check">
							<input class="form-check-input" type="radio" name="method" value="HandCash" checked>
							<label class="form-check-label" for="exampleRadios1">
								Hand Cash
							</label>
						</div>
						
						{{-- <div class="form-check">
							<input class="form-check-input" type="radio" name="method" value="bKash">
							<label class="form-check-label" for="exampleRadios2">
								bKash
							</label>
						</div> --}}

						<input class="btn btn-default check_out" type="submit" value="Order">

						<button class="your-button-class" id="sslczPayBtn"
						        token="if you have any token validation"
						        postdata="your javascript arrays or objects which requires in backend"
						        order="If you already have the transaction generated for current order"
						        endpoint="/pay-via-ajax"> Online Payment
						</button>

						{{-- <a type="submit" class="btn btn-default check_out" href="">Order</a> --}}

					</form>
			</div>
		</div>
	</div>
</section>

@endsection