@extends('layouts.admin')
@section('title', 'Danh sách liên hệ chưa trả lời')

@section('header')
<link rel="stylesheet" href="{{asset ('public/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
<script src="{{asset('public/jquery.dataTables.min.js')}}"></script>
<script>
  let table = new DataTable('#myTable');
</script>
@endsection

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách liên hệ chưa trả lời</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Danh sách liên hệ chưa trả lời </li>
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
                <a href="{{ route('contact.trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
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
                      {{-- @if ($contact->status==1)
                      <a  href="{{ route('contact.status',['contact'=>$contact->id]) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-toggle-on">
                        </i>
                      </a>
                      @else
                      <a  href="{{ route('contact.status',['contact'=>$contact->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-toggle-off">
                        </i>
                      </a>
                      @endif --}}
                    
                      <a  href="{{ route('contact.show',['contact'=>$contact->id]) }}" class="btn btn-primary btn-sm">
                          <i class="fas fa-eye"></i>
                      </a>
                      @if ($contact->replay_id==null)
                          <a href="{{ route('contact.edit',['contact'=>$contact->id]) }}" class="btn btn-info btn-sm" >
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                          @else

                          @endif
                      <a href="{{ route('contact.delete',['contact'=>$contact->id]) }}" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash">
                          </i>
                          
                      </a>

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
