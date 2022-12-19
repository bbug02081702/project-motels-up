@extends('users.home.index')
@section('infocontainer')
<div class="row">
          <div class="col-xs-12 col-md-8 pdr-0">
            <h2 class="titleNew"> CHO THUÊ MỚI NHẤT </h2>
            <div class="panel panel-default post-list">
              <div class="panel-body">
                <div class="list-all-new">
                  <div class="row" style="margin-top:-15px">
                  @if(count($motels)> 0)
                  @foreach($motels as $row)
                    <div class="col-xs-12 col-md-6">
                      <div class="news-item item-vip5">
                        <div class="news-thumb">
                          <a href="#">
                            <img src="{{asset('fotopegawai/'.$row->images)}}" alt="" class="lazyload">
                          </a>
                        </div>
                        <div class="news-info">
                          <h4 class="news-title text-lc">
                            <a href="{{url('motels/list/'.$row->id)}}" title="">{{$row->title}}</a>
                          </h4>
                          <div class="room-detail">
                            <div class="localtion">
                              <div class="clearfix">
                                <span>
                                  <i class="fa fa-area-chart"></i>
                                  <b>Dien tich: {{$row->area}}m&#178;</b>
                                </span>
                              </div>
                              <div class="clearfix">
                                <span>
                                  <i class="fa fa-map-marker"></i>
                                  <b>
                                    <a href=""> Dia chi: {{$row->address}}</a>
                                  </b>
                                </span>
                              </div>
                              <div class="clearfix">
                                <span>
                                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                                  <b>
                                    Ngay dang: {{$row->created_at}}
                                  </b>
                                </span>
                              </div>
                              <div class="clearfix">
                                <span>
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                  <b>
                                    Luot xem: {{$row->count_view}}
                                  </b>
                                </span>
                              </div>
                              <div class="mgt-5 clearfix">
                                <span class="price">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                  <b>Gia thue: {{$row->price}} vnd/tháng</b>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  @else
                  <p class="text-center" style="color:red;">Ko tim thay du lieu</p>
                  @endif
                  </div>
                </div>
              </div>
            </div>
            {{$motels->appends(request()->all())->links()}}
            <!-- content vip -->
            <div class="row">
              <div class="col-xs-12">
                <h2 class="titleVip"> PHONG TRO NHIEU LUOT XEM NHAT</h2>
              </div>
            </div>
            <div class="panel panel-default post-list">
              <div class="panel-body">
                <div class="list-all-new">
                  <div class="row" style="margin-top:-15px">
                  @if(count($motels_countview)>0)
                  @foreach($motels_countview as $view)
                    <div class="col-xs-12 col-md-6">
                      <div class="news-item item-vip2">
                        <div class="news-thumb">
                          <a href="">
                            <img src="{{asset('fotopegawai/'.$view->images)}}" alt="" class="lazyload">
                          </a>
                          <div class="icons">VIP</div>
                        </div>
                        <div class="news-info">
                          <h3 class="news-title">
                            <a href="{{url('motels/list/'.$view->id)}}" title="">{{$view->title}}</a>
                          </h3>
                          <div class="area mgt-5">
                            <span>
                              <i class="fa fa-area-chart"></i>
                              <b>Dien tich: {{$view->area}} m&#178;</b>
                            </span>
                            <span class="rating" style="color: #fc0">
                              <i class="fa fa-star"></i>
                            </span>
                          </div>
                          <div class="localtion">
                            <span>
                              <i class="fa fa-map-marker"></i>
                              <b>
                                <a href="">Dia chi: {{$view->address}}</a>
                              </b>
                            </span>
                          </div>
                          <div class="area mgt-5">
                            <span>
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <b>
                                  Ngay dang: {{$view->created_at}}
                                </b>
                            </span>
                          </div>
                          <div class="area mgt-5">
                            <span>
                              <i class="fa fa-eye" aria-hidden="true"></i>
                                <b>
                                  Luot xem: {{$view->count_view}}
                                </b>
                            </span>
                          </div>
                          <div class="price mgt-5">
                            <span>Gia thue: {{$view->price}} vnd/tháng</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                   @else
                 <p class="text-center" style="color:red;">Khong co du lieu</p>
                   @endif
                  </div>
                </div>
              </div>
            </div>
            {{$motels_countview->appends(request()->all())->links()}}
          </div>
          <div class="col-xs-12 col-md-4">
            <div class="sidebar-box">
              <h3 class="sidebarbox-title">
                <span>Danh mục cho thuê</span>
              </h3>
              <div class="sidebarbox-body">
                <ul class="box-lastnews">
                  <li>
                    <a title="Cho thuê phòng trọ thanh pho vinh" href="/cho-thue-phong-tro-ho-chi-minh">Cho thuê phòng trọ thanh pho vinh</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="mgb-15">
              <img src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8+B8AAucB8kTMRj8AAAAASUVORK5CYII=" data-src="/images/ads/ad-right.jpg?v=20200501" alt="" class="lazyload">
            </div>
            <div class="sidebar-box">
              <h3 class="sidebarbox-title">
                <span>Tin tức mới</span>
              </h3>
              <ul class="list_news_recent">
                <li class="news_item clearfix">
                  <a href="/tin-tuc/nha-thue-tp.hcm-giam-gia-2-3-trieu-dong-thang-p28131.html">
                    <div class="news_thumb">
                      <img class="lazyload" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8+B8AAucB8kTMRj8AAAAASUVORK5CYII=" data-src="https://img.thuephongtro.com/images/uploads/20200531080439-2fupv.jpg" data-loaded="true">
                    </div>
                    <div class="news_info">
                      <div class="news_item_title">Nhà thuê TP.HCM giảm giá 2-3 triệu đồng/tháng</div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
@endsection