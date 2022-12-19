@extends('dashboards.users.home.index')
@section('infocontent')
<h1 class="post-title-lg title-lg-vip2">
{{ $motels[0]->title }}
</h1>
<div class="page_content">
  <div class="row">
    <div class="col-xs-12 col-md-8 block-left pdr-0">
      <div class="view-detail">
        <div class="block-content">
          <div class="block-content-meta">
            <div class="post_summary_wrapper hidden-xs">
              <div class="post_summary clearfix">
                <div class="summary_row clearfix">
                  <div class="post_summary_left fullwidth">
                    <div class="summary_item_headline">Lượt xem:</div>
                    <div class="summary_item_info"><!-- check view post -->
                          @if (!empty($motels[0]->count_view))
                               {{ $motels[0]->count_view }}
                          @else
                            0
                          @endif
                    </div>
                  </div>
                  <div class="post_summary_left fullwidth">
                    <div class="summary_item_headline">Địa chỉ:</div>
                    <div class="summary_item_info">{{ $motels[0]->address}}</div>
                  </div>
                </div>
                <div class="summary_row clearfix">
                  <div class="post_summary_left">
                    <div class="summary_item_headline">Chuyên mục:</div>
                    <div class="summary_item_info">
                      <h2>
                        <a href="https://thuephongtro.com/cho-thue-phong-tro">Cho thuê phòng trọ</a>
                      </h2>
                    </div>
                  </div>
                  <div class="post_summary_right">
                    <div class="summary_item_headline">Mã tin:</div>
                    <div class="summary_item_info"> {{ $motels[0]->id}} </div>
                  </div>
                </div>
                <div class="summary_row clearfix">
                  <div class="post_summary_left">
                    <div class="summary_item_headline">Giá cho thuê:</div>
                    <div class="summary_item_info summary_item_info_price">{{ $motels[0]->price}} vnd/tháng</div>
                  </div>
                  <div class="post_summary_right">
                    <div class="summary_item_headline">Diện tích:</div>
                    <div class="summary_item_info summary_item_info_price">{{ $motels[0]->area}} m²</div>
                  </div>
                </div>
                <div class="summary_row clearfix">
                  <div class="post_summary_left">
                    <div class="summary_item_headline">Liên hệ: </div>
                    <div class="summary_item_info">quan ly</div>
                  </div>
                  <div class="post_summary_right">
                    <div class="summary_item_headline">Ngày đăng:</div>
                    <div class="summary_item_info">{{ $motels[0]->created_at}}</div>
                  </div>
                  <div class="post_summary_right">
                    <div class="summary_item_headline">Ngày cập nhật:</div>
                    <div class="summary_item_info">{{ $motels[0]->updated_at}}</div>
                  </div>
                </div>
                <div class="summary_row">
                  <div class="post_summary_left">
                    <div class="summary_item_headline">Điện thoại:</div>
                    <div class="summary_item_info summary_item_info_phone">
                      <a href="tel:" class="js-get-phone" data-phone="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>{{$motels[0]->phone}}</span>
                      </a>
                    </div>
                  </div>
                  <!-- <div class="post_summary_right">
                    <div class="summary_item_headline">Ngày hết hạn:</div>
                    <div class="summary_item_info">19/12/2022 16:36</div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="block-content" id="_motachitiet">
          <div class="post_summary_wrapper">
            <div class="post_summary-content">
            {{$motels[0]->description}}
          </div>
        </div>
        <div class="alert alert-warning post_report mgt-15">
          <p>Mọi thông tin trên website chỉ mang tính chất tham khảo. Chúng tôi luôn cố gắng cung cấp các thông tin đầy đủ, chính xác và minh bạch đến người xem, tuy nhiên quá trình kiểm duyệt vẫn có thể xảy ra sơ sót. Nếu bạn có phản hồi với tin đăng này (tin đã cho thuê, không liên lạc được, các trường hợp khác), vui lòng thông báo để Thuephongtro có thể xử lý.</p>
          <p>
            <a class="btn btn-danger" target="_blank" href="/lien-he.html">Gửi phản hồi</a>
          </p>
        </div>
      </div>
      <div class="list-all-new">
        <div class="feature-news">
          <h3 class="title">
            <span>TIN LIÊN QUAN</span>
          </h3>
        </div>
        <div class="news-item item-vip2 hot-bg">
          <div class="news-thumb">
            <a href="/phong-tro-full-noi-that-cao-cap-day-du-rat-dep-nhu-khach-san-5-sao-166629.html">
              <img src="https://img.thuephongtro.com/images/thumb/2021/03/22/20210322151913-3yztz.jpg" data-src="https://img.thuephongtro.com/images/thumb/2021/03/22/20210322151913-3yztz.jpg" alt="Phòng : FULL NỘI THẤT CAO CẤP ĐẦY ĐỦ TIỆN NGHI, rộng đẹp như căn hộ" class="lazyload">
            </a>
            <div class="icons">VIP</div>
          </div>
          <div class="news-info">
            <h4 class="news-title">
              <a href="/phong-tro-full-noi-that-cao-cap-day-du-rat-dep-nhu-khach-san-5-sao-166629.html" title="Phòng : FULL NỘI THẤT CAO CẤP ĐẦY ĐỦ TIỆN NGHI, rộng đẹp như căn hộ">Phòng : full nội thất cao cấp đầy đủ tiện nghi, rộng đẹp như căn hộ</a>
            </h4>
            <div class="news-desc"> - CĂN HỘ - PHÒNG TRỌ CAO CẤP RẤT ĐẸP NHƯ KHÁCH SẠN 5 SAO FULL ĐẦY ĐỦ NỘI THẤT CAO CẤP TIỆN NGHI. - Gần các tuyến đường lớn như: Tô Hiệu Hòa Bình....vô trung tâm chỉ vài phút. ------- GIÁ ------ - Các phòng đều có FULL ĐỦ</div>
            <div class="room-detail">
              <div class="localtion">
                <div class="clearfix">
                  <span class="price">
                    <b>2.6 Triệu/tháng</b>
                  </span>
                  <div class="rating">
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <div class="clearfix">
                  <span>Diện tích: <b>30 m²</b>
                  </span>
                  <span class="mgl-10">Khu vực: <b>
                      <a href="/cho-thue-phong-tro-tan-phu">Tân Phú, Hồ Chí Minh</a>
                    </b>
                  </span>
                  <div class="room-detail-item hidden-xs">
                    <span class="time">Hôm nay</span>
                  </div>
                  <div class="visible-xs">
                    <span>Cập nhật: Hôm nay</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection