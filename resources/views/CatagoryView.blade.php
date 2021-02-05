@extends('layouts/admin')

@section('headText')
All Catagorys  <a href="" class="btn btn-success" data-toggle="modal" data-target="#categoryAddModal"><i class="fas fa-plus"></i> Add New</a>
@endsection

@section('title')
Catagorys :: Student Management
@endsection

@section('content')

<div class="card">
	<!-- /.card-header -->
	<div class="card-body">
		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table id="catTable" class="example1 table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						@php
						$i = 1;

						@endphp
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SL</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Catagory Name</th>
								
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($Catagorys as $Catagory)
             <tr id="catId{{ $Catagory->catId }}" role="row" class="odd">
              <td>{{ $i++ }}</td>
              <td>{{ $Catagory->catName }}</td><td class="text-left py-0 align-middle">
               <div class="btn-group btn-group-sm text-left">
                 <a onclick="editCategory({{ $Catagory->catId }})" href="javascript:voud(0)" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                 <meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
                 <button class="btn btn-danger catDelete" data-id="{{ $Catagory->catId }}"><i class="fas fa-trash"></i></button>
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

<!-- Modal Add Catagory -->
<div class="modal fade" id="categoryAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Category</h5>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="categoryForm">
         @csrf

         <div class="card-body">
          <div class="form-group">
            <label for="catName">Catagory Name</label>
            <input id="catName" type="text" class="form-control" placeholder="Enter Catagory Full Name">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Add Catagory</button>
        </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Modal Edit Category -->
<div class="modal fade" id="categoryEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="categoryEditForm">
         @csrf

         <div class="form-group">
          <input id="catEditId" type="hidden">
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="catEditName">Catagory Name</label>
            <input id="catEditName" type="text" class="form-control" placeholder="Enter Catagory Full Name">
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Update Catagory</button>
        </div>

      </form>
    </div>
  </div>
</div>
</div>



@endsection