@extends('layouts/admin')

@section('headText')
All Useres
@endsection

@section('title')
Useres :: E-Shoper
@endsection

@section('content')

<div class="card">
	<!-- /.card-header -->
	<div class="card-body">
		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table id="example1" class="example1 table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						@php
						$i = 1;
						$users = DB::table('users')->get();

						@endphp
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SL</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">User Type</th>
								
								
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr role="row" class="odd">
								<td>{{ $i++ }}</td>
								<td> <a href="{{ route('viewUserPrfl', $user->id) }}"> {{ $user->name }}</a></td>
								<td>{{ $user->email }}</td>
								<td>
									{{ $user->userType }}
								</td>
								<td>

									@if ($user->userType == "Normal")
									<a class="right badge badge-primary" href="{{ route('edituserType', [$user->id, 'Admin']) }}">

										Make Admin
									</a>
									@elseif ($user->userType == "Admin")
									<a class="right badge badge-dark" href="{{ route('edituserType', [$user->id, 'Normal']) }}">

										Make Normal User
									</a>
									@endif



									<a class="right badge badge-danger" href="{{-- {{ route('delCatagory', $user->catId) }} --}}">Delete User</a>
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