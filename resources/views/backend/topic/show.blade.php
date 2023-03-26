@extends('layouts.admin')
@section('title', 'Chi tiết chủ đề')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết chủ đề</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Chi tiết chủ đề</li>
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
              <a href="{{ route('topic.edit',['topic'=>$topic->id]) }}" class="btn btn-success btn-sm" >
                <i class="fas fa-pencil-alt"></i>Sửa</a>
            <a href="{{ route('topic.delete',['topic'=>$topic->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>Xóa</a>
                <a href="{{ route('topic.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
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
                      <td>Id</td>
                      <td>{{$topic->id}}</td>
                    </tr>
                    <tr>
                      <td>tên chủ đề</td>
                      <td>{{$topic->name}}</td>
                    </tr>  
                    <tr>
                      <td>Slug</td>
                      <td>{{$topic->slug}}</td>
                    </tr>
                    <tr>
                      <td>Từ khóa</td>
                      <td>{{$topic->metakey}}</td>
                    </tr>
                    <tr>
                      <td>Mô tả</td>
                      <td>{{$topic->metadesc}}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-3">
                  <table class="table">
                    <tr>
                      <th>Hình ảnh</th>
                    </tr>
                    <tr>
                      <td><img class="img-fluid img-thumbnail" src="{{asset('public/images/topic/'.$topic->image)}}" alt="{{$topic->image}}"></td>
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
