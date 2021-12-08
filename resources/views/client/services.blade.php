@extends('layouts.layoutsClient.appClient');
@section('content')
   <!--======= CONTENT START =========-->
 <div class="content"> 

    <!--======= INTRESTED =========-->
    <section class="courses products-list">
        <div class="container"> 
            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>Nos services</h3>
                
            </div>


        

            <!--======= RODUCTS =========-->
            <section class="products"> 

                <!--======= PRODUCTS ROW =========-->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="row">
@foreach ($services as $service)
<li class="col-sm-6">
    <div class="prodct"> 

        <!--======= IMAGE =========-->                    
        <div class="col-md-6 no-padding">
        <img class="img-responsive" src="/public_service_images/{{json_decode($service->service_image)['0'] ?? 'noimage.jpg'}}" height="230px" width="270px" alt="">
           
             <span class="c-like"><i class="fa fa-heart"></i></span></div>

        <!--======= PRODUCTS IMFO =========-->
        <div class="col-md-6 no-padding">
            <div class="pro-info"> 

                <!--======= ITEM NAME / RATING =========-->
                <div class="cate-name"> <span class="pull-right" style="font-size: 20px;"> <strong> {{$service->service_name}}</strong> </span>
                    <ul class="stars pull-left">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li class="no-rate"><i class="fa fa-star"></i></li>
                    </ul>
                </div>

                <!--======= ITEM Details =========--> 
                <a href="#">{{\Illuminate\Support\Str::limit($service->service_description, 41, $end='...')}}</a>
                <hr> <a class="btn btn-1" href="{{url('/detail_service/'.$service->id)}}">Detail </a> 
            </div>
        </div>
    </div>
</li>

@endforeach                
</ul>
</div>
{{$services->links('pagination.paginatelinks')}}
</div>
</section>

        </div>
    </section>
    
@endsection
 
 