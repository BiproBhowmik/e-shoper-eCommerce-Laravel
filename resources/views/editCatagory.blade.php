@extends('layouts/admin')
@section('headText')
Edit Catagorys
@endsection

@section('title')
Edit Catagory :: E-Shoper
@endsection

@section('content')

	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('uppCat') }}">
              	@csrf
                @foreach ($Catagorys as $Catagory)
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Catagory Name</label>
                    <input name="catName" type="text" class="form-control" placeholder="Enter Catagory Name" value="{{ $Catagory->catName }}">
                    <input name="CatId" type="hidden" class="form-control" placeholder="Enter Catagory Short Form" value="{{ $Catagory->catId }}">
                  </div>
                  
                </div>

                @endforeach
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit Catagory</button>
                </div>
              </form>
            </div>


@endsection