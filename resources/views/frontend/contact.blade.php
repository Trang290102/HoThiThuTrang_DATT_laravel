@extends('layouts.site')
@section('title', 'Liên hệ')
@section('content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">    		
            <div class="col-sm-12">    			   			
                <h2 class="title text-center">Liên hệ <strong>với chúng tôi</strong></h2>    			    				    				
            </div>			 		
        </div>    	
        <div class="row">  	
            <div class="col-sm-7">
                <div class="contact-form">
                    <h2 class="title text-center">Liên hệ</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form action="{{ route('postcontact')}}" method="post">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Họ và tên">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="title" class="form-control" required="required" placeholder="Tiêu đề liên hệ">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="content" id="message" required="required" class="form-control" rows="8" placeholder="Viết lời nhắn của bạn vào đây."></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="contact-info">
                    <h2 class="title text-center">Liên hệ trực tiếp</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>Newyork USA</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@e-shopper.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Mạng xã hội</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
        <div class="row">
            <div class="col-md-12">
                <div id="gmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7610096338303!2
                    d106.77100925047365!3d10.829592661133344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175
                    27003404296d%3A0xda14c6391b1f8c82!2zMTAzIMSQxrDhu51uZyBUxINuZyBOaMahbiBQaMO6LCBQaMaw4bubYyBMb25nIEIsIFF
                    14bqtbiA5LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1653214293503!5m2!1svi!2s"
                     width="1150" height="320" style="border:0; margin:auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>	
</div><!--/#contact-page-->
@endsection

