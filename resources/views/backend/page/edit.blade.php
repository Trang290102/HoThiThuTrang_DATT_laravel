@extends('layouts.admin')
@section('title', 'Cập nhật trang đơn')
@section('footer')
<script>
  CKEDITOR.replace('metadesc');
  CKEDITOR.replace('detail');
</script>
@endsection

@section('content')

<form action="{{ route('page.update',['page'=>$page->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật trang đơn</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Cập nhật trang đơn</li>
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
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Lưu[Cập nhật]</button>
                <a href="{{ route('page.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="title">Tiêu đề trang đơn</label>
                        <input type="text" name="title" value="{{ old('title',$page->title) }}"" id="title" class="form-control" placeholder="Nhập tên trang đơn"> 
                        @if ($errors->has('title'))
                          <div class="text-danger">{{$errors->first('title')}}</div>
                        @endif 
                    </div>
                    <div class="mb-3">
                      <label for="metakey">Từ khóa</label>
                      <textarea name="metakey" id="metakey" class="form-control"
                      placeholder="Từ khóa tìm kiếm">{{ old('metakey',$page->metakey) }}</textarea>
                      @if ($errors->has('metakey'))
                      <div class="text-danger">{{$errors->first('metakey')}}</div>
                    @endif 
                  </div>
                  <div class="mb-3">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="metadesc" id="metadesc" class="form-control"
                      placeholder="Nhập mô tả">{{ old('metadesc',$page->metadesc) }}</textarea>
                      @if ($errors->has('metadesc'))
                      <div class="text-danger">{{$errors->first('metadesc')}}</div>
                    @endif 
                  </div>
                    <div class="mb-3">
                      <label for="detail">Nội dung</label>
                      <textarea name="detail" id="detail" rows="5" class="form-control"
                      placeholder="Nội dung trang đơn">{{ old('detail',$page->detail) }}</textarea>
                      @if ($errors->has('detail'))
                      <div class="text-danger">{{$errors->first('detail')}}</div>
                    @endif 
                  </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="mb-3">
                        <label for="images">Hình ảnh</label>
                        <input type="file" name="images" id="images" class="form-control-file ">
                        <img class="img-fluid img-thumbnail " src="{{asset('public/images/page/'.$page->images)}}" alt="{{$page->images}}">
                    </div>
                    <div class="mb-3">
                      <label for="status">Trạng thái</label>
                      <select name="status" id="status" name="status" class="form-control">
                          <option value="1" {{ ($page->status==1)?'selected':''}}>Xuất bản</option>
                          <option value="2" {{ ($page->status==2)?'selected':''}}>Chưa xuất bản</option>
                      </select>
                  </div>                       
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
