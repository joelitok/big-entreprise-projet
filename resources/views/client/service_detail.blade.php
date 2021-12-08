@extends('layouts.layoutsClient.appClient')
@section('content')
<div class="content"> 
        <!--======= NEWS / FAQS =========-->
        <section class="news">
            <div class="container"> 

                <!--======= TITTLE =========-->
                <div class="tittle">
                    <h3>{{$service->service_name}}</h3>
                    <p> Service offert par sécurTrack </p>
                    <hr>
                </div>
                <div class="news-artical products blog single-post">
                    <div class="row"> 

                        <!--======= NEWS ARTICALS =========-->
                        <div class="col-md-8"> 

                            <!--======= BLOG PAGE =========-->
                            <div class="b-post"> 
                                {{-- class="img-responsive" --}}
                                <img height="400px" width="200px" 
                                src="/public_service_images/{{json_decode($service->service_image)['0'] ?? 'noimage.jpg'}}" alt="">
                                
                              

                                <a href="{{URL::to('devis_form/'.$service->id)}}" class="btn btn-success btn-sm">Demandé un devis</a>

                                <!--======= BLOG TEXT =========-->
                                <ul class="post-info">
                                    <li >{{$service->created_at->format('d/m/Y   h:i')}} <span>/</span> </li>
                                    <li> {{$service->service_name}}<span>/</span></li>
                                    
    
                                </ul>
                                <p> {{$service->service_description}}</p>
                                <p> {{$service->updated_at->format('d/m/Y   h:i')}}</p>
                                <!--======= SHARE =========-->
                                <div class="row">
                                    @foreach(json_decode($service->service_image) as $image)
                                    <div class="col-md-3">
                                        <a href="/public_service_images/{{$image}}"><img src="/public_service_images/{{$image}}"></a>
                                    </div>
                                    @endforeach	

                                </div>

                                <!--======= ADMIN INFO =========-->
                                <div class="auther-info">
                                    <ul>
                                        <li>
                                            <div class="img-admin"> <img  src="{{asset('frontend/images/avatar-1.jpg')}}" alt=""> </div>
                                        </li>
                                        <li>
                                            <h4>AUTRES SERVICES:</h4>
                                            <p>
                                                RÉDACTION WEB, HÉBERGEMENT - EMAILING, SMS PERSONNALISÉ ET GROUPÉ - CRÉATION DES SITES WEB - MARKETING DIGITALE, RÉFÉRENCEMENT </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="blog-side-bar"> 

                                <!--=======  SEARCH =========-->
                                {{-- <div class="search">
                                    <div class="form-group">
                                        <input id="serch" type="search" class="input" placeholder="Search..">
                                        <button class="sea-icon"><i class="fa fa-search"></i></button>
                                    </div>
                                </div> --}}

                                <!--=======  TWITER WIDGETS =========-->
                                <h5> Autres services </h5>
                                <div class="tw-widgets">
                                    <ul>

                                        <!--=======  TWITER WIDGETS =========-->
                                        @foreach ($services as $service)
                                                <li>
                                                    <ul class="wid-in">
                                                       
                                                        <li> <a href="{{url('/detail_service/'.$service->id)}}"><img class="img-responsive"  src="/public_service_images/{{json_decode($service->service_image)['0'] ?? 'noimage.jpg'}}" alt=""></a> </li>
                                                        <li>
                                                            <h5>{{$service->service_name}} </h5>
                                                            <p > {{\Illuminate\Support\Str::limit($service->service_description, 60, $end='...')}}</p>
                                                            <h5> <span> {{$service->created_at->format('d/m/Y   h:i')}}</span> </h5>
                                                        </li>
                                                       
                                                    </ul>
                                                </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!--=======  PRODUCTS  Filker =========-->
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </section>
@endsection