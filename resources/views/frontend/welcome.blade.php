@extends('layouts/frontend/main')

@section('fcontent')
{{-- expr --}}
@include('layouts/frontend/slider');

<section>
    <div class="container">
        <div class="row">

            @include('frontend/sidebar')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    @foreach ($products as $product)
                    {{-- expr --}}

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ Storage::url($product->prImage) }}" alt="" />
                                    <h2>$ {{ $product->prPrice }}</h2>
                                    <p>{{ $product->prName }}</p>
                                    <p>{{ $product->brName }}</p>
                                    <p>{{ $product->crName }}</p>
                                    @if (Auth::user())
                                    {{-- expr --}}
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    @endif                                        
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{ route('proDetails', $product->prId) }}" class="btn btn-default add-to-cart">Details</a>
                                        <h2>$ {{ $product->prPrice }}</h2>
                                        <p>{{ $product->prName }}</p>
                                        <p>{{ $product->brName }}</p>
                                        <p>{{ $product->crName }}</p>
                                        @if (Auth::user())
                                        {{-- expr --}}
                                        <a href="{{ route('addtoCart', $product->prId) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    @if (Auth::user())
                                    <li><a href="{{ route('addWtLst', [Auth::user()->id, $product->prId]) }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="{{ route('addCmprLst', [$product->prId, Auth::user()->id]) }}"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>

                @include('frontend/recomandedProduct');

            </div>
        </div>
    </div>
</section>

@endsection