<div>

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">{{$row_cat->name}}</h2>
    {{-- <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{asset('public/images/product')}}" alt="" />
                    <h2>1.500.000 VND</h2>
                    <p>Phiên bản nâu giới hạn</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="owl-carousel owl-theme">
        @foreach($product_list as $product)
        <div class="item">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset('public/images/product')}}" alt="" />
                        <h2>{{$product->name}}</h2>
                        <p>Phiên bản nâu giới hạn</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--end owl-casousel -->
</div><!--features_items-->
</div>