<div class="container">
    <h2 class="title text-center">Tin tức mới nhất</h2>
    <div class="row">
        @foreach($post_list as $post)
         @php
                $tieude=substr($post->title, 0, 100). '...';
                // $mota=substr($post->metadesc, 0, 10). '...';
            @endphp
        <div class="col-md-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo">
                        <a href="{{route('slug.home',['slug'=>$post->slug])}}">
                            <img class="img-fluid w-100" src="{{asset('public/images/post/'.$post->images)}}" alt="{{$post->images}}" />
                        </a>
                        <div class="postname" style="height:50px;">
                            <a href="{{route('slug.home',['slug'=>$post->slug])}}" style="height:20px;" ><h5 style="font-style: initial; color:black;">{{$tieude}}</h5></a>
                        </div>
                        @php
                            $date = !empty($post->updated_at) ? (new DateTime($post->updated_at))->format('H:i d/m/Y') : "";
                        @endphp
                        <p>{{$date}}</p>
                        {{-- <div class="price text-center">
                            <a href="{{route('slug.home',['slug'=>$post->slug])}}" class="btn btn-default add-to-cart" >Xem thêm...</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


{{-- <div class="container">
    <h2 class="title text-center">Tin tức mới nhất</h2>
    <div class="features_items"><!--features_items-->
        <div class="owl-carousel owl-theme">
            @foreach($post_list as $post)
            @php
                $tieude=substr($post->title, 0, 100). '...';
                // $mota=substr($post->metadesc, 0, 10). '...';
            @endphp
            <div class="item">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo">
                            <a href="{{route('slug.home',['slug'=>$post->slug])}}">
                                <img class="img-fluid w-100" src="{{asset('public/images/post/'.$post->images)}}" alt="{{$post->images}}" />
                            </a>
                            <div class="postname" style="height:50px;">
                                <a href="{{route('slug.home',['slug'=>$post->slug])}}" style="height:20px;" ><h5 style="font-style: initial; color:black;">{{$tieude}}</h5></a>
                            </div>
                            @php
                                $date = !empty($post->updated_at) ? (new DateTime($post->updated_at))->format('H:i d/m/Y') : "";
                            @endphp
                            <p>{{$date}}</p>
                            <div class="price text-center">
                                <a href="{{route('slug.home',['slug'=>$post->slug])}}" class="btn btn-default add-to-cart" >Xem thêm...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--end owl-casousel -->
    </div><!--features_items-->
</div> --}}
