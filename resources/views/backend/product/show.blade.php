@extends('layouts.admin')
@section('title', 'Chi tiết sản phẩm')
@php
    $product_image= $product->productimg;
    $hinh="";
    if(count($product_image)>0)
    {
        $hinh=$product_image[0]["image"];
    }
@endphp

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
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
              <a href="{{ route('product.edit',['product'=>$product->id]) }}" class="btn btn-success btn-sm" >
                <i class="fas fa-pencil-alt"></i>Sửa</a>
            <a href="{{ route('product.delete',['product'=>$product->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>Xóa</a>
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
         
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <tr>
                      <th style="width:200px;">Tên trường</th>
                      <th>Giá trị</th>
                    </tr>
                    <tr>
                      <td>Tên sản phẩm</td>
                      <td>{{$product->name}}</td>
                    </tr>
                    {{-- <tr>
                      <td>Thương hiệu</td>
                      <td>{{$product->id}}</td>
                    </tr>   --}}
                    <tr>
                      <td>Giá bán</td>
                      <td>{{number_format($product->price_buy)}}</td>
                    </tr>
                    <tr>
                      <td>Từ khóa</td>
                      <td>{{$product->metakey}}</td>
                    </tr>
                    <tr>
                      <td>Hình ảnh</td>
                      <td>

                        @for ($i=0; $i <= count($product_image)-1; $i++)
                        @php
                            $hinh=$product_image[$i]["image"];
                        @endphp
                        <div><img style="width:200px; float: left; margin:5px 5px;" src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" /></div>
                        @endfor

                      </td>
                    </tr>
                    <tr>
                      <td>Mô tả</td>
                      <td>{!!$product->metadesc!!}</td>
                    </tr>
                    <tr>
                      <td>Chi tiết sản phẩm</td>
                      <td>{!!$product->detail!!}</td>
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
