<div class="container">
    <div class="features_items"><!--features_items-->
        <div class="headline">
            <a href="{{route('slug.home',['slug'=>$row_cat->slug])}}">
                <h2 class="category text-center">{{$row_cat->name}}</h2>
            </a>
        </div>
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
                        <div class="productinfo ">
                            {{-- <img src="{{asset('public/images/product/'.$product->image)}}" alt="" /> --}}
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
        </div><!--end owl-casousel -->
    </div><!--features_items-->
</div>
