@extends('layouts.admin')
@section('title', 'Cập nhật danh mục')
@section('content')

<form action="{{ route('category.update',['category'=>$category->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Cập nhật danh mục</li>
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
                <a href="{{ route('category.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="name">Tên danh mục</label>
                        <input type="text" name="name" value="{{ old('name',$category->name) }}"" id="name" class="form-control" placeholder="Nhập tên danh mục"> 
                        @if ($errors->has('name'))
                          <div class="text-danger">{{$errors->first('name')}}</div>
                        @endif 
                    </div>
                    <div class="mb-3">
                        <label for="metakey">Từ khóa</label>
                        <textarea name="metakey" id="metakey" class="form-control"
                        placeholder="Từ khóa tìm kiếm">{{ old('metakey',$category->metakey) }}</textarea>
                        @if ($errors->has('metakey'))
                        <div class="text-danger">{{$errors->first('metakey')}}</div>
                      @endif 
                    </div>
                    <div class="mb-3">
                        <label for="metadesc">Mô tả</label>
                        <textarea name="metadesc" id="metadesc" class="form-control"
                        placeholder="Nhập mô tả">{{ old('metadesc',$category->metadesc) }}</textarea>
                        @if ($errors->has('metadesc'))
                        <div class="text-danger">{{$errors->first('metadesc')}}</div>
                      @endif 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="parent_id">Danh mục cha</label>
                        <select name="parent_id" id="parent_id" name="parent_id" class="form-control">
                          <option value="0">--Danh mục--</option>
                            {{!! $html_parent_id !!}}
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="sort_order">Vị trí</label>
                        <select name="sort_order" id="sort_order" name="sort_order" class="form-control">
                            {{!! $html_sort_order !!}}
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="image">Hình đại diện</label>
                        <input type="file" name="image" id="image" class="form-control-file">  
                    </div> 
                    <div class="mb-3">
                      <label for="status">Trạng thái</label>
                      <select name="status" id="status" name="status" class="form-control">
                          <option value="1" {{ ($category->status==1)?'selected':''}}>Xuất bản</option>
                          <option value="2" {{ ($category->status==2)?'selected':''}}>Chưa xuất bản</option>
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
