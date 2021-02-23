@extends('layouts/admin')

@section('headText')
All Brands <a href="" class="btn btn-success" data-toggle="modal" data-target="#brandAddModal"><i class="fas fa-plus"></i> Add New</a>
@endsection

@section('title')
Brands :: E-Shoper
@endsection

@section('content')

<div class="card">
	<!-- /.card-header -->
	<div class="card-body">
		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table id="brTable" class="example1 table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						@php
						$i = 1;

						@endphp
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SL</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Category Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Brand Name</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($Brandes as $Brand)
							<tr id="brId{{ $Brand->brId }}" role="row" class="odd">
								<td>{{ $i++ }}</td>
								<td>{{ $Brand->catName }}</td>
								<td>{{ $Brand->brName }}</td>
						{{-- <td>
							<a class="right badge badge-warning" href="{{ route('editBrand', $Brand->brId) }}">Edit</a>
							<a class="right badge badge-danger" href="{{ route('delBrand', $Brand->brId) }}">Delete</a>
						</td> --}}
						<td class="text-left py-0 align-middle">
							<div class="btn-group btn-group-sm text-left">
								<a onclick="editBrand({{ $Brand->brId }})" href="javascript:voud(0)" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

								<meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
								<button class="btn btn-danger brDelete" data-id="{{ $Brand->brId }}"><i class="fas fa-trash"></i></button>
								{{-- <a href="{{ route('editBrand', $Brand->brId) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
								<a href="{{ route('delBrand', $Brand->brId) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
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

<!-- Modal Add Brand -->
<div class="modal fade" id="brandAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Category</h5>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="addBrandForm">
					@csrf

					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Category Name</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="catId">Catagorys</label>
								</div>

								@php
								use App\Models\Catagory;
								$Catagorys = Catagory::all();
								@endphp

								<select name="catId" class="custom-select" id="catId">
									<option disabled selected>Choose...</option>
									@foreach ($Catagorys as $Catagory)

									<option value="{{ $Catagory->catId }}">{{ $Catagory->catName }}</option>
									@endforeach
								</select>

							</div>
						</div>
						<div class="form-group">

							<label for="brName">Brand Name</label>
							<input id="brName" type="text" class="form-control" placeholder="Enter Catagory Full Name">
						</div>
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Add Brand</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Brand -->
<div class="modal fade" id="brandEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit Brand</h5>
			</div>
			<div class="modal-body">

				<form action="" method="POST" id="brandEditForm">
					@csrf

					<div class="form-group">
						<label for="exampleInputEmail1">Catagory Name</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Catagories</label>
							</div>

							<select name="catId" class="custom-select" id="catDropdown">
							</select>

						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputPassword1">Brand Name</label>
							<input id="brEditName" name="brEditName" type="text" class="form-control" placeholder="Enter Brand Name">
							<input id="brEditId" name="brEditId" type="hidden" value="">
						</div>


					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Update Brand</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>


@endsection