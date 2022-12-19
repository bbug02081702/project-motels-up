@extends('users.home.index')
@section('userwelcome')
<div class="user_welcome">
  <div class="welcome_user_text">Xin chào, <strong>
      <a rel="nofollow" href="#" class="text-blue">test</a>
  </div>
  <div class="dropdown user_welcome_dropdown">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Quản lý tài khoản <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <li>Mã tài khoản: <strong></strong>
      </li>
      <li role="separator" class="divider"></li>
      <li>
        <a rel="nofollow" href="/dang-tin.html" title="Đăng tin">
          <i class="fa fa-plus-circle" aria-hidden="true"></i> Đăng tin </a>
      </li>
      <li>
        <a rel="nofollow" href="/quan-ly-tin.html" title="Quản lý tin">
          <i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý tin đăng </a>
      </li>
      <li>
        <a rel="nofollow" href="/tai-khoan.html">
          <i class="fa fa-user" aria-hidden="true"></i> Thông tin tài khoản </a>
      </li>
      <li role="separator" class="divider"></li>
      <li>
        <a rel="nofollow" href="/thoat.html" title="Thoát">
          <i class="fa fa-sign-out" aria-hidden="true"></i> Thoát </a>
      </li>
    </ul>
  </div>
</div>
@endsection
