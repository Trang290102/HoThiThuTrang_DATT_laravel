@extends('layouts.site')
@section('title', 'shop balo & túi xách')
@section('header')
    <link href="{{asset('public/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">  
    <link href="{{asset('public/owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">  
@endsection
@section('footer')
    <script src="{{asset('public/owlcarousel/owl.carousel.min.js')}}"></script>
@endsection

@section('content')
<x-slideshow />

@foreach ($list_category as $category)
<x-product-home :rowcat="$category"/>
@endforeach


    <div class="container">
        {{-- <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tshirt" data-toggle="tab">Túi xách</a></li>
                    <li><a href="#blazers" data-toggle="tab">Ví bóp</a></li>
                </ul> 
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tshirt">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{('public/images/product-18.jpg')}}" alt="" />
                                    <h2>899 000 VND</h2>
                                    <p>Thiết kế sang trọng</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/category-tab--> --}}


        
            {{-- <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sản phẩm đề xuất</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/images/product-07.jpg')}}" alt="" />
                                        <h2>560.000 VND</h2>
                                        <p>Nhỏ gọn, tiện lợi</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/images/product-07.jpg')}}" alt="" />
                                        <h2>560.000 VND</h2>
                                        <p>Nhỏ gọn, tiện lợi</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/images/product-07.jpg')}}" alt="" />
                                        <h2>560.000 VND</h2>
                                        <p>Nhỏ gọn, tiện lợi</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/images/product-07.jpg')}}" alt="" />
                                        <h2>560.000 VND</h2>
                                        <p>Nhỏ gọn, tiện lợi</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/images/product-07.jpg')}}" alt="" />
                                        <h2>560.000 VND</h2>
                                        <p>Nhỏ gọn, tiện lợi</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/images/product-07.jpg')}}" alt="" />
                                        <h2>560.000 VND</h2>
                                        <p>Nhỏ gọn, tiện lợi</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items--> --}}
    </div>

@endsection
