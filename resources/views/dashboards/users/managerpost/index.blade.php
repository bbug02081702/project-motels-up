@extends('dashboards.users.layouts.user-dash-layout')
@section('title','userpost')

@section('content')

    <h1 class="text-center"> Quan ly danh sach bai dang</h1>
    <form action="" class="form-inline" method="get">
    <div class="form-group">
        <input name="key" class="form-control" id="" placeholder="Tim kiem theo gia">
    </div>
    <button type="submit" class="btn btn-primary">
     <i class="fas fa-search">
     </i>
    </button>
    </form>
      <a href="{{route('user.postadd')}}" type="button" class="btn btn-success">Dang tin</a>
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
                  <th scope="col">Tieu de tin</th>
                  <th scope="col">Hinh anh</th>
                  <th scope="col">Dien tich</th>
                  <th scope="col">Gia cho thue</th>
                  <th scope="col">Dia chi</th>
                  <th scope="col">Ten lien he</th>
                  <th scope="col">So dien thoai</th>
                  <th scope="col">Trang thai</th>
                  <th scope="col">Hanh dong</th>
                </tr>
              </thead>
              <tbody>
                @php
                 $no = 1;
                @endphp
              @if(count($motels) > 0)
              @foreach($motels as $index => $row)
                <tr>
                  <th scope="row">{{$index + $motels->firstItem()}}</th>
                  <td><a href="{{{route('user.dashboard')}}}">{{$row->title}}</a></td>
                  <td>
                    <img src="{{asset('fotopegawai/'.$row->images)}}" style="width:48px;" alt="">
                  </td>
                  <td>{{$row->area}} m&#178</td>
                  <td>{{$row->price}} VND</td>
                  <td>{{$row->address}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->phone}}</td>
                  <td>
                    @if($row->approve == 1)
                    <a href="{{ route('user.changestatusmotels', $row->id) }}" class="badge bg-success">Da thue</a>
                    @else
                    <a href="{{ route('user.changestatusmotels', $row->id) }}" class="badge bg-danger">Chua thue</a>
                    @endif
                  </td>
                  <td>
                  <a href="" type="button" class="btn btn-info">Sua</a>
                  <a href="" type="button" class="btn btn-danger">Xoa</a>
                  </td>
                </tr>
              @endforeach
              @else
                <tr>
                  <td colspan="10" class="text-center">Ban chua dang tin nao</td>
                </tr>
              @endif
              </tbody>
            </table>
            {{$motels->appends(request()->all())->links()}}
          </div>
        </div>
      </div>
@endsection