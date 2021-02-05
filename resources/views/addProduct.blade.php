@extends('layouts/admin')
@section('headText')
Add Product
@endsection

@section('title')
Add Product :: E-Shoper
@endsection

@section('content')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Add Product</h3>
	</div>

	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" method="post" action="{{ route('storePro') }}" enctype="multipart/form-data">
		{{ csrf_field() }} 	{{-- hidden token --}}
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Product Name</label>
				<input name="pName" type="text" class="form-control" placeholder="Enter Product's Name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Catagory</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Catagorys</label>
					</div>
					<select id="for_Brand" name="catId" class="custom-select">
						<option disabled selected>Choose Catagory Name...</option>
						@foreach ($Catagorys as $Catagory)
						<option id="CatagoryId" value="{{ $Catagory->catId }}">{{ $Catagory->catName }}
						</option>
						@endforeach
					</select>
				</div>
				{{-- <input name="Catagory" type="text" class="form-control" placeholder="Catagory"> --}}
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Brand</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Brands</label>
					</div>
						<select name="brId" class="custom-select" id="Brand_dropdown">
							<option disabled selected value="">Chose Brand Name...</option>
						</select>
				</div>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Product Info</label>
				<textarea name="pInfo" class="form-control" rows="3" placeholder="Enter ..."></textarea>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Product Price</label>
				<input name="pPrice" type="text" class="form-control" placeholder="Enter Product's Name">
			</div>
			
			<div class="form-group">
				<label for="exampleInputFile">File input</label>
				<div class="input-group">
					<div class="custom-file">
						<input name="exampleInputFile" type="file" class="custom-file-input" id="exampleInputFile">
						<label class="custom-file-label" for="exampleInputFile">Choose file</label>
					</div>
					<div class="input-group-append">
						<span class="input-group-text" id="">Upload</span>
					</div>
				</div>
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>


@endsection