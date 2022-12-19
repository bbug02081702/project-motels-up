@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Settings')

@section('content')

<h1 class="text-center"> Quan ly danh sach nguoi dung</h1>
    <form action="" class="form-inline" method="get">
    <div class="form-group">
        <input name="key" class="form-control" id="" placeholder="Tim kiem theo email">
    </div>
    <button type="submit" class="btn btn-primary">
     <i class="fas fa-search">
     </i>
    </button>
    </form>
      <a href="{{route('admin.addmanageruser')}}" type="button" class="btn btn-success">Them</a>
      <div class="card">
        <div class="card-body">
          <div class="row">
            @if ($message = Session::get('Thongbao'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif 
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Avatar</th>
                  <th scope="col">User name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Quyen</th>
                  <th scope="col">Ngay tao</th>
                  <th scope="col">Hanh dong</th>
                </tr>
              </thead>
              <tbody>
                @php
                 $no = 1;
                @endphp
              @if(count($users) > 0)
              @foreach($users as $index => $rowuser)
                <tr>
                  <th scope="row">{{$index + $users->firstItem()}}</th>
                  <td>
                  <img src="{{asset(''.$rowuser->picture)}}" style="width:48px; height:48px; border-radius: 50%" alt="">
                  </td>
                  <td>{{$rowuser->username}}</td>
                  <td>{{$rowuser->email}}</td>
                  <td>
                    @if($rowuser->role == 1)
                    <a href="{{route('admin.changestatususer', $rowuser->id)}}" class="badge bg-success">Admin</a>
                    @else
                    <a href="{{route('admin.changestatususer', $rowuser->id)}}" class="badge bg-danger">User</a>
                    @endif
                  </td>
                  <td>{{$rowuser->created_at}}</td>
                  <td>
                  <a href="{{route('admin.editmanageruser',$rowuser->id)}}" type="button" class="btn btn-info">Sua</a>
                  <a href="{{route('admin.deletenageruser', $rowuser->id)}}" type="button" class="btn btn-danger">Xoa</a>
                  </td>
                </tr>
              @endforeach
              @else
                <tr>
                  <td colspan="7" class="text-center">Ko tim thay du lieu!!! Vui long thuc hien them du lieu!!!</td>
                </tr>
              @endif
              </tbody>
            </table>
            {{$users->appends(request()->all())->links()}}
          </div>
        </div>
      </div>
   
@endsection