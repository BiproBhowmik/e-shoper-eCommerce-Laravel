<div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach ($recoProductsDec as $rdProduct)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::url($rdProduct->prImage) }}" alt="" />
                                                <h2>$ {{ $rdProduct->prPrice }}</h2>
                                                <p>{{ $rdProduct->prName }}</p>
                                                @if (Auth::user())
                                                {{-- expr --}}
                                                <a href="{{ route('addtoCart', $rdProduct->prId) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="item"> 

                                @foreach ($recoProductsAsc as $rdProduct)
                                {{-- expr --}}
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ Storage::url($rdProduct->prImage) }}" alt="" />
                                                <h2>$ {{ $rdProduct->prPrice }}</h2>
                                                <p>{{ $rdProduct->prName }}</p>
                                                @if (Auth::user())
                                                {{-- expr --}}
                                                <a href="{{ route('addtoCart', $rdProduct->prId) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>          
                    </div>
                </div><!--/recommended_items-->