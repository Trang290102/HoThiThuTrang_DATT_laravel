<div>

<div class="features_items"><!--features_items-->
    <a href="{{route('slug.home',['slug'=>$row_cat->slug])}}">
        <h2 class="title text-center">{{$row_cat->name}}</h2>

    </a>
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
        @php
            $product_image= $product->productimg;
            $hinh="";
            if(count($product_image)>0)
            {
                $hinh=$product_image[0]["image"];
            }          
        @endphp
        <div class="item">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        {{-- <img src="{{asset('public/images/product/'.$product->image)}}" alt="" /> --}}
                        <a href="{{route('slug.home',['slug'=>$product->slug])}}">
                            <img  src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" />
                        </a>

                        <a href="{{route('slug.home',['slug'=>$product->slug])}}">
                            <h2> {{$product->name}}</h2>
                        </a>

                        <strong>
                            <span class="price">{{$product->price_sale}}</span> 
                            <del>{{$product->price_buy}}</del>
                        </strong>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--end owl-casousel -->
</div><!--features_items-->
</div>