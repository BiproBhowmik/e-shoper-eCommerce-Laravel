@extends('layouts/admin')
@section('headText')
Add Brand
@endsection

@section('title')
Add Brand :: E-Shoper
@endsection

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Add Brand</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" method="post" action="{{ route('addBr') }}">
   @csrf 
   <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Catagory Name</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Catagorys</label>
        </div>

        @php
          use App\Models\Catagory;
          $Catagorys = Catagory::all();
        @endphp

        <select name="catId" class="custom-select" id="inputGroupSelect01">
          <option disabled selected>Choose...</option>
          @foreach ($Catagorys as $Catagory)

          <option value="{{ $Catagory->catId }}">{{ $Catagory->catName }}</option>
        @endforeach
        </select>

      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Brand Name</label>
      <input name="brName" type="text" class="form-control" placeholder="Enter Brand Name">
    </div>

  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Add Brand</button>
  </div>
</form>
</div>


@endsection