@extends('layouts.site')
@section('title', $row_topic->name)
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
                    <h2 class="category text-center">{{$row_topic->name}}</h2>           
                </div>
                {{-- <div style="margin:10px 20px">
                    @php
                        $i=count($count_list);
                    @endphp
                    <span>Có {{$i}} kết quả được tìm thấy.</span>
                </div> --}}
                    @if (count($post_list)>0)
                        @foreach($post_list as $post)
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="postinfo ">
                                        <div class="row">
                                            <div class="col-md-4"><!--cột trái-->
                                                <a href="{{route('slug.home',['slug'=>$post->slug])}}">
                                                    <img class="img-fluid" style="width: 230px;" src="{{asset('public/images/post/'.$post->images)}}" alt="{{$post->images}}" />
                                                </a>
                                            </div>
                                            <div class="col-md-8"><!--cột trái-->
                                                <div class="post-title">
                                                    <a href="{{route('slug.home',['slug'=>$post->slug])}}">
                                                        <h2 > {{$post->title}}</h2>
                                                    </a>
                                                    @php
                                                        $date = !empty($post->updated_at) ? (new DateTime($post->updated_at))->format('H:i d/m/Y') : "";
                                                    @endphp
                                                    <p>{{$date}}</p>
                                                    <p class="desc text-left">{!!$post->metadesc!!}</p>
                                                </div>
                                                <div class="price text-center">
                                                    <strong>
                                                        {{-- <span class="price">{{number_format($product->price_buy)}}<sup>đ</sup></span> 
                                                        <del>{{number_format($product->price_buy)}}<sup>đ</sup></del> --}}
                                                    </strong>
                                                    <a href="{{route('slug.home',['slug'=>$post->slug])}}" class="btn btn-default view-to-post" > Xem bài viết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end_một_mẫu tin -->
                        @endforeach
                    @else
                    <h4 class="text-center">Không có bài viết nào thuộc danh mục này!!!</h4>
                    @endif                   
                <div><!--phân trang -->
                    {{ $post_list->links() }}
                </div>
            </div><!--product_category_items-->
            
        </div>
    </div>
</div>
@endsection
