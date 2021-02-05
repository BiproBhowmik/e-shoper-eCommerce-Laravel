@extends('layouts/admin')

@section('headText')
User Profile
@endsection

@section('title')
Profile :: E-Shoper
@endsection

@section('content')

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="card card-primary card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" src="{{ Storage::url($user->profile_photo_path) }}" alt="User profile picture">
						</div>

						<h3 class="profile-username text-center">{{ $user->name }}</h3>

						<p class="text-muted text-center">{{ $user->userType }}</p>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

				<!-- About Me Box -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">About</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<strong><i class="fas fa-book mr-1"></i> Email</strong>

						<p class="text-muted">
							{{ $user->email }}
						</p>

						<hr>

						<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

						<p class="text-muted">{{ $user->address }}</p>

						<hr>

						<strong><i class="fas fa-pencil-alt mr-1"></i> Phone Number</strong>

						<p class="text-muted">
							{{ $user->phone }}
						</p>

						<hr>

						<strong><i class="far fa-file-alt mr-1"></i> Created</strong>

						<p class="text-muted">{{ $user->created_at }}</p>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Orderes</a></li>
							<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Reports</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">

							{{-- Start Activity --}}


							<div class="tab-pane active" id="activity">
								<!-- Post -->
								<div class="post">
									<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
										@php

										use App\Models\Orders;

										$i = 1;

										$orders = Orders::select('*')
										->join('products','products.prId','orders.prId')
										->join('catagories','products.catId','catagories.catId')
										->join('brands','products.brId','brands.catId')
										->join('users','users.id','orders.cusId')
										->where('orders.cusId', '=', $user->id)
										->get();

										@endphp
										<thead>
											<tr role="row">
												
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Product Name</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Category Name</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Brand Name</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Quantity</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Price</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Method</th>
												<th>Actions</th>

											</tr>
										</thead>
										<tbody>
											@foreach ($orders as $order)
											<tr role="row" class="odd">
												
												<td>{{ $order->prName }}</td>
												<td>{{ $order->catName }}</td>
												<td>{{ $order->brName }}</td>
												<td>{{ $order->quantity }}</td>
												<td>{{ $order->quantity * $order->prPrice }}</td>
												<td>{{ $order->method }}</td>
												<td>
													<a class="right badge
													@if ($order->status == 'Panding')
													badge-warning
													@elseif($order->status == 'Shipping')
													badge-info
													@elseif($order->status == 'Handed Over')
													btn-secondary
													@elseif($order->status == 'Delete')
													btn-danger
													@endif
													" href="{{ route('cngOrdSts', [$order->status, $order->ordId]) }}">{{ $order->status }}</a>
												</td>

											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- /.post -->
							</div>	


							{{-- End Activity --}}




							<!-- /.tab-pane -->
							<div class="tab-pane" id="timeline">
								@php

								use App\Models\Reports;

								$i = 1;

								$reports = Reports::select('*')
								->where('reports.cusId', '=', $user->id )
								->orderBy('reports.repId', 'desc')
								->get();

								@endphp

								@foreach ($reports as $report)
								<div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-timestamp float-right">{{ $report->created_at }}</span>
                        </div>
                        <div class="direct-chat-text bg-warning">
                          {{ $report->report }}
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
								@endforeach
							</div>
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>

@endsection