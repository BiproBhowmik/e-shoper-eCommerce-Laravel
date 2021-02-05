@extends('layouts/admin')
@section('headText')
Product Information
@endsection

@section('title')
Product Information :: E-Shoper
@endsection

@section('content')


<section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img src="{{ Storage::url($Product->prImage) }}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ $Product->prName }}</p>

              <hr>
              <h4>{{ $Product->catName }}</h4>

              <h4 class="mt-3">{{ $Product->brName }}</h4>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                 $ {{ $Product->prPrice }}
                </h2>
                <h4 class="mt-0">
                  <small>Ex Tax: $00.00 </small>
                </h4>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{ $Product->prDiscrip }}</div>
              @php
                  use App\Models\Comments;

                  $comments = Comments::select('*')
                        ->where('comments.prId', '=', $Product->prId)
                        ->paginate(5);
                    
                  @endphp


              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
                @foreach ($comments as $comment)<ul>
                    <li> <i class="fa fa-user"></i>
                    <a href="{{ route('viewUserPrfl', $comment->cusId) }}"> {{ $comment->cusName }}</a></li>
                    <li> <i class="fa fa-calendar-o fa fa-clock-o"></i> {{ $comment->updated_at }}</li>
                  </ul>
                  <p>{{ $comment->comment }}</p>
                  <p>Rated <b>{{ $comment->prRating }}</b> out of 5</p>

                  @endforeach
                  {{ $comments->onEachSide(5)->links() }}
              </div>
              {{-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div> --}}
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>


@endsection