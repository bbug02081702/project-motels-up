@extends('users.home.index')
@section('infoaccount')
<div class="tab-content">
  <h4>THÔNG TIN TÀI KHOẢN</h4>
  <hr>
  <div class="row user_profile_wrapper">
    <div class="user_profile_left col-xs-12 col-md-8">
      <div class="user_profile_form">
        <form action="/tai-khoan.html" class="form-horizontal" id="frmSubmit" method="post" role="form" novalidate="novalidate">
          <input name="__RequestVerificationToken" type="hidden" value="Jqc8NUwUhxqtgpYIe6PivvVO-etA_RBa_KmKwLyHTMz3YYWyYVfcUNa851_RLkjlLTDyn6knTR785cirSe-qrpyy22loOu2EyQ75R2Lypwk1">
          <div class="form-group">
            <label class="control-label col-md-3">Mã tài khoản</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon">#</span>
                <input class="form-control text-box single-line" data-val="true" data-val-number="The field UserId must be a number." data-val-required="The UserId field is required." disabled="True" id="UserId" name="UserId" type="number" value="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                <input class="form-control text-box single-line" data-val="true" data-val-email="Email không hợp lệ" disabled="True" id="Email" name="Email" type="email" value="yuntips1702@gmail.com">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Họ và tên</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input class="form-control text-box single-line valid" data-val="true" data-val-required="Vui lòng nhập họ tên" id="FullName" name="FullName" type="text" value="nguyen bbug" aria-describedby="FullName-error" aria-invalid="false">
              </div>
              <span class="text-danger field-validation-valid" data-valmsg-for="FullName" data-valmsg-replace="true"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Địa chỉ</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-address-book" aria-hidden="true"></i>
                </span>
                <input class="form-control text-box single-line" id="Address" name="Address" type="text" value="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn btn-primary btn-block" id="btnSubmit">
                <i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="user_profile_right col-xs-12 col-md-4">
      <div class="user_profile_account">
        <div class="user_profile_account_body">
          <ul>
            <li>
              <a href="/doi-mat-khau.html">
                <i class="fa fa-angle-right"></i> Đổi mật khẩu </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection