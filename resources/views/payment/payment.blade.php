<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.png') }}" />
    <title>sécurTrack shop</title>

    <!-- Custom CSS -->
    <link href="{{ asset('backend_shop/assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_shop/themify-icons.css') }}" rel="stylesheet">
    <link href="http://themify.me/themify-icons" rel="stylesheet">

    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <livewire:styles />
    <script>
        function check() {
            var x = document.getElementById("checkoutb");
            if (x.disabled) {
                x.disabled = false;
            } else {
                x.disabled = true;
            }
        }

        function check1() {
            var x = document.getElementById("check2");
            x.disabled;


        }

        function check2() {
            var x = document.getElementById("check1");
            x.disabled;
        }
    </script>

</head>

<body class="grocery-theme">
    @include('sweetalert::alert')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader">

            <span></span><span></span>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="utf-8" />
                <meta name="author" content="www.frebsite.nl" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <link rel="shortcut icon" href="{{asset('frontend/images/logo.png')}}"/>
                <title>sécurTrack shop</title>
                 
                <!-- Custom CSS -->
                <link href="{{asset('backend_shop/assets/css/styles.css')}}" rel="stylesheet">
                <link href="{{asset('backend_shop/themify-icons.css')}}" rel="stylesheet">
                <link href="http://themify.me/themify-icons" rel="stylesheet">
                <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
            
            
            </head>
            
            <body class="grocery-theme">
                @include('sweetalert::alert')
                <!-- ============================================================== -->
                <!-- Preloader - style you can find in spinners.css -->
                <!-- ============================================================== -->
             <div id="preloader">
                <div class="preloader">
        
                <span></span><span></span>
            </div>
        </div> 
           
        
                <!-- ============================================================== -->
                <!-- Main wrapper - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <div id="main-wrapper">
                
                    <!-- ============================================================== -->
                    <!-- Top header  -->
                    <!-- ============================================================== -->
                    <!-- Start Navigation -->
                    <div class="header">
                        <!-- Main header -->
                        <div class="main_header">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                                        <a class="nav-brand" href="{{URL::to('/')}}">
                                            <img src="{{asset('frontend/images/logo.png')}}" class="logo"  height="90px" width="100px" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                                        <!-- Show on Mobile & iPad -->
                                        <div class="blocks shop_cart d-xl-none d-lg-none">
                                            <div class="single_shop_cart">
                                                <div class="ss_cart_left">
                                                    <a class="cart_box" data-toggle="collapse" href="#mySearch" role="button" aria-expanded="false" aria-controls="mySearch"><i class="ti-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="single_shop_cart">
                                                <div class="ss_cart_left">
                                                    <a href="#"  onclick="openRightMenu()" class="cart_box"><span class="qut_counter">{{Session::has('cart') ? Session::get('cart')->totalQty:0 }} </span><i class="ti-shopping-cart"></i></a>
                                                </div>
                                                <div class="ss_cart_content">
                                                    <strong>Panier</strong>
                                                    <span>{{Session::has('cart') ? Session::get('cart')->totalPrice:0 }} FCFA</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Show on Desktop -->
                                        <div class="blocks shop_cart d-none d-xl-block d-lg-block">
                                            <div class="single_shop_cart">
                                                <div class="ss_cart_left">
                                                    <a href="javascript:void(0)" class="cart_box"><i class="ti-truck"></i></a>
                                                </div>
                                                <div class="ss_cart_content">
                                                    <strong>Tél:</strong>
                                                    <span>(+237) 233 400 243 </span>
                                                </div>
                                            </div>
                                            <div class="single_shop_cart">
                                                <div class="ss_cart_left">
                                                    <a href="#" onclick="openRightMenu()" class="cart_box"><span class="qut_counter" style="font-size:20px">
                                                    {{Session::has('cart')? Session::get('cart')->totalQty:0}}</span><i class="ti-shopping-cart"></i></a>
                                                </div>
                                                <div class="ss_cart_content">
                                                    <strong>Mon panier</strong>
                
                                                    <span>
        
                                                   {{Session::has('cart') ? Session::get('cart')->totalPrice:0  }} FCFA
                                         
                                                </span>
                                                      
                                                </div>
                                            </div>
                                        </div>
        
                                        <form method="get" action="{{url('shop-full-v')}}">
                                            <div class="blocks search_blocks d-none d-xl-block d-lg-block">
                                                <div class="input-group">
                                                    <input type="text" name="search" class="form-control" placeholder="Recherché un produit...">
                                                    <div class="input-group-append">
                                                    <button class="btn search_btn" type="submit"><i class="ti-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                                                        
        
        
        
        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="header_nav">
                            <div class="container">	
                                <div class="row align-item-center">
                                    <div class="col-lg-9 col-md-8 col-sm-4 col-2">
                                        <nav id="navigation" class="navigation navigation-landscape">
                                            <div class="nav-header">
                                                <div class="nav-toggle"></div>
                                            </div>
                                            <div class="nav-menus-wrapper" style="transition-property: none;">
                                                <ul class="nav-menu">
                                                <li><a href="{{URL::to('/')}}">  Accueil </a> 
                                                <li  class="{{(request()->is('shop-full-v')?'active':'')}}" ><a href="{{URL::to('/shop-full-v')}}">Tous</a></li>
                                                    
                                                @isset($categories)
                                                    @foreach ($categories as $category)
                                                    @if(($category->category_name))
                                                    
                                                    <li class="{{(request()->is('shop-full-v/'.$category->category_name)?'active':'')}}">
                                                        <a href="/shop-full-v/{{$category->category_name}}"> {{$category->category_name}}</a>
                                                        @if($category->subcategory)
        
                                                         <ul class="nav-dropdown nav-submenu">
                                                    @foreach ($category->subcategory as $scategory)
                                                             <li><a href="/shop-full-v/{{$category->category_name}}" >
                                                                {{$scategory->category_name}}
                                                                <span class="submenu-indicator"></span></a>
                                                             </li>
                                                    @endforeach
                                                              
                                                            
                                                         </ul>
                                                @endif
                                                    </li> 
                                                    @endif
                                                     
                                                    
                                                    @endforeach
                                                    @endisset
        
        
                                                    
                                                    
                                                
                                                
                                                </ul>
        
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <!-- =========================== Breadcrumbs =================================== -->
        <div class="breadcrumbs_wrap gray">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-center">
                            <h2 class="breadcrumbs_title">Commandes</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"> <i class="ti-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Commandes</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- =========================== Breadcrumbs =================================== -->

        <!-- =========================== Billing Section =================================== -->
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-md-12">

                         @livewire('payement-form')  


                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="cart_detail_box mb-4">
                            <div class="card-body">
                                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                    <li class="list-group-item d-flex">
                                        <h5 class="mb-0">Résume de commande</h5>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span>Sous-total</span> <span
                                            class="ml-auto font-size-sm">{{ Session::has('cart') ? Session::get('cart')->totalPrice : 0 }}
                                            FCFA</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span>Tax</span> <span class="ml-auto font-size-sm">00.00 FCFA</span>
                                    </li>
                                    
                                    <li class="list-group-item d-flex font-size-lg font-weight-bold">
                                        <span>Total</span> <span
                                            class="ml-auto font-size-sm">{{ Session::has('cart') ? Session::get('cart')->totalPrice : 0 }}
                                            FCFA</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a class="px-0 text-body" href="{{ URL::to('/shop-full-v') }}"><i class="ti-back-left mr-2"></i>
                            Continuer
                            les achats</a>
                    </div>

                </div>
            </div>
        </section>
        <!-- =========================== Billing Section =================================== -->


        @include('include.footerShopClient')
        <!-- cart -->
        <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
            <div class="rightMenu-scroll">
                <h4 class="cart_heading">Mon panier</h4>
                <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i
                        class="ti-close"></i></button>
                <div class="right-ch-sideBar" id="side-scroll">

                    <div class="cart_select_items">

                        @if (Session::has('cart'))

                            @isset($products_caddy)
                                @foreach ($products_caddy as $product)
                                    <!-- Single Item -->
                                    <div class="cart_selected_single">
                                        <div class="cart_selected_single_thumb">
                                            <a
                                                onclick="window.location='{{ url('/detail_shop/' . $product['product_id']) }}'"><img
                                                    src="/public_images/{{json_decode($product['product_image'])['0']}}"
                                                    class="img-fluid" alt /></a>
                                        </div>
                                        <div class="cart_selected_single_caption">
                                            <h4 class="product_title">{{ $product['product_name'] }}</h4>
                                            <span class="numberof_item">Prix unitaire: {{ $product['product_price'] }}
                                                FCFA</span>
                                            <span class="numberof_item">Quantité: {{ $product['qty'] }} </span>
                                            <span>Prix Total: {{ $product['product_price'] * $product['qty'] }} FCFA</span>
                                            <span class="numberof_item"> <a
                                                    href="/delete_product_to_caddy/{{ $product['product_id'] }}"
                                                    class="text-danger">Supprimer</a> </span>
                                            <span class="numberof_item"> <a
                                                    href="/detail_shop/{{ $product['product_id'] }}"
                                                    class="text-primary">Detail</a></span>
                                        </div>
                                    </div>
                                    {{-- {{Session::has('cart') ? Session::get('cart')->totalPrice:0  }} FCFA --}}
                                @endforeach
                            @endisset
                        @else
                            <h3> Aucun produit dans le panier</h3>
                        @endif

                    </div>

                    <div class="cart_subtotal">
                        <h6>Total<span class="theme-cl">
                                {{ Session::has('cart') ? Session::get('cart')->totalPrice : 0 }} FCFA
                            </span></h6>
                    </div>

                    <div class="cart_action">
                        <ul>
                            <li><a href="{{ URL::to('/caddy') }}" class="btn btn-go-cart btn-theme">Voir le panier</a>
                            </li>


                            <li><a href class="btn btn-checkout">Commandés</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- cart -->


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('backend_shop/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/smoothproducts.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/jquery-rating.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/jQuery.style.switcher.js') }}"></script>
    <script src="{{ asset('backend_shop/assets/js/custom.js') }}"></script>
   
   
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    
    
    
    <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
    </script>

    <script>
        function openLeftMenu() {
            document.getElementById("leftMenu").style.display = "block";
        }

        function closeLeftMenu() {
            document.getElementById("leftMenu").style.display = "none";
        }
    </script>

    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <livewire:scripts />
</body>

</html>
