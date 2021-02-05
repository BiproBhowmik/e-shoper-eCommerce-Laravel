<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>

        @php
        use App\Models\Brand;
        use App\Models\Catagory;
        use App\Models\Product;
        @endphp
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @php
            $Catagorys = Catagory::all();
            @endphp

            @foreach ($Catagorys as $Catagory)

            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                    {{ $Catagory->catName }}
                    <span class="caret"></span>
                </button>
                @php
                $brands = Brand::select('*')
                ->where('catId', $Catagory->catId)
                ->get();
                @endphp 
                <ul class="dropdown-menu">
                    @foreach ($brands as $brand)
                    @php
                    $productCount = DB::table('products')
                    ->where('brId', '=', $brand->brId)
                    ->count();
                    @endphp
                    <li><a href="{{ route('viewByCatBr', [$brand->catId, $brand->brId]) }}">{{ $brand->brName }} ({{ $productCount }})</a></li>
                    @endforeach
                </ul>
            </div>

            @endforeach
        </div><!--/category-products-->

        <div class="shipping text-center"><!--shipping-->
            <img width="50px" height="50px" src="{{ asset('frontend/images/home/shipping.jpg') }}" alt="" />
        </div><!--/shipping-->

    </div>
</div>