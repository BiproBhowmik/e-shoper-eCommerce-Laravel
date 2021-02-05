@extends('layouts/admin')
@section('headText')
Edit Brand
@endsection

@section('title')
Edit Brand :: Student Management
@endsection

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Quick Example</h3>
  </div>

          @php
          use App\Models\Catagory;
          $Catagories = Catagory::all();
          $Brand;
          foreach ($Brandes as $bra) {
            $Brand = $bra; //for select Brand Catagory
          }
          @endphp
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="{{ route('uppBr') }}">
           @csrf 
           <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Catagory Name</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Catagories</label>
                </div>

                

                <select name="catId" class="custom-select" id="inputGroupSelect01">
                  @foreach ($Catagories as $Catagory)

                  <option

                  @if ($Catagory->catId == $Brand->catId)
                  selected
                  @endif

                  value="{{ $Catagory->catId }}">{{ $Catagory->catName }}</option>
                  @endforeach
                </select>

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Brand Name</label>
                <input name="brName" type="text" class="form-control" placeholder="Enter Brand Name" value="{{ $Brand->brName }}">
                <input name="brId" type="hidden" class="form-control" placeholder="Enter Brand Name" value="{{ $Brand->brId }}">
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update Brand</button>
            </div>
          </form>
        </div>


        @endsection