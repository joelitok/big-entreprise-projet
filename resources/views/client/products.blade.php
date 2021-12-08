@extends('layouts.layoutsClient.appClient');
@section('content')
<section class="products"> 
    <!--======= PRODUCTS ROW =========-->                            
    <ul class="row">
        <li class="col-sm-6 col-md-3">
            <div class="prodct"> 

                <!--======= IMAGE =========--> 
                <img class="img-responsive" src="{{asset('frontend/images/product-img-1.jpg')}}" alt=""> <span class="c-date">29 <br>
                    FEB</span> <span class="c-like"><i class="fa fa-heart"></i></span>
                <div class="pro-info"> 

                    <!--======= ITEM NAME / RATING =========-->
                    <div class="cate-name"> <span class="pull-right">Category name</span>
                        <ul class="stars pull-left">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li class="no-rate"><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <!--======= ITEM Details =========--> 
                    <a href="#.">Lorem Ipsum Dolor Sıt Amet Driving Lesson</a>
                    <hr>
                    <span class="price">$200.00</span> <a href="08_booking_page.html" class="btn">BOOK NOW</a> <a href="06_course_detail.html" class="btn btn-1">Details</a> </div>
            </div>
        </li>

        <li class="col-sm-6 col-md-3">
            <div class="prodct"> 

                <!--======= IMAGE =========--> 
                <img class="img-responsive" src="{{asset('frontend/images/product-img-1.jpg')}}" alt=""> <span class="c-date">29 <br>
                    FEB</span> <span class="c-like"><i class="fa fa-heart"></i></span>
                <div class="pro-info"> 

                    <!--======= ITEM NAME / RATING =========-->
                    <div class="cate-name"> <span class="pull-right">Category name</span>
                        <ul class="stars pull-left">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li class="no-rate"><i class="fa fa-star"></i></li>
                        </ul>
                    </div>

                    <!--======= ITEM Details =========--> 
                    <a href="#.">Lorem Ipsum Dolor Sıt Amet Driving Lesson</a>
                    <hr>
                    <span class="price">$200.00</span> <a href="08_booking_page.html" class="btn">BOOK NOW</a> <a href="06_course_detail.html" class="btn btn-1">Details</a> </div>
            </div>
        </li>
    </ul>
    
@endsection
 