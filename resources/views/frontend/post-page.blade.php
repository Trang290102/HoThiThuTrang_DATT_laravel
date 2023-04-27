@extends('layouts.site')
@section('title', $page->title)
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
                            <h3> {{$page->title}}</h3>
                        {{-- @php
                            $date = !empty($page->updated_at) ? (new DateTime($page->updated_at))->format('H:i d/m/Y') : "";
                        @endphp
                        <p>{{$date}}</p> --}}
                    </div>
                    <p class = "product-description">{!!$page->detail!!}</p>           
            </div><!--product_category_items-->
        </div>
        <div class="col-md-3"><!--cột trái-->
            <div class="left-sidebar">
                <x-category-list/>
                <x-brand-list/>
                <div class="shipping text-center" ><!--shipping-->
                    <img src="public/images/festive-2022-2-b-2.gif" alt="" width="260" height="350" />
                </div><!--/shipping-->
            </div>
        </div>
    </div>
</div>
@endsection

