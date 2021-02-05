@extends('layouts/frontend/main')

@section('fcontent')


<div class="card">
	<!-- /.card-header -->
	<div class="card-body container">
		<h1>Whitelist</h1>
		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						@php
						use App\Models\WteList;
						$i = 1;
						$products = WteList::select('*')
						->join('products','wte_lists.prId','products.prId')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->where('cusId', '=', Auth::user()->id)
						->get();

						@endphp
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SL</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Product Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Category Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Brand Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Price</th>
								
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
							<tr role="row" class="odd">
								<td>{{ $i++ }}</td>
								<td>{{ $product->prName }}</td>
								<td>
									{{ $product->catName }}
								</td>
								<td>
									{{ $product->brName }}
								</td>
								<td>
									$ {{ $product->prPrice }}
								</td>
								
								<td>
									<a class="right badge badge-danger" href="{{ route('removeWhite', $product->wtId) }}">Remove</a>
									<a class="right badge badge-danger" href="{{ route('proDetails', $product->prId) }}">Details</a>
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