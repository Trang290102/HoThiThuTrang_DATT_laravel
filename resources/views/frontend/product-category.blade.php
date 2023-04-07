@extends('layouts.site')
@section('title', $row_cat->name)
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-3"><!--cột trái-->


            <div class="left-sidebar">
                <x-category-list/>
                <x-brand-list/>
                
                <div class="shipping text-center" ><!--shipping-->
                    <img src="public/images/festive-2022-2-b-2.gif" alt="" width="260" height="350" />
                </div><!--/shipping-->
            </div>

        </div>
        <div class="col-md-9"><!--cột phải-->
            <div class="features_items">
                <div class="headline">          
                    <h2 class="category text-center">{{$row_cat->name}}</h2>           
                </div>
                <div class="row">
                    @if (count($product_list)>0)
                        @foreach($product_list as $product)
                        @php
                            $product_image= $product->productimg;
                            $hinh="";
                            if(count($product_image)>0)
                            {
                                $hinh=$product_image[0]["image"];
                            } 
                        @endphp
                        <div class="col-md-4 mb-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo ">
                                        <a href="{{route('slug.home',['slug'=>$product->slug])}}">
                                            <img class="img-fluid w-100" src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" />
                                        </a>
                                        <div class="productname">
                                            <a href="{{route('slug.home',['slug'=>$product->brand_slug])}}"><p>{{$product->brand_name}}</p></a>
                
                                            <a href="{{route('slug.home',['slug'=>$product->slug])}}">
                                                <h2> {{$product->name}}</h2>
                                            </a>    
                                        </div>
                                        <div class="price text-center">
                                            <strong>
                                                <span class="price">{{number_format($product->price_buy)}}<sup>đ</sup></span> 
                                                <del>{{number_format($product->price_buy)}}<sup>đ</sup></del>
                                            </strong>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <h4 class="text-center">Không có sản phẩm nào thuộc danh mục này!!!</h4>
                    @endif
                </div><!--end_một_mẫu tin -->
                <div><!--phân trang -->
                    {{ $product_list->links() }}
                </div>
            </div><!--product_category_items-->
        </div>

    </div>
</div>
@endsection
