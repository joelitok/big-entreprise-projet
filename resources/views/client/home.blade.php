<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SécurTrack</title>
        
        <meta name="keywords" content="sécurTrack" >
        <meta name="description" content="Votre securité... notre métier!">
        <meta name="author" content="Tchoufa Nkouatchet joel">

        <!-- FONTS ONLINE -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,300,700,400' rel='stylesheet' type='text/css'>

         <!--MAIN STYLE-->
         <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('frontend/css/owl.theme.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
 
         <!--======= COLOR STYLE CSS =========-->
         <link rel="stylesheet" id="color" href="frontend/css/color/default.css">
        <!--======= COLOR STYLE CSS =========-->
        <link rel="stylesheet" id="color" href="{{asset('frontend/css/color/default.css')}}">
        <link rel="shortcut icon" href="{{asset('frontend/images/logo.png')}}" />

       {{-- start toastr controller plugin --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
       {{-- end toastr controller plugin  --}}
       
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


       
    </head>
    <body>
        @include('sweetalert::alert')
        <!--======= PRELOADER =========-->
        <div class="work-in-progress">
            {{-- <div id="preloader"> --}}
                <div style="position: fixed; top: 50%; left: 50%;
                transform: translate(-50%, -50%);
                transform: -webkit-translate(-50%, -50%);
                transform: -moz-translate(-50%, -50%);
                transform: -ms-translate(-50%, -50%);
                color:darkred;">
                <img src="{{asset('frontend/images/logo.gif')}}" alt="logo" height="150px" width="150px">

                <span></span>
                <span></span>
                <span></span>
                <span></span>
        </div>
        </div>

       

        <!--======= WRAPPER =========-->
        <div id="wrap"> 
           @include('include.shotHeaderInfo')
            <!--======= HEADER =========-->
            <header class="sticky">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="navbar-header col-md-3 col-sm-3">
                                <button type="button" class="navbar-toggle collapsed" 
                                data-toggle="collapse" data-target="#nav-res"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-navicon"></span> </button>
                                <!--======= LOGO =========-->
                                <div class="logo"> <a href="{{URL::to('/')}}">  
                                    <img src="{{asset('frontend/images/logo.png')}}" height="100px" width="100px"></a> </div>
                            </div>

                            <!--======= MENU =========-->
                            <div class="col-md-9 col-sm-9">
                                <div class="collapse navbar-collapse" id="nav-res">
                                    <ul class="nav navbar-nav"> 
                                         <li><a href="{{URL::to('/')}}">Accueil</a></li>
                                        <li><a href="{{URL::to('/about')}}">A propos</a></li>
                                        <li class="dropdown" ><a  href="{{URL::to('/services_client')}}">Services</a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                
                                                @forelse ($services as $service)
                                                <li><a href="{{url('/detail_service/'.$service->id)}}"> 
                                                    {{$service->service_name}}</a></li>
                                                @empty
                                                 <li> Aucun</li>
                                                @endforelse
                                                
                                            </ul>
                                        </li>
                                        <li><a href="{{URL::to('/product_attaches_client')}}">Produits</a></li>
                                        <li><a href="{{URL::to('/shop-full-v')}}">SécureShop</a></li>
                                        <li><a href="{{URL::to('/contact')}}">Contact</a></li>


                                        <li  style="text-align:right">
                                            @if(Session::has('client_name'))
                                            <a href="{{URL::to('/client_profile')}}">  <i class="text-white"> Bonjour</i>: 
                                            <strong style="color: white">
                                                @if(Session::get('client_name'))
                                                     {{Session::get('client_name')}} 
                                                 @endif
                                            </strong>
                                            </a>
                                            @else 
                                          
                                        <li><a href="{{URL::to('/login2')}}">s'identifier  
                                        </a> &nbsp;<a href="{{URL::to('/signup2')}}">s'inscrire </a></li>
                                            @endif 
                                        </li>
                                        
                                       


                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" 
                                            data-toggle="dropdown"><i class="fa fa-search"></i> </a>
                                            <ul class="dropdown-menu mega 
                                            srch navbar-right animated-half fadeInUp">
                                                <li>
                                                    <div class="form-group">
                                                        <input type="search" class="form-control" 
                                                        id="search" placeholder="Seacrh Here">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
 <!--======= BANNER =========-->

 <div id="banner">
    <div class="flexslider">
        <ul class="slides">

            @if($sliders)
           
            @forelse ($sliders as $slider)
                
            
            <li> 
                
                @if($slider->slider_image )
                <img src="/slider_images/{{$slider->slider_image}}" alt="" width="1150" height="400">
                @else 
                 <img src="/slider_images/noimage.jpg" alt="" width="1150" height="400">
                @endif
               
                
                
                <div class="container">
                    <div class="align-c text-slider">
                        <h3>{{$slider->slider_name}}<i class="fa fa-long-arrow-right"></i></h3>
                            <p>{{\Illuminate\Support\Str::limit($slider->slider_shot_description, 100, $end='...')}}</p>
                        <div class="row"> 
                            <a class="btn" href="{{URL::to('/services_client')}}">Nos services</a>
                            <a class="btn btn-1" href="">Partenaires</a>
                        </div>
                    </div>
                </div>
            </li>
            @empty
                <div class="container">
                    Aucun Slider disponible
                </div>
            @endforelse 
            @endif
        </ul>
    </div>
</div>

<!--======= CONTENT START =========-->
<div class="content"> 

    <!--======= TESTIMONIALS =========-->
    <section id="testimonials">
        <div class="container">
            <div id="testi-slide" class="testi-slide"> 

                <!--======= SLIDE 1 =========-->
                <div class="item">
                    <div class="testi">
                        <div class="avatr"> <img src="{{asset('frontend/images/avatar-1.jpg')}}" alt="" > </div>
                        <div class="feed-text">
                            <p>Nous vous installons des outils de relève d’empreintes digitale et de reconnaissance faciale, ceci vous permet de contrôler avec parfaite exactitude les entrées et sorties de vos locaux</p>
                            <h5><span> Biométrie</span></h5>
                        </div>
                    </div>
                </div>
                <!--======= SLIDE 2 =========-->

                <div class="item">
                    <div class="testi">
                        <div class="avatr"> <img src="{{asset('frontend/images/avatar-2.jpg')}}" alt="" > </div>
                        <div class="feed-text">
                            <p>Nous mettons à votre disposition des accessoires H-Tech qui vous permettrons de suivre et de retrouver vos biens (automobile personnel, flotte de véhicule en entreprise, moto etc...)</p>
                            <h5><span> Tracking / Géolocalisation</span></h5>
                        </div>
                    </div>
                </div>

                <!--======= SLIDE 3 =========-->
                <div class="item">
                    <div class="testi">
                        <div class="avatr"> <img src="{{asset('frontend/images/avatar-3.jpg')}}" alt="" > </div>
                        <div class="feed-text">
                            <p>Fournissez-vous en gadgets de derniers cris en contrôle d’accès, pour sécuriser et filtrer l’accès à vos locaux. 
                                Les portes de vos Bureaux, laboratoires, entrepôts etc….</p>
                            <h5><span> Contrôle d’accès </span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!--======= RODUCTS / ITEMS =========-->
    <section id="products" class="products">
        <div class="container"> 
            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>Nos services</h3>
                <p>Une équipe dynamique, hautement qualifié et compétente dévoué à la tâche avec un objectif précis : « conquérir le monde » </p>
                <hr>
            </div>

            <!--======= PRODUCTS ROW =========-->
            <div class="row">
                <div id="course-slider">
                 
                     
                
                 @forelse ($services as $service)
<div class="item">
    <div class="prodct"> 

        <!--======= IMAGE =========--> 
        <img class="img-responsive" src="/public_service_images/{{json_decode($service->service_image)['0'] ?? 'noimage.jpg' }}"
         alt="" width="270px" height="470px">
        <div class="pro-info"> 

            <!--======= ITEM NAME / RATING =========-->
            <div class="cate-name"> <span class="pull-left">{{$service->service_name}}</span>
                <ul class="stars pull-right">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li class="no-rate"><i class="fa fa-star"></i></li>
                </ul>
            </div>

            <!--======= ITEM Details =========--> 
            <input type="hidden" value="{{$shot_description=Str::limit($service->service_description ?? '', 50, $end='...') }}">
            <a href="#productModal">{{$shot_description}}</a>
            <hr>
            <span>{{$service->created_at->format('d/m/Y')}}</span> </div>
     
        <div style="text-align: center"><a class="btn btn-1" href="{{url('/detail_service/'.$service->id)}}">Detail</a> </div>
         
    
    
    
        </div>
</div>
@empty
          <li>Aucun </li>           
@endforelse   
                    
                </div> 
            </div>

            <!--<div class="text-center margin-t-40"> <a href="#." class="btn"> See All Course</a> </div>-->
        </div>
    </section>



    <!--======= VIDEO =========-->
    <section id="video" data-stellar-background-ratio="0.2">
        <div class="container text-center">
            <h1>Nous vous proposons les meilleures offres</h1>
            <h3>    
       Prenez en main le controle de votre flotte  à des Prix Fou  <strong style="color: red ; font-size:30px">80 000 FCFA</strong></h3>
            <a href="#small-vedio" class="link popup-vedio video-btn"><i class="fa fa-play-circle-o"></i></a>
        </div>
    </section>

    <!--======= POPUP VIDEO =========-->
    <div id="small-vedio" class="zoom-anim-dialog mfp-hide">
        <div class="pop_up">
           {{--  <iframe src="https://www.youtube.com/watch?v=66_dzcfZAn0"></iframe> --}}
             
           <video controls style="max-width: 100%" autoplay="false" class="pop_up" width="1150" height="400">
                <source src="/public_images/securtrack.mp4" type="video/mp4">
            </video> 
        </div>
    </div>

    {{-- <!--======= PRICING =========-->
    <section id="pricing">
        <div class="container"> 
            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>Course Price Lists</h3>
                <p>Lessons From just $20 Per Hour or 5 Lessons for $120 or 10 Hours For $180 </p>
                <hr>
            </div>

            <!--======= PRICING ROW =========-->
            <ul class="row">

                <!--======= PRICE TABLE 1 =========-->
                <li class="col-sm-6 col-md-3">
                    <div class="price-inner">
                        <div class="price-head">
                            <h4>Personal Driving</h4>
                            <span>$120</span> </div>
                        <p>Lessons From $20 Per Hour </p>
                        <p>Driving Licence</p>
                        <p>Medical Service</p>
                        <p>Test Driving Cars</p>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </p>
                        <p class="check-gr"><i class="fa fa-check-circle"></i> </p>
                        <a href="#." class="btn">Choose PLAN</a> 
                    </div>
                </li>

                <!--======= PRICE TABLE 2 =========-->
                <li class="col-sm-6 col-md-3">
                    <div class="price-inner">
                        <div class="price-head">
                            <h4>Personal Driving</h4>
                            <span>$120</span> </div>
                        <p>Lessons From $20 Per Hour </p>
                        <p>Driving Licence</p>
                        <p>Medical Service</p>
                        <p>Test Driving Cars</p>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </p>
                        <p class="check-gr"><i class="fa fa-check-circle"></i> </p>
                        <a href="#." class="btn">Choose PLAN</a> 
                    </div>
                </li>

                <!--======= PRICE TABLE 3 =========-->
                <li class="col-sm-6 col-md-3">
                    <div class="price-inner">
                        <div class="price-head">
                            <h4>Personal Driving</h4>
                            <span>$120</span> </div>
                        <p>Lessons From $20 Per Hour </p>
                        <p>Driving Licence</p>
                        <p>Medical Service</p>
                        <p>Test Driving Cars</p>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </p>
                        <p class="check-gr"><i class="fa fa-check-circle"></i> </p>
                        <a href="#." class="btn">Choose PLAN</a> 
                    </div>
                </li>

                <!--======= PRICE TABLE 4 =========-->
                <li class="col-sm-6 col-md-3">
                    <div class="price-inner">
                        <div class="price-head">
                            <h4>Personal Driving</h4>
                            <span>$120</span> </div>
                        <p>Lessons From $20 Per Hour </p>
                        <p>Driving Licence</p>
                        <p>Medical Service</p>
                        <p>Test Driving Cars</p>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </p>
                        <p class="check-gr"><i class="fa fa-check-circle"></i> </p>
                        <a href="#." class="btn">Choose PLAN</a> 
                    </div>
                </li>

            </ul>                           
        </div>
    </section> --}}

    <section class="intrested">
        <div class="container"> 
             @if(Session::has('status'))
            <div class="alert alert-success">
                 {{Session::get('status')}}
               <i class="fa fa-check"></i> 
               {{Session::put('status',null)}} 
            </div>    
            @endif

            @if(count($errors)>0)
            <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
                </ul>
            @endif
            <!--======= TITTLE =========-->
            <div class="tittle wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                <h3>Contactez Nous</h3>
                <p>sécurTrack</p>
                <hr>
            </div>
            <div class="intres-lesson">
                <h3>Une équipe dynamique, hautement qualifié et compétente dévoué à la tâche avec un objectif précis 
                <br> : « conquérir le monde ». Nous sommes disponible pour tous vos travaux quel qu’en soit l’envergure,
                <br> chez sécurTrack nous avons toujours une longueur d’avance, ce qui nous amené à toujours vous satisfaire. </h3>

                <!--======= FORM =========-->
                <form method="post" action="{{url('/contact-us')}}">
                    @csrf
                    <ul class="row">

                        <!--======= INPUT NAME =========-->
                        <li class="col-sm-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="votre nom">
                                <span class="fa fa-user"></span> </div>
                        </li>

                        <!--======= INPUT EMAIL =========-->
                        <li class="col-sm-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="votre email" name="email">
                                <span class="fa fa-envelope"></span> </div>
                        </li>

                        <!--======= INPUT PHONE NUMBER =========-->
                        <li class="col-sm-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Votre numero" name="phone">
                                <span class="fa fa-phone"></span> </div>
                        </li>

                        <!--======= INPUT SELECT =========-->
                        <li class="col-sm-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="message" name="message">
                                <span class="fa fa-file-text-o"></span> </div>
                        </li>
                    </ul>

                    <!--======= BUTTON =========-->
                    <div class="text-center wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                        <button   type="submit"  class="btn">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--======= NEWS / FAQS =========-->
    <section id="news" class="news">
        <div class="container"> 

            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>En Cas de vol de Votre Engin</h3>
                <p> Confiez nous la gestion de votre flotte et recevez un reporting en temps réel</p>
             <hr>
            </div>
            <div class="row"> 
                <!--======= ACCORDING =========-->
                <div class="col-sm-6 col-md-6"> 

                    <!--======= ACCORDING 1=========-->
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1: Votre véhicule est volé</a> </h4>
                            </div>

                            <!--======= ADD INFO HERE =========-->
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>  vous constatez la disparition de votre véhicule ou vous recevez une alerte sur votre téléphone.</p>
                                </div>
                            </div>
                        </div>

                       
                        <!--======= ACCORDING 2 =========-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"> 2: Vous contactez SECURTRACK</a> </h4>
                            </div>

                            <!--======= ADD INFO HERE =========-->
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p> Appelez SECURTRACK dès que vous constatez le vol. le PC prend en charge votre demande, contacte les forces de l'ordre et leur donne la possibilité de localiser votre Véhicule.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!--======= ACCORDING 3 =========-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed"> 3: Votre véhicule est retrouvé</a> </h4>
                            </div>

                            <!--======= ADD INFO HERE =========-->
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p> Grace à la localisation GSM par CELL-ID de votre traqueur antivol GPS, votre véhicule est localisé et retrouvé dans les meilleurs délais SECURTRACK vous restitue votre bien</p>
                                </div>
                            </div>
                        </div>

                        <!--======= ACCORDING 4 =========-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour" class="collapsed"> NOTRE OBJECTIF NUMERO 1</a> </h4>
                            </div>

                            <!--======= ADD INFO HERE =========-->
                            <div id="collapsefour" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p> Retrouver votre véhicule dans les meilleurs delais. notre objectif sécondaire est d'aider à l'arrestation en flagrant délit des voleurs. Vous pourvez rouler en toute Confiance Car Nous serons présent pour vous proposer une solution concrète en cas de vol de votre véhicule.</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!--======= NEWS ARTICALS =========-->
                <div class="col-md-6 col-sm-6">
                    <div class="news-artical news-slide  products"> 

                        <!--======= NEWS SLIDER =========-->
                        <div id="news-slide"> 
                       
                        @forelse ($services as $services)
                            <!--======= NEWS SLIDER 1 =========-->
                            <div class="item">
                                <div class="prodct artical"> 

                                    <!--======= IMAGE =========--> 
                                    <img class="img-responsive" src="/public_service_images/{{json_decode($service->service_image)['0'] ?? 'noimage.jpg' }}" alt="">
                                    <div class="pro-info"> 

                                        <!--======= ITEM NAME / RATING =========-->
                                        <div class="cate-name"> <span class="pull-left">{{$service->updated_at->format('d/m/Y H:i')}}</span>
                                            <ul class="heart pull-right">
                                                <li><i class="fa fa-heart"></i></li>
                                            </ul>
                                        </div>

                                        <!--======= ITEM Details =========--> 
                                        <a href="#.">{{$service->service_name}}</a>
                                        <hr>
                                        <p>{{\Illuminate\Support\Str::limit($slider->slider_shot_description, 100, $end='...')}}</p>
                                        <a class="btn btn-1" href="{{url('/detail_service/'.$service->id)}}">Detail</a>  </div>
                                </div>
                            </div>

                        @empty
                            <div class="container justify-content-center">
<h1> Aucun Produits disponible</h1>
                            </div>
                        @endforelse
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

              <!--======= FOOTER =========-->
              <footer>
                <div class="container">                       

                    <!--======= FOOTER ROWS =========-->                          
                    <ul class="row">

                      

                        <!--======= USEFUL LINKS =========-->
                        <li class="col-sm-6 col-md-4">
                            <h5>CAMEROUN</h5>
                            
                            <ul>
                                <li><a href="#"> 1360 Blvd. de la réunification </a></li>
                                <li><a href="#"> Deido au lieu dit Cinéma l'Eden face Total 3 Morts </a></li>
                                <li><a href="#"> Tél:(+237) 233 400 243 / 693 347 312 / 671 335 746 </a></li>
                                <li><a href="#"> E-mail:contact@securtrack.net </a></li>
                            
                            </ul>
                            <hr>
                           
                            <h5>RCA </h5>
                            
                            <ul >
                                <li><a href="#"> Av. de France sica1 - BP: 563 Bangui </a></li>
                                <li><a href="#"> Tél:+ (+236) 72 03 63 60  </a></li>
                                <li><a href="#">E-mail:contact-rca@securtrack.net    </a></li>
                            </ul>


                            
                         
                               <h5>Souscrire à notre newsletter </h5>
                               <form action="{{URL::to('/newsletter')}}" method="POST" class="subscribe-form" id="subscribe_form">
                                  @csrf    
                                <input type="email" name="email" id="scf_email" placeholder="your.email@adress.com" required>
                                    <button type="submit" id="scf_submit"><i class="fa fa-check"></i> </button>
                                </form>
                                
						
                            







                        </li>








                        <!--======= USEFUL LINKS =========-->
                        <li class="col-sm-6 col-md-4">
                            <h5>Nos <span>Images</span></h5>
                            <hr>
                            <ul class="flicker">
                                <li><a href="#"><img class="img-responsive" src="{{asset('frontend/images/g-img-1.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="{{asset('frontend/images/g-img-2.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="{{asset('frontend/images/g-img-3.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="{{asset('frontend/images/g-img-4.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="{{asset('frontend/images/g-img-5.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="{{asset('frontend/images/g-img-1.jpg')}}" alt=""></a></li>
                            </ul>
                        </li>

                        <!--======= OPENING HOURS =========-->
                        <li class="col-sm-6 col-md-4">
                            <h5>Jours ouvrable  & <span>Heurs</span></h5>
                            <hr>
                            <ul class="timing">
                                <li> Lundi <span> 08:00 - 18:00 </span></li>
                                <li> Mardi <span>08:00 - 18:00 </span></li>
                                <li> Mercredi <span> 08:00 - 18:00 </span></li>
                                <li> Jeudi <span> 08:00 - 18:00 </span></li>
                                <li> Vendredi <span> 08:00 - 18:00 </span></li>
                                <li> Samedi <span> 08:00 - 18:00 </span></li>
                                <li> Dimanche <span>Fermé</span></li>
                            </ul>
                        </li>

                    </ul>

                    <div class="scroll-top">
                        <span class="fa fa-angle-up"></span>
                    </div> 
                </div>

                <!--======= RIGHTS =========-->
                <div class="rights">
                    <div class="container">
                        <ul class="row">
                            <li class="col-md-8">
                                <p>All Rights Reserved © copy right 2021</p>
                            </li>
                            <!--======= SOCIAL ICON =========-->
                            <li class="col-md-4">
                                <ul class="social_icons">
                                    <li class="facebook"><a href="."><i class="fa fa-facebook"></i></a></li>
                                    <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <script src="{{asset('frontend/js/jquery-2.2.4.min.js')}}"></script> 
    <script src="{{asset('frontend/js/wow.min.js')}}"></script> 
    <script src="{{asset('frontend/js/bootstrap.js')}}"></script> 
    <script src="{{asset('frontend/js/drive-me-plugin.js')}}"></script> 
    <script src="{{asset('frontend/js/jquery.isotope.min.js')}}"></script> 
    <script src="{{asset('frontend/js/jquery.flexslider-min.js')}}"></script> 
    <script src="{{asset('frontend/js/mapmarker.js')}}"></script> 
    <script src="{{asset('frontend/js/color-switcher.js')}}"></script> 
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>      
    <script src="{{asset('frontend/js/owl.carousel.js')}}"></script>  
     <script src="{{asset('frontend/js/main.js')}}"></script>
     
    <script src="js/jquery.cookie.js"></script>       
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script>
    <script type="text/javascript">
        // Use below link if you want to get latitude & longitude
        // http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude.php 
        $(document).ready(function () {
            //set up markers 
            var myMarkers = {"markers": [
                    {"latitude": "-37.8176419", "longitude": "144.9554397", "icon": "images/map-locator.png", "baloon_text": '121 King St, Melbourne VIC 3000, Australia'}
                ]};
            //set up map options
            $("#map").mapmarker({
                zoom: 15,
                center: '121 King Street Melbourne Victoria 3000 Australia',
                markers: myMarkers
            });
        });
    </script> 


{{-- start script pour le chatbot --}}

<script type="text/javascript">
    var vsid = "kc2099300c1b708";
    (function() { 
    var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
     vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.leadchatbot.com/vsa/chat.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
    })();
</script>

{{-- end script pour le chatbot --}}



{{-- Toastr start --}}
{{-- <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
{{-- Toastr end --}}
</body>
</html>
