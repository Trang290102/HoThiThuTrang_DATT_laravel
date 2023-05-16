@extends('layouts.admin')
@section('title', 'Khôi phục liên hệ')
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
          <h1>Khôi phục liên hệ</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Khôi phục liên hệ</li>
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
            <a href="{{ route('contact.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @includeIf('backend.message_alert')
        <table class="table table-bordered table-striped" id="myTable">
          <thead>
            <tr>
                <th style="width:20px;" class="text-center">Loại</th>
                <th style="width:150px;">Họ và tên</th>
                <th>Email</th>
                <th>Chủ đề</th>
                <th style="width:160px;" class="text-center">Ngày gửi</th>
                <th style="width:150px;" class="text-center">Chức năng</th>
                <th style="width:20px;" class="text-center">ID</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($list_contact as $contact)
            <tr>
                <td class="text-center">
                  @if ($contact->replay_id==null)
                  <a  href="#" class="btn btn-warning btn-sm">
                    <i class="fas fa-question"></i>
                  </a>
                  @else
                  <a  href="#" class="btn btn-primary btn-sm">
                    <i class="fas fa-check"></i>
                  </a>
                  @endif
                </td>
                <td>{{ $contact->name}}</td>
                <td>{{ $contact->email}}</td>
                <td>{{$contact->title}}</td>
                <td>{{ $contact->created_at }}</td>
                  <td class="text-center">
                    <a href="{{ route('contact.restore',['contact'=>$contact->id]) }}" class="btn btn-primary btn-sm">
                      <i class="fas fa-trash-restore"></i></a>
                    <a href="{{ route('contact.destroy',['contact'=>$contact->id]) }}" class="btn btn-danger btn-sm">
                      <i class="fas fa-ban"></i> </a>
                  </td>
                <td class="text-center">{{ $contact->id }}</td>
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