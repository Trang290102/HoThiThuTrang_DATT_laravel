@extends('layouts.admin')
@section('title', 'Thông tin liên hệ')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin liên hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thông tin liên hệ</li>
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
              <a href="{{ route('contact.edit',['contact'=>$contact->id]) }}" class="btn btn-success btn-sm" >
                <i class="fas fa-pencil-alt"></i>Trả lời</a>
            <a href="{{ route('contact.delete',['contact'=>$contact->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>Xóa</a>
                <a href="{{ route('contact.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <tr>
                    <th>Tên trường</th>
                    <th>Giá trị</th>
                  </tr>
                  <tr>
                    <td>Id liên hệ</td>
                    <td>{{$contact->id}}</td>
                  </tr>
                  <tr>
                    <td>Họ tên khách hàng</td>
                    <td>{{$contact->name}}</td>
                  </tr> 
                  <tr>
                    <td>Email</td>
                    <td>{{$contact->email}}</td>
                  </tr> 
                  <tr>
                    <td>Số điện thoại</td>
                    <td>{{$contact->phone}}</td>
                  </tr>
                  <tr>
                    <td>Chủ đề</td>
                    <td>{{$contact->title}}</td>
                  </tr>
                  <tr>
                    <td>Nội dung liên hệ</td>
                    <td>{{$contact->content}}</td>
                  </tr> 
                  <tr>
                    <td>Replay id</td>
                    <td>{{$contact->replay_id}}</td>
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
