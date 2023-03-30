@extends('layouts.admin')
@section('title', 'Thùng rác Slider')
@section('content')

@section('header')
<link rel="stylesheet" href="{{asset ('public/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
<script src="{{asset('public/jquery.dataTables.min.js')}}"></script>
<script>
  let table = new DataTable('#myTable');
</script>
@endsection

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thùng rác Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Thùng rác Slider</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-times"></i> Xóa</button>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{ route('slider.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @includeIf('backend.message_alert')
        <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th style="width:20px;" class="text-center"> #</th>
                <th style="width:90px;">Hình ảnh</th>
                <th>Tên Slider</th>
                
                <th class="text-center">Vị trí</th>
                <th class="text-center">Ngày đăng</th>
                <th style="width:100px;" class="text-center">Chức năng</th>
                <th  style="width:20px;" class="text-center">ID</th>
                {{-- <th style="width: 20%">
                </th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($list_slider as $slider)
            <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td><img class="img-fluid" src="{{asset('public/images/slider/'.$slider->image)}}" alt="{{$slider->image}}"></td>
                <td>{{$slider->name}}</td>
                
                <td class="text-center">{{$slider->position}}</td>
                <td class="text-center">{{$slider->created_at}}</td>
                <td class="text-center">
                  <a href="{{ route('slider.restore',['slider'=>$slider->id]) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-trash-restore"></i></a>
                  <a href="{{ route('slider.destroy',['slider'=>$slider->id]) }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-ban"></i></a>
                </td>
                <td class="text-center">{{$slider->id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection