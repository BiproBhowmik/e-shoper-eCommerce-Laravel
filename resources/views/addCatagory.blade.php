@extends('layouts/admin')
@section('headText')
Add Catagory
@endsection

@section('title')
Add Catagory :: E-Shoper
@endsection

@section('content')

	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Catagory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('addCat') }}">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Catagory Name</label>
                    <input name="catName" type="text" class="form-control" placeholder="Enter Catagory Full Name">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Catagory</button>
                </div>
              </form>
            </div>


@endsection