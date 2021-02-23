@extends('layouts/admin')

@section('headText')
All Orders
@endsection

@section('title')
Orders :: E-Shoper
@endsection

@section('content')
						{{-- @php

						use App\Models\Orders;

						$orders = Orders::select('*')
							->join('products','products.prId','orders.prId')
							->join('catagories','products.catId','catagories.catId')
							->join('brands','products.brId','brands.brId')
							->join('users','users.id','orders.cusId')
							->orderBy('orders.ordId', 'desc')
							->get();

						@endphp --}}

<div class="card">
	<!-- /.card-header -->
	<div class="card-body">
		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table id="ordTable" class="example1 table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">OrderId</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name(CusID)</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Product Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Category Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Brand Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Quantity</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Price</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Method</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($orders as $order)
							<tr role="row" class="odd">
								<td>{{ $order->ordId }}</td>
								<td> <a href="{{ route('viewUserPrfl', $order->cusId) }}"> {{ $order->name }} ({{ $order->cusId }}) </a></td>
								<td>{{ $order->prName }}</td>
								<td>{{ $order->catName }}</td>
								<td>{{ $order->brName }}</td>
								<td>{{ $order->quantity }}</td>
								<td>{{ $order->quantity * $order->prPrice }}</td>
								<td>{{ $order->method }}</td>
								<td>
									<a class="right badge
									@if ($order->status == 'Panding')
									badge-warning
									@elseif($order->status == 'Shipping')
									badge-info
									@elseif($order->status == 'Handed Over')
									btn-secondary
									@elseif($order->status == 'Delete')
									btn-danger
									@endif
									" href="{{ route('cngOrdSts', [$order->status, $order->ordId]) }}">{{ $order->status }}</a>
								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection