@extends('users.home.index')
@section('managerpost')
<div class="page_content intro_page clearfix">
  <div class="tab-content">
    <h4>QUẢN LÝ TIN (0)</h4>
    <hr>
    <div class="dataTables_wrapper form-inline">
      <div class="row">
        <div class="col-sm-8 col-xs-12">
          <div class="dataTables_length">
            <select id="ddlPostCate" name="CategoryId" class="form-control" onchange="search(this.value)">
              <option value="">-- Loại tin đăng --</option>
              <option value="1">Cho thuê phòng trọ</option>
              <option value="11">Cho thuê căn hộ</option>
              <option value="2">Nhà cho thuê</option>
              <option value="3">Tìm người ở ghép</option>
            </select>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12 text-right">
          <div class="dataTables_filter">
            <div class="input-group">
              <input type="search" name="search" class="form-control" placeholder="Tìm theo mã tin">
              <span class="input-group-addon" id="btnSearch">
                <i class="fa fa-search"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix">
        <br>
      </div>
      <table class="table table-bordered table-striped table-vcenter dataTable no-footer table_banggia" role="grid" "="">
							<thead>
								<tr>
									<td>Tiêu đề</td>
									<td class=" text-center">Trạng thái</td>
        <td class="text-center">Thao tác</td>
        </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td colspan="7">Bạn chưa có tin đăng nào</td>
          </tr>
        </tbody>
      </table>
      <div class="paging-container">
        <input name="__RequestVerificationToken" type="hidden" value="XYk6HWDmIYVcfudHGPQSBNtvAX6eJVej-m5fNkqX5_fF42CivQLtiRXuZ_ip5EkfO-pwgwFJ_MX0fnud3Y_YSyTRiLpBkugKU5BTQu2NsPo1">
      </div>
    </div>
  </div>
</div>
@endsection