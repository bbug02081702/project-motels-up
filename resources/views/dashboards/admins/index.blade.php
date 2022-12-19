@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row" >
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countMotelsOk}}</h3>

                <p>Tong so phong tro da thue</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Xem them <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countPost}}<sup style="font-size: 28px"></sup></h3>

                <p>Tong so bai dang</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Xem them <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$countUsers}}</h3>

                <p>Tong so nguoi dung</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Xem them <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$countMotelsNotOk}}</h3>
                <p>Tong so phong tro chua thue</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Xem them<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    <!-- /.container-fluid -->
</section>

@endsection