
@extends('layouts/frontend/main')

@section('fcontent')

	<section>
		<div class="container">
			<div class="row">
				@include('frontend/sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ Storage::url($Product->prImage) }}" alt="Product Image" />
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{ $Product->prName }}</h2>
								<p>Web ID: 1089772</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>$ {{ $Product->prPrice }}</span>
									<br></br>
									<label>Quantity:</label>
									<form method="post" action="{{ route('addtoCartQan') }}">
										@csrf 
										<input type="hidden" name="prId" value="{{ $Product->prId }}" />
										{{-- <input type="hidden" name="cusId" value="{{ Auth::user()->id }}" /> --}}
										<input type="number" min="1" name="quantity" value="1" />
										@if (Auth::user())
											<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
										@endif
										

									</form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Category:</b> {{ $Product->catName }}</p>
								<p><b>Brand:</b> {{ $Product->brName }}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" ><p>{{ $Product->prDiscrip }}</p>
									<p></p>
							</div>

							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									@php
									use App\Models\Comments;

									$comments = Comments::select('*')
												->where('comments.prId', '=', $Product->prId)
												->paginate(5);
										
									@endphp

									@foreach ($comments as $comment)<ul>
										<li> <i class="fa fa-user"></i> {{ $comment->cusName }}</li>
										<li> <i class="fa fa-calendar-o fa fa-clock-o"></i> {{ $comment->updated_at }}</li>
									</ul>
									<p>{{ $comment->comment }}</p>
									<p>Rated <b>{{ $comment->prRating }}</b> out of 5</p>

									@endforeach
									{{ $comments->onEachSide(5)->links() }}
									
									<p><b>Write Your Review</b></p>
									<form action="{{ route('addComment') }}" method="post">
										@csrf
										<input type="hidden" name="prId" value="{{ $Product->prId }}">
										<textarea name="comment" ></textarea>
										<b>Rating: </b> <input type="number" name="rating" min="1" max="5" value="5">
										{{-- <button type="button" class="btn btn-default pull-right">
											Submit
										</button> --}}
										<input class="btn btn-default pull-right" type="submit" value="Submit">
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					@include('frontend/recomandedProduct');
					
				</div>
			</div>
		</div>
	</section>
	
@endsection