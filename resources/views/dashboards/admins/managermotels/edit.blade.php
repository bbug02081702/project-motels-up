@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Settings')
@section('content')
<h1 class="text-center">Cap nhat danh sach phong tro</h1>
      <div class="card">
        <div class="card-body">
          <div class="row">
            @if ($message = Session::get('Thongbao'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif 
            @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
          @endif
              <form action="{{route('admin.updatemotels', $motels->id)}}" method="post" enctype="mutilpart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Title" class="form-label">Tieu de</label>
                    <input type="text" name="title" value="{{$motels->title}}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Hinh anh</label>
                    <input type="file" name="images" value="{{$motels->images}}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="area" class="form-label">Dien tich</label>
                    <input type="number" name="area" value="{{$motels->area}}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Gia phong</label>
                    <input type="text" name="price" value="{{$motels->price}}" class="form-control" id="">
                </div> <div class="mb-3">
                    <label for="phone" class="form-label">So dien thoai</label>
                    <input type="number" name="phone" value="{{$motels->phone}}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dia chi</label>
                    <input type="text" name="address" value="{{$motels->address}}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="approve" class="form-label">Trang thai</label>
                    <select name="approve" class="form-select" id="">
                            <option value="">Chon trang thai:</option>
                            <option value="0" {{$motels->approve == "0" ? 'selected' : ''}}>Chua thue</option>
                            <option value="1" {{$motels->approve == "1" ? 'selected' : ''}}>Da thue</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Dong y</button>
               
                <a href="{{route('admin.listmotels')}}" type="button" class="btn btn-success">Tro ve</a>
              </form>
          </div>
        </div>
      </div>
@endsection