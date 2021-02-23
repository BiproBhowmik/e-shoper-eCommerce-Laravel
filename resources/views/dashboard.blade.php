@extends('layouts/admin')

@section('content')


    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ DB::table('catagories')->count() }}</h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-printer"></i>
              </div>
              <a href="{{ route('viewCatPage') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ DB::table('brands')->count() }}</h3>

                <p>Brands</p>
              </div>
              <div class="icon">
                <i class="ion ion-nuclear"></i>
              </div>
              <a href="{{ route('viewBrPage') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ DB::table('products')->count() }}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-calculator"></i>
              </div>
              <a href="{{ route('viewProduct') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box badge-primary">
              <div class="inner">
                <h3>{{ DB::table('users')->count() }}</h3>

                <p>Total Useres</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="{{ route('userlist') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ DB::table('Reports')->count() }}</h3>

                <p>Reports</p>
              </div>
              <div class="icon">
                <i class="ion ion-chatbox-working"></i>
              </div>
              <a href="{{ route('viewReports') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ DB::table('sessions')->count() }}</h3>

                <p>Total Active Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection