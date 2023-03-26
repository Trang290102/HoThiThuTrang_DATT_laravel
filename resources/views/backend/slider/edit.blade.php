@extends('layouts.admin')
@section('title', 'Cập nhật Slider')
@section('content')

<form action="{{ route('slider.update',['slider'=>$slider->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Cập nhật Slider</li>
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
                <a href="{{ route('slider.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="name">Tên Slider</label>
                        <input type="text" name="name" value="{{ old('name',$slider->name) }}"" id="name" class="form-control" placeholder="Nhập tên Slider"> 
                        @if ($errors->has('name'))
                          <div class="text-danger">{{$errors->first('name')}}</div>
                        @endif 
                    </div>
                    
                    <div class="mb-3">
                        <label for="link">Liên kết</label>
                        <textarea name="link" id="link" class="form-control"
                        placeholder="Nhập liên kết">{{ old('link',$slider->link) }}</textarea>
                        @if ($errors->has('link'))
                        <div class="text-danger">{{$errors->first('link')}}</div>
                      @endif 
                    </div>

                    <div class="mb-3">
                      <label for="position">Vị trí</label>
                      <select name="position" id="position" name="position" class="form-control">
                          <option value="slideshow">slideshow</option>
                          <option value="slideshow">slideshow</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="sort_order">Thứ tự</label>
                        <select name="sort_order" id="sort_order" name="sort_order" class="form-control">
                            <option value="0">--Thứ tự sắp xếp--</option>
                            {{!! $html_sort_order !!}}
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="image">Hình ảnh</label>
                        <input type="file" name="image" id="image" class="form-control-file">  
                    </div> 
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" name="status" class="form-control">
                            <option value="1">Xuất bản</option>
                            <option value="2">Chưa xuất bản</option>
                        </select>
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
