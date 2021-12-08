@extends('layouts.layoutsClient.appClient');
@section('content')
<div class="content"> 

    <!--======= NEWS / FAQS =========-->
    <section class="news">
        <div class="container"> 

            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>{{$product_attache->product_attach_name}}</h3>
                <p> Produit de sécurTrack </p>
                <hr>
            </div>
            <div class="news-artical products blog single-post">
                <div class="row"> 

                    <!--======= NEWS ARTICALS =========-->
                    <div class="col-md-8"> 

                        <!--======= BLOG PAGE =========-->
                        <div class="b-post" height="250px" width="300px"> <img class="img-responsive" src="/product_attach_images/{{$product_attache->product_attach_image}}"  alt=""> 

                            <!--======= BLOG TEXT =========-->
                            <ul class="post-info">
                                <li>{{$product_attache->created_at->format('d/m/Y   h:i')}} <span>/</span> </li>
                                <li> {{$product_attache->product_attach_name}}<span>/</span></li>
                                

                            </ul>
                            <p> {{$product_attache->product_attach_description}}</p>
                            <p> {{$product_attache->updated_at->format('d/m/Y   h:i')}}</p>
                            <!--======= SHARE =========-->
                            {{-- <div class="post-tags share">
                                <h4>Shares</h4>
                                <ul class="social_icons">
                                    <li class="facebook"><a href="#."><i class="fa fa-facebook"></i></a></li>
                                    <li class="pinterest"><a href="#."><i class="fa fa-pinterest"></i></a></li>
                                    <li class="twitter"><a href="#."><i class="fa fa-twitter"></i></a></li>
                                    <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a></li>
                                    <li class="vimeo"><a href="#."><i class="fa fa-vimeo-square"></i></a></li>
                                    <li class="dribbble"><a href="#."><i class="fa fa-dribbble"></i></a></li>
                                    <li class="behance"><a href="#."><i class="fa fa-behance"></i></a></li>
                                    <li class="instagram"><a href="#."><i class="fa fa-instagram"></i></a></li>
                                    <li class="stumbleupon"><a href="#."><i class="fa fa-stumbleupon"></i></a></li>
                                </ul>
                            </div> --}}

                            <!--======= ADMIN INFO =========-->
                            <div class="auther-info">
                                <ul>
                                    <li>
                                        <div class="img-admin"> <img  src="{{asset('frontend/images/avatar-1.jpg')}}"  alt=""> </div>
                                    </li>
                                    <li>
                                        <h4>Adnan</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean 
                                            penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                            commodo ligula eget dolor. Aenean </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog-side-bar"> 

                            <!--=======  SEARCH =========-->
                            <div class="search">
                                <div class="form-group">
                                    <input id="serch" type="search" class="input" placeholder="Search..">
                                    <button class="sea-icon"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                            <!--=======  CATEGORIES  FILTER =========-->
                            <!--=======  TWITER WIDGETS =========-->
                            <h5> Autres produits attachés </h5>
                            <div class="tw-widgets">
                                <ul>

                                    <!--=======  TWITER WIDGETS =========-->
                                    @foreach ($product_attaches as $product_attach)
                                            <li>
                                                <ul class="wid-in">
                                                   
                                                    <li> <a href="{{url('/detail_product_attache/'.$product_attach->id)}}"><img class="img-responsive" src="/product_attach_images/{{$product_attach->product_attach_image}}" alt=""></a> </li>
                                                    <li>
                                                        <h5>{{$product_attach->product_attache_name}} </h5>
                                                        <p> {{\Illuminate\Support\Str::limit($product_attach->product_attach_description, 60, $end='...')}}</p>
                                                        <h5> <span> {{$product_attach->created_at->format('d/m/Y   h:i')}}</span> </h5>
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