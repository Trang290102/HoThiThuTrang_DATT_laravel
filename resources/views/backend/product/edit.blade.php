@extends('layouts.admin')
@section('title', 'Cập nhật sản phẩm')
@section('footer')
<script>
  CKEDITOR.replace('metadesc');
  CKEDITOR.replace('detail');
</script>
@endsection


@section('content')

<form action="{{ route('product.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="editproductinfo-tab" data-toggle="tab" data-target="#editproductinfo" type="button" role="tab" aria-controls="editproductinfo" aria-selected="true">Thông tin sản phẩm</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="editproductimage-tab" data-toggle="tab" data-target="#editproductimage" type="button" role="tab" aria-controls="editproductimage" aria-selected="false">Hình ảnh</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="editproductattribute-tab" data-toggle="tab" data-target="#editproductattribute" type="button" role="tab" aria-controls="editproductattribute" aria-selected="false">Thuộc tính</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="editproductsale-tab" data-toggle="tab" data-target="#editproductsale" type="button" role="tab" aria-controls="editproductsale" aria-selected="false">Khuyến mãi</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="editproductstore-tab" data-toggle="tab" data-target="#editproductstore" type="button" role="tab" aria-controls="editproductstore" aria-selected="false">Nhập kho sản phẩm</button>
              </li>

            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active border-right border-bottom border-left p-3" id="editproductinfo" role="tabpanel"
               aria-labelledby="editproductinfo-tab">
               @includeIf('backend.product.tab_editproductinfo')</div>
              <div class="tab-pane fade border-right border-bottom border-left p-3" id="editproductimage" role="tabpanel" aria-labelledby="editproductimage-tab">
                @includeIf('backend.product.tab_editproductimage')</div>
              <div class="tab-pane fade border-right border-bottom border-left p-3" id="editproductattribute" role="tabpanel" aria-labelledby="editproductattribute-tab">
              @includeIf('backend.product.tab_editproductattribute')</div>
              <div class="tab-pane fade border-right border-bottom border-left p-3" id="editproductsale" role="tabpanel" aria-labelledby="editproductsale-tab">
              @includeIf('backend.product.tab_editproductsale')</div><div class="tab-pane fade border-right border-bottom border-left p-3" id="editproductstore" role="tabpanel" aria-labelledby="editproductstore-tab">
              @includeIf('backend.product.tab_editproductstore')</div>
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
