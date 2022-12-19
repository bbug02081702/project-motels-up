@extends('user.home.index')
@section('postuser')
<h1 class="page_title">Đăng tin cho thuê phòng trọ</h1>
 <div class="page-post">
   <div class="row">
     <div class="col-xs-12 col-md-4 block-right sidebar_huongdan">
       <div class="hidden-xs">
         <div class="block_huongdandangtin">
           <div class="block_huongdandangtin_header"> Hướng dẫn đăng tin </div>
           <div class="block_huongdandangtin_body">
             <ul>
               <li>
                 <strong>Thông tin có dấu <span class="red_require">*</span> là bắt buộc. </strong>
               </li>
               <li>
                 <strong>Nội dung phải viết bằng tiếng Việt có dấu</strong>
               </li>
               <li>
                 <strong>Tiêu đề tin không dài quá 100 kí tự</strong>
               </li>
               <li>Các bạn nên điền đầy đủ thông tin vào các mục để tin đăng có hiệu quả hơn.</li>
               <li>Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon tới đúng vị trí của tin rao.</li>
               <li>Tin đăng có hình ảnh rõ ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh chóng!</li>
             </ul>
           </div>
         </div>
       </div>
     </div>
     <div class="col-xs-12 col-md-8 block-left dang_tin">
       <form action="/dang-tin.html" class="form frm-dangtin" enctype="multipart/form-data" id="frmPostCreate" method="post" role="form" novalidate="novalidate">
           <div class="group_fields">
             <h3 class="form_title">Thông tin cho thuê</h3>
             <div class="group_fields_body">
               <div class="form-group">
                 <div class="row">
                   <div class="col-sm-12">
                     <label class="control-label">Tiêu đề tin <span class="red_require">*</span>
                     </label>
                     <input class="form-control text-box single-line" data-val-maxlength="Tiêu đề tin tối đa là 100 ký tự" data-val-maxlength-max="100" data-val-minlength="Tiêu đề tin tối thiểu là 30 ký tự" data-val-minlength-min="30" data-val-required="Vui lòng nhập tiêu đề tin" id="Title" name="Title" type="text" value="">
                     <span class="field-validation-valid text-danger" data-valmsg-for="Title" data-valmsg-replace="true"></span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <div class="row">
                   <div class="col-sm-6 col-xs-12">
                     <label class="control-label">Danh mục <span class="red_require">*</span>
                     </label>
                     <select class="form-control" id="ddlPostCate" name="CategoryId" data-val-required="Vui lòng chọn chuyên mục">
                       <option value="1">Cho thuê phòng trọ</option>
                       <option value="11">Cho thuê căn hộ</option>
                       <option value="2">Cho thuê nhà nguyên căn</option>
                       <option value="3">Tìm người ở ghép</option>
                     </select>
                     <span class="field-validation-valid text-danger" data-valmsg-for="CategoryId" data-valmsg-replace="true"></span>
                   </div>
                   <div class="col-sm-6 col-xs-12">
                     <label class="control-label">Diện tích <span class="red_require">*</span>
                     </label>
                     <div class="input-group">
                       <input class="form-control text-box single-line" id="Area" maxlength="6" name="Area" type="text" value="">
                       <span class="input-group-addon" id="basic-addon2">m²</span>
                     </div>
                     <span class="field-validation-valid text-danger" data-valmsg-for="Area" data-valmsg-replace="true"></span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <div class="row">
                   <div class="col-sm-6">
                     <div class="clearfix">
                       <div class="pull-left">
                         <label class="control-label">Giá cho thuê <span class="red_require">*</span>
                         </label>
                       </div>
                       <div class="pull-right">
                         <span id="lblPrice" style="font-size:13px;color:#f3051b"></span>
                       </div>
                     </div>
                     <input class="form-control text-box single-line" data-val-number="Giá nhập không đúng" data-val-required="Vui lòng nhập giá" id="Price" maxlength="15" name="price" numbersonly="true" placeholder="Nhap gia cho thue" type="text" value="">
                     <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                   </div>
                   <div class="col-sm-6">
                     <div class="clearfix">
                       <div class="pull-left">
                         <label class="control-label">Dia chi <span class="red_require">*</span>
                         </label>
                       </div>
                       <div class="pull-right">
                         <span id="lblPrice" style="font-size:13px;color:#f3051b"></span>
                       </div>
                     </div>
                     <input class="form-control text-box single-line" placeholder="Nhap dia chi" type="text" value="">
                     <span class="field-validation-valid text-danger" data-valmsg-for="Price" data-valmsg-replace="true"></span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <div class="row">
                   <div class="col-sm-12">
                     <label class="control-label">Nội dung <span class="red_require">*</span>
                     </label>
                     <textarea class="form-control edtior-noidung" cols="20" data-val-required="Vui lòng nhập nội dung" id="Detail" name="Detail" rows="8"></textarea>
                     <span class="field-validation-valid text-danger" data-valmsg-for="Detail" data-valmsg-replace="true"></span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <div class="row">
                   <div class="col-sm-6 col-xs-12">
                     <label class="control-label">Tên liên hệ <span class="red_require">*</span>
                     </label>
                     <input value="" class="form-control text-box single-line valid" data-val-required="Vui lòng nhập tên liên hệ" id="ContactName" name="ContactName" type="text" aria-describedby="ContactName-error" aria-invalid="false">
                     <span class="text-danger field-validation-valid" data-valmsg-for="ContactName" data-valmsg-replace="true"></span>
                   </div>
                   <div class="col-sm-6 col-xs-12">
                     <label class="control-label">Điện thoại <span class="red_require">*</span>
                     </label>
                     <input value="" class="form-control text-box single-line" data-val-required="Vui lòng nhập số điện thoại" id="ContactMobile" maxlength="10" name="ContactMobile" numbersonly="true" type="text">
                     <span class="field-validation-valid text-danger" data-valmsg-for="ContactMobile" data-valmsg-replace="true"></span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="group_fields">
             <h3 class="form_title">Hình ảnh</h3>
             <div class="group_fields_body" style="padding-top:0">
               <div class="form-group">
                 <div class="row">
                   <div class="col-sm-12">
                     <form action="" method="post">
                        <br>
                        <input type="file" name="images" id="">
                     </form>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="form-group">
           <div class="row">
             <div class="col-sm-2 text-center">
               <button type="submit" class="btn btn-primary" id="btnPostCreate">ĐĂNG TIN</button>
             </div>
           </div>
         </div>
         <div id="message"></div>
       </form>
     </div>
   </div>
 </div>
@endsection