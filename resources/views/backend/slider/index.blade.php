@extends('layouts.admin')
@section('title', 'Tất cả Slider')
@section('content')

{{-- @php
    dd($list_slider);
@endphp
 --}}

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Danh sách Slider</li>
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
              <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-times"></i>  Xóa</button>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('slider.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Thêm</a>
                <a href="{{ route('slider.trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:20px;" class="text-center"> #</th>
                    <th style="width:90px;">Hình ảnh</th>
                    <th>Tên Slider</th>
                    <th>Liên kết</th>
                    <th class="text-center">Vị trí</th>
                    <th style="width:160px;" class="text-center">Ngày đăng</th>
                    <th style="width:300px;" class="text-center">Chức năng</th>
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
                    <td>{{$slider->link}}</td>
                    <td class="text-center">{{$slider->position}}</td>
                    <td class="text-center">{{$slider->created_at}}</td>
                    <td class="text-center">
                        @if ($slider->status==1)
                        <a  href="{{ route('slider.status',['slider'=>$slider->id]) }}" class="btn btn-success btn-sm">
                          <i class="fas fa-toggle-on">
                          </i>
                        </a>
                        @else
                        <a  href="{{ route('slider.status',['slider'=>$slider->id]) }}" class="btn btn-danger btn-sm">
                          <i class="fas fa-toggle-off">
                          </i>
                        </a>
                        @endif
                      
                        <a  href="{{ route('slider.show',['slider'=>$slider->id]) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye">
                            </i>
                            Xem
                        </a>
                        <a href="{{ route('slider.edit',['slider'=>$slider->id]) }}" class="btn btn-info btn-sm" >
                            <i class="fas fa-pencil-alt">
                            </i>
                            Sửa
                        </a>
                        <a href="{{ route('slider.delete',['slider'=>$slider->id]) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Xóa
                        </a>

                    </td>
                    <td class="text-center">{{$slider->id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
          </div>
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
