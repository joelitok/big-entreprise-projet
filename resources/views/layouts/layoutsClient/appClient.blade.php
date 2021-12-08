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
         <link rel="stylesheet" id="color" href="css/color/default.css">
        <!--======= COLOR STYLE CSS =========-->
        <link rel="stylesheet" id="color" href="{{asset('css/color/default.css')}}">
        <link rel="shortcut icon" href="{{asset('frontend/images/logo.png')}}" />

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  

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
                                <!--======= LOGO =========-->
                                <div class="logo"> <a href="{{URL::to('/')}}">  <img src="{{asset('frontend/images/logo.png')}}" height="100px" width="100px"></a> </div>
                            </div>

                            <!--======= MENU =========-->
                            <div class="col-md-9 col-sm-9">
                                <div class="collapse navbar-collapse" id="nav-res">
                                    <ul class="nav navbar-nav"> 
                                        <li><a href="{{URL::to('/')}}">Accueil</a></li>
                                        <li><a href="{{URL::to('/about')}}">A propos</a></li>
                                        <li class="dropdown" ><a  href="{{URL::to('/services_client')}}">Services</a>
                                            <ul class="dropdown-menu animated-half fadeInUp">
                                                
                                                @isset($services)
                                                @foreach ($services as $service)
                                                <li><a href="{{url('/detail_service/'.$service->id)}}"> {{$service->service_name}}</a></li>
                                                @endforeach
                                                @endisset
                                               
                                                
                                            </ul>
                                        </li>
                                         <li><a href="{{URL::to('/product_attaches_client')}}">Produits</a></li>
                                         <li><a href="{{URL::to('/shop-full-v')}}">SécureShop</a></li>
                                         <li><a href="{{URL::to('/contact')}}">Contact</a></li>
                                         <li><a href="{{URL::to('/login2')}}">Connexion</a></li>
                                       
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> </a>
                                            <ul class="dropdown-menu mega srch navbar-right animated-half fadeInUp">
                                                <li>
                                                    <div class="form-group">
                                                        <input type="search" class="form-control" id="search" placeholder="Seacrh Here">
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







@yield('content')








































              <!--======= FOOTER =========-->
              <footer>
                <div class="container">                       

                    <!--======= FOOTER ROWS =========-->                          
                    <ul class="row">
                <!--======= USEFUL LINKS =========-->
                        <li class="col-sm-6 col-md-4">
                            <h5>CAMEROUN</h5>
                            
                            <ul >
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
                                <li><a href="#">E-mail:contact-rca@securtrack.net </a></li>
                            </ul>
                            <h5>Souscrire à notre newsletter </h5>
                               <form  action="{{URL::to('/newsletter')}}" method="POST" class="subscribe-form" id="subscribe_form">
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
                                <li> Samedi <span> 08:00 - 15:00 </span></li>
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