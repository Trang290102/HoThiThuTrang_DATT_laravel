@extends('layouts.admin')
@section('title', 'Thùng rác trang đơn')
@section('content')

{{-- @php
    dd($list_page);
@endphp
 --}}

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thùng rác trang đơn</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Thùng rác trang đơn</li>
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
            <a href="{{ route('page.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
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
              <th style="width:250px;">Tiêu đề trang đơn</th>
              <th>Slug</th>
              <th style="width:160px;" class="text-center">Ngày đăng</th>
              <th style="width:300px;" class="text-center">Chức năng</th>
              <th style="width:20px;" class="text-center">ID</th>
              {{-- <th style="width: 20%">
                    </th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($list_page as $page)
            <tr>
              <td class="text-center"><input type="checkbox"></td>
              <td><img class="img-fluid" src="{{asset('public/images/page/'.$page->images)}}" alt="{{$page->images}}"></td>
              <td>{{$page->title}}</td>
              <td>{{$page->slug}}</td>
              <td class="text-center">{{$page->created_at}}</td>
              <td class="text-center">
                <a href="{{ route('page.restore',['page'=>$page->id]) }}" class="btn btn-primary btn-sm">
                  <i class="fas fa-trash-restore"></i> Khôi phục</a>
                <a href="{{ route('page.destroy',['page'=>$page->id]) }}" class="btn btn-danger btn-sm">
                  <i class="fas fa-ban"></i> Xóa</a>

              </td>
              <td class="text-center">{{$page->id}}</td>
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