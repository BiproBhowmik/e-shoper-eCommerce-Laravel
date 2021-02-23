<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($sliderP as $product)
                        <div class="
                            @if ($sl == 1)
                                active
                            @endif
                        item">
                        @php
                            $sl++;
                        @endphp
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>{{ $product->prName }}</h2>
                                <a href="{{ route('proDetails', $product->prId) }}" class="btn btn-default get"></i>Details</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ Storage::url($product->prImage) }}" class="girl img-responsive" alt="" />
                                {{-- <img src="{{ asset('frontend/images/home/pricing.png') }}"  class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->