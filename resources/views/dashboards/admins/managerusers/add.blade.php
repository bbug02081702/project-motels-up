@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','add')

@section('content')
<h1 class="text-center"> Them danh sach nguoi dung</h1>
      <div class="card">
        <div class="card-body">
            @if ($message = Session::get('Thongbao'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif 
          <div class="row">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
          @endif
              <form action="{{route('admin.storemanageruser')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="" placeholder="Nhap username">
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Avatar</label>
                    <input type="file" name="picture" id="picture" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="" placeholder="Nhap email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mat khau</label>
                    <input type="password" name="password" class="form-control" id="" placeholder="Nhap mat khau">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Quyen</label>
                    <select name="role" class="form-select" id="">
                                    <option selected>Chon quyen:</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="created_at" class="form-label">Ngay tao</label>
                    <input type="date" name="created_at" class="form-control" id="">
                </div>
                <button type="submit" class="btn btn-primary">Dong y</button>
               
                <a href="{{route('admin.listusers')}}" type="button" class="btn btn-success">Tro ve</a>
              </form>
          </div>
        </div>
      </div>
@endsection