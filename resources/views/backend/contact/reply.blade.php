@extends('layouts.admin')
@section('title', 'Trả lời liên hệ')
@section('content')

<form action="{{ route('contact.update',['contact'=>$contact->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trả lời liên hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Trả lời liên hệ</li>
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
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Gửi[Trả lời]</button>
                <a href="{{ route('contact.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <div class="row">
              <div class="col-md-6">
                <h2>Thông tin liên hệ</h2>
                <table class="table table-bordered table-striped">
                  <tr>
                      <td>Họ và tên</td>
                      <td>{{$contact->name}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$contact->email}}</td>
                  </tr>
                  <tr>
                    <td>Chủ đề</td>
                    <td>{{$contact->title}}</td>
                  </tr>
                  <tr>
                    <td>Nội dung câu hỏi</td>
                    <td>{{$contact->content}}</td>
                  </tr>
              </table>
              </div>



              <div class="col-md-6"> 
                <h2>Trả lời</h2>

              </div>

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
</form>

  @endsection
