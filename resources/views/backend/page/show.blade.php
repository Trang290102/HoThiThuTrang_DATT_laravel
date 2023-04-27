@extends('layouts.admin')
@section('title', 'Chi tiết trang đơn')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết trang đơn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Chi tiết trang đơn</li>
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
            </div>
            <div class="col-md-6 text-right">
              <a href="{{ route('page.edit',['page'=>$page->id]) }}" class="btn btn-success btn-sm" >
                <i class="fas fa-pencil-alt"></i>Sửa</a>
            <a href="{{ route('page.delete',['page'=>$page->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>Xóa</a>
                <a href="{{ route('page.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                  <table class="table">
                    <tr>
                      <th style="width:200px;">Tên trường</th>
                      <th>Giá trị</th>
                    </tr>
                    <tr>
                      <td>Tiêu đề trang đơn</td>
                      <td>{{$page->title}}</td>
                    </tr>
                    <tr>
                      <td>Từ khóa</td>
                      <td>{{$page->metakey}}</td>
                    </tr>
                    <tr>
                      <td>Mô tả</td>
                      <td>{!!$page->metadesc!!}</td>
                    </tr>
                    <tr>
                      <td>Nội dung</td>
                      <td>{!!$page->detail!!}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-3">
                  <table class="table">
                    <tr>
                      <th>Hình ảnh</th>
                    </tr>
                    <tr>
                      <td><img class="img-fluid img-thumbnail" src="{{asset('public/images/page/'.$page->images)}}" alt="{{$page->images}}"></td>
                    </tr>
                  </table>
                </div>
            </div>           
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
