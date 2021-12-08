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
		<link rel="stylesheet" href="{{asset('css/app.css')}}">

		<link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
		<livewire:styles />
		  {{-- google analitycs start --}}

		  <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q4PM8QRL2X"></script>
		  <script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
		  
			gtag('config', 'G-Q4PM8QRL2X');
		  </script>
		  {{-- google analitycs end --}}
	
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
        <div id="main-wrapper">
		
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
										<li  class="{{(request()->is('shop-full-v')?'active':'')}}" ><a href="{{URL::to('/shop-full-v')}}">Tous</a>
										</li>
											
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


											<li  style="text-align:right">
												@if(Session::has('client_name'))
												<a href="{{URL::to('/client_profile')}}">	<i class="text-white"> Bonjour</i>: 
													<strong style="color: white">
													@if (Session::get('client_name'))
													{{Session::get('client_name')}} 
													@endif
													</strong>
												</a>
												@else 
												<a href="{{URL::to('/login2')}}"><i class="ti ti-bag"></i> s'identifier 
												</a>
												@endif 
											</li>

										</ul>

									</div>
									
								</nav>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
@yield('contenu')
<section class="theme-bg call_action_wrap-wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
				<div class="call_action_wrap">
					<div class="call_action_wrap-head">
						<h3>Souscrire à notre newsletter</h3>
						<span> Pour recevoir de façon mensionnelle les informations sur l'ajout de nouveau produits</span>
					</div>
					<div class="newsletter_box">
						<form action="{{URL::to('/newsletter')}}" method="POST">
							@csrf
						<div class="input-group">
							<input type="text" class="form-control" name="email" placeholder="souscrire à la newsletter">
							<div class="input-group-append">
							<button class="btn search_btn" type="submit"><i class="ti ti-arrow-circle-right"></i></button>
							</div>
						</div>
					</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
@include('include.footerShopClient')
