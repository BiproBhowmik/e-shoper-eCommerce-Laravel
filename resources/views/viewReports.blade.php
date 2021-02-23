@extends('layouts/admin')
@section('headText')
Reports <button id="repAllDelete" class="btn btn-danger"><i class="fas fa-trash"></i>  Delete Selected</button>
@endsection

@section('title')
Reports :: E-Shoper
@endsection

@section('content')

<div class="card">
	<!-- /.card-header -->
	<div class="card-body">
		<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
			<div class="row">
				<div class="col-sm-12">
					<table id="example1" class="example1 table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
								<th> <input id="repAllCheck" type="checkbox"> </th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ReportId</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name(CusID)</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Report</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Phone Number</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">email</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($reports as $report)
							<tr id="repId{{ $report->repId }}" role="row" class="odd">
								<td><input class="repCheck" name="repCheck" type="checkbox" value="{{ $report->repId }}"></td>
								<td>{{ $report->repId }}</td>
								<td> <a href="{{ route('viewUserPrfl', $report->cusId) }}"> {{ $report->name }} ({{ $report->cusId }}) </a></td>
								<td>{{ Str::substr($report->report, 0, 20) }}</td>
								<td>{{ $report->phone }}</td>
								<td>{{ $report->email }}</td>
								<td>
									<button onclick="viewReport('{{ $report->report }}')" class="btn btn-primary"><i class="fas fa-eye"></i></button>
									<meta name="csrf-token" content="{{ csrf_token() }}">  {{-- for Delete Ajax --}}
									<button class="btn btn-danger repDelete" data-id="{{ $report->repId }}"><i class="fas fa-trash"></i></button>
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



<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="repModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">The Report</h5>
			</div>
			<div class="modal-body" id="repBody">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection