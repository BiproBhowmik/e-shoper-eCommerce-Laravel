@extends('layouts/admin')
@section('headText')
Product Details
@endsection

@section('title')
Product Details :: E-Shoper
@endsection

@section('content')

<div class="card">
	<!-- /.card-header -->
	<div class="card-body">
		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table id="" class="example1 table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						@php
						$i = 1;

						@endphp
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SL</th>
								<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Product's Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Category</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Brand</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Product Info</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Price</th>
								<th>Picture</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
							<tr role="row" class="odd">
								<td>{{ $i++ }}</td>
								<td>{{ $product->prName }}</td>
								<td>{{ $product->catName }}</td>
								<td>{{ $product->brName }}</td>
								<td> {{ Str::substr($product->prDiscrip, 0, 20) }}</td>
								<td>{{ $product->prPrice }}</td>
								<td class="text-center">
									<img src="{{ Storage::url($product->prImage) }}" width="30%">
									{{-- $product->profile_photo_path --}}

								</td>
								{{-- <td>
									<a class="right badge badge-warning" href="{{ route('editproduct', $product->prId) }}">Edit</a>
									<a class="right badge badge-danger" href="{{ route('delproduct', $product->prId) }}">Delete</a>
								</td> --}}
								<td class="text-right py-0 align-middle">
									<div class="btn-group btn-group-sm">
										<a href="{{ route('viewProDetails', $product->prId) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
										<a href="{{ route('editproduct', $product->prId) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
										<a href="{{ route('delproduct', $product->prId) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
									</div>
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