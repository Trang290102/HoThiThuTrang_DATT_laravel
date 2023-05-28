@extends('layouts.site')
@section('title', $post->title)
@section('header')
    <link href="{{asset('public/css/style-product-detail.css')}}" rel="stylesheet">
@endsection
@section('footer')
    <script src="{{asset('public/js/script-product-detail.js')}}"></script>
@endsection
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-9"><!--cột phải-->
            <div class="features_items">
                    <div class="post-title">
                            <h3> {{$post->title}}</h3>
                        @php
                            $date = !empty($post->updated_at) ? (new DateTime($post->updated_at))->format('H:i d/m/Y') : "";
                        @endphp
                        <p>{{$date}}</p>
                        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="300" data-layout="" data-action="" data-size="large" data-share="true"></div>
                    </div>
                    <p class = "product-description">
                        {!!$post->metadesc!!}
                        {!!$post->detail!!}</p>           
            </div><!--product_category_items-->
            <div class="comment_fb">
                <div class="fb-comments" data-href="http://127.0.0.1:81/HoThiThuTrang_2120110029/" data-width="800" data-numposts="5">
                </div>
            </div>
        </div>
        <div class="col-md-3"><!--cột trái-->
            {{-- <div class="left-sidebar" style="border: 1px solid #e3e5ec;"> --}}
            <div class="left-sidebar">
                <h4 style="border-bottom: 1px solid;margin-bottom:15px;width: 240px;">Tin liên quan</h4>
                @foreach($post_list as $row)
                @php
                $tieude=substr($row->title, 0, 150). '...';
                @endphp
                <div class="single-post">
                    <div class="post">
                        <a href="{{route('slug.home',['slug'=>$row->slug])}}">
                            <img class="img-fluid" style="width: 240px;" src="{{asset('public/images/post/'.$row->images)}}" alt="{{$row->images}}" />
                        </a>
                    </div>
                    <div class="post-title" style="height:30px; width:240px;">
                        <a href="{{route('slug.home',['slug'=>$row->slug])}}"><h6 style="font-style: initial; color:black;">{{$tieude}}</h6></a>
                    </div>
                    @php
                        $date = !empty($row->updated_at) ? (new DateTime($row->updated_at))->format('d/m/Y') : "";
                    @endphp
                    <p>{{$date}}</p>
                </div>
                @endforeach
            </div>
    </div>
</div>
@endsection

