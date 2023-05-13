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
<x-post-home/>


    <div class="container">
        
    </div>

@endsection
