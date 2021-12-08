@extends('layouts.layoutsClient.appClient');
@section('content')

<div class="container-fluid">
    <div class="sub-banner">
        <div class="container">
            <h2>Nos Produits</h2>
        </div>
    </div>

    <section class="py-4"> 
        <ul class="py-4">

        </ul>
    </section>

    <!--======= RODUCTS =========-->
       <section class="products container"> 
    
        <!--======= PRODUCTS ROW =========-->
    
        <ul class="row">
    
             @foreach ($product_attaches as $product_attach)
               <!--======= ITEM 1 =========-->
            <li class="col-sm-6 col-md-3 mt-4">
                <div class="prodct"> 
    
                    <!--======= IMAGE =========--> 
                    <img  src="/product_attach_images/{{$product_attach->product_attach_image}}" height="270px" width="230px" alt="">  <span class="c-like"><i class="fa fa-heart"></i></span>
                    <div class="pro-info"> 
    
                        <!--======= ITEM NAME / RATING =========-->
                        <div class="cate-name"> <span class="pull-left">{{$product_attach->product_attach_name}}</span>
                            <ul class="stars pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li class="no-rate"><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
    
                        <!--======= ITEM Details =========--> 
                        <a href="#.">{{\Illuminate\Support\Str::limit($product_attach->product_attach_description, 41, $end='...')}}</a>
                        <hr>
                    <a href="{{url('/detail_product_attache/'.$product_attach->id)}}" class="btn btn-1">Details</a> </div>
                </div>
            </li>   
             @endforeach
        </ul>
</div>
</section>

@endsection
    