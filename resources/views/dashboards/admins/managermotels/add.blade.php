@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','add')

@section('content')
<h1 class="text-center"> Them danh sach phong tro</h1>
<div class="container">
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
              <form action="{{route('admin.storemotels')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Title" class="form-label">Tieu de</label>
                    <input type="text" name="title" class="form-control" placeholder="Nhap tieu de">
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Hinh anh</label>
                    <input type="file" name="images" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">So dien thoai</label>
                    <input type="number" name="phone" class="form-control" id="" placeholder="Nhap so dien thoai">
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">Dien tich</label>
                    <input type="number" name="area" class="form-control" id="" placeholder="Nhap dien tich">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Gia phong</label>
                    <input type="text" name="price" class="form-control" id="" class="@error('title') is-invalid @enderror" placeholder="Nhap gia phong">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dia chi</label>
                    <input type="text" name="address" class="form-control" id="" placeholder="Nhap dia chi">
                </div>
                <div class="mb-3">
                    <label for="approve" class="form-label">Trang thai</label>
                    <select name="approve" class="form-select" id="">
                            <option selected>Chon trang thai:</option>
                            <option value="0">Chua thue</option>
                            <option value="1">Da thue</option>
                    </select>
                </div>
               
                <button type="submit" class="btn btn-primary">Dong y</button>
               
                <a href="{{route('admin.listmotels')}}" type="button" class="btn btn-success">Tro ve</a>
              </form>
          </div>
        </div>
      </div>
</div>
@endsection