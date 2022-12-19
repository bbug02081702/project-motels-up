@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','edit')
@section('content')
<h1 class="text-center">Cap nhat danh sach phong tro</h1>
<h1 class="text-center">Cap nhat danh sach phong tro</h1>
      <div class="card">
        <div class="card-body">
          <div class="row">
              <form action="{{route('admin.updatemanageruser', $users->id)}}" method="POST" enctype="mutilpart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">User name</label>
                    <input type="text" name="username" value="{{$users->username}}" class="form-control" id="" placeholder="Nhap username">
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Avatar</label>
                    <input type="file" name="picture" value="{{$users->picture}}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" value="{{$users->email}}" class="form-control" id="" placeholder="Nhap email">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Quyen</label>
                    <select name="role" class="form-select" id="">
                            <option value="">Chon quyen:</option>
                            <option value="1" {{$users->role == "1" ? 'selected' : ''}}>Admin</option>
                            <option value="2" {{$users->role == "2" ? 'selected' : ''}}>User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="created_at" class="form-label">Ngay tao</label>
                    <input type="date" name="created_at"  value="{{$users->created_at}}" class="form-control" id="">
                </div>
                
                <button type="submit" class="btn btn-primary">Dong y</button>
               
                <a href="{{route('admin.listusers')}}" type="button" class="btn btn-success">Tro ve</a>
              </form>
          </div>
        </div>
      </div>
@endsection