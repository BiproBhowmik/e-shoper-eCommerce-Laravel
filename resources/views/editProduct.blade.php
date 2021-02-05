@extends('layouts/admin')
@section('headText')
Product Edit
@endsection

@section('title')
Product Edit :: E-Shoper
@endsection

@section('content')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Product Edit</h3>
	</div>

	@php
	use App\Models\Catagory;
	use App\Models\Brand;
	
	$Catagorys = Catagory::all();
	$brands = Brand::select('*')
						->where('catId','=',$product->catId)
						->get();
	@endphp

	<!-- /.card-header -->
	<!-- form start -->
	
	<form role="form" method="post" action="{{ route('storeEditPro') }}" enctype="multipart/form-data">
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
				<input name="prId" type="hidden" class="form-control" placeholder="Enter Product's Name" value="{{ $product->prId }}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Product Name</label>
				<input name="pName" type="text" class="form-control" placeholder="Enter Product's Name" value="{{ $product->prName }}">
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">Catagory</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Catagorys</label>
					</div>
					<select id="for_editBrand" name="catId" class="custom-select">
						<option disabled selected>Choose Catagory Name...</option>
						@foreach ($Catagorys as $Catagory)

						<option 

						@if ($product->catId == $Catagory->catId)
						selected
						@endif

						id="CatagoryId"

						value="{{ $Catagory->catId }}">{{ $Catagory->catName }}</option>
						@endforeach

					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Brand</label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Brands</label>
					</div>
					<select name="brId" class="custom-select" id="Brand_editdropdown">
						<option disabled selected>Choose Catagory Name...</option>
						@foreach ($brands as $Brand)

						<option 

						@if ($product->brId == $Brand->brId)
						selected
						@endif

						id="brandId"

						value="{{ $Brand->brId }}">{{ $Brand->brName }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label>Product Info</label>
				<textarea name="pInfo" class="form-control" rows="3" placeholder="Enter ...">{{ $product->prDiscrip }}"</textarea>
			</div>

			<div class="form-group">
				<label>Product Price</label>
				<input name="pPrice" type="text" class="form-control" placeholder="Enter Product's Name" value="{{ $product->prPrice}}">
			</div>
			
			<div class="form-group">
				<label for="exampleInputFile">File input <img src="{{ Storage::url($product->prImage) }}" width="20%"></label>
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