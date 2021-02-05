@extends('layouts/frontend/main')

@section('fcontent')

<section id="cart_items">
<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">My Orderes</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td class="total">Other</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@php
					use App\Models\Orders;
						$totalOrder = 0;
						$products = Orders::select('*')
						->join('products','orders.prId','products.prId')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->where('cusId', '=', Auth::user()->id)
						->get();
					@endphp
					@foreach ($products as $product)
					<tr>
						<td class="cart_product">
							<a href=""><img height="50px" width="50px" src="{{ Storage::url($product->prImage) }}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $product->prName }}</a></h4>
							<p>Web ID: 1089772</p>
						</td>
						<td class="cart_price">
							<p>{{ $product->prPrice }}</p>
						</td>
						<td>
							<p>{{ $product->quantity }}</p>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{ $product->prPrice*$product->quantity }}</p>
							@php
								$totalOrder += ($product->prPrice*$product->quantity);
							@endphp
						</td>
						<td class="cart_delete">
							@if ($product->status == 'Panding' || $product->status == 'Delete')
								<a class="cart_quantity_delete" href="{{ route('orderDelete', [$product->ordId]) }}"><i class="fa fa-times"></i></a>
							@else
								<p class="cart_description">{{ $product->status }}</p>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

<div class="total_area container">
					<ul>
						<li>Order Sub Total <span>{{ $totalOrder }}</span></li>
						<li>Eco Tax <span>0.00 (0%)</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>{{ $totalOrder }}</span></li>
					</ul>

				</div>


@endsection