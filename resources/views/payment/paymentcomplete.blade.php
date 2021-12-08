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
<script>
			function check(){
			 var x =document.getElementById("checkoutb");
			 if(x.disabled){
				x.disabled=false;
			 }else{
				x.disabled=true;
			 }
			}
		   
</script>
	
    </head>
	
    <body class="grocery-theme">
		@include('sweetalert::alert')
     <div id="preloader">
	    <div class="preloader">

		<span></span><span></span>
	</div>
</div> 
   
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
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
								<h2 class="breadcrumbs_title">Operation terminée</h2>
								<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
									<li class="breadcrumb-item"><a href="{{URL::to('shop')}}">Shop</a></li>
									<li class="breadcrumb-item active" aria-current="page">Operation terminée</li>
								  </ol>
								</nav>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- =========================== Breadcrumbs =================================== -->
			
			<!-- =========================== Add To Cart =================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10 col-md-12 col-sm-12">
						
							<div class="card py-3 mt-sm-3">
							  <div class="card-body text-center">
								<h2 class="pb-2">Merci pour votre commande !</h2>
								<p class="font-size-sm mb-2">Votre commande a été passée et sera traitée dans les meilleurs délais..</p>
								<p class="font-size-sm mb-2">Assurez-vous de noter votre numéro de commande, qui est <span class="font-weight-medium">857DFR5478124.</span></p>
								<p class="font-size-sm">Vous recevrez sous peu un courriel de confirmation de votre commande. <u>Vous pouvez maintenant:</u></p><a class="btn btn-secondary mt-3 mr-3" href="{{URL::to('/shop')}}">Retourner faire des achats</a><a class="btn btn-primary mt-3" href="{{URL::to('/order_tracker')}}"><i class="czi-location"></i>&nbsp;Suivi de la commande</a>
							  </div>
							</div>
						
						</div>
					</div>
				</div>
			</section>
			<!-- =========================== Add To Cart =================================== -->
			
			
			@include('include.footerShopClient')
		<!-- cart -->
		<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
			<div class="rightMenu-scroll">
				<h4 class="cart_heading">Mon panier</h4>
				<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
				<div class="right-ch-sideBar" id="side-scroll">
					
					<div class="cart_select_items">
				
						@if(Session::has('cart'))
					
					@isset($products_caddy)
					@foreach ($products_caddy as $product)
					<!-- Single Item -->
			    	<div class="cart_selected_single">
					<div class="cart_selected_single_thumb">
						<a onclick="window.location='{{url('/detail_shop/'.$product['product_id'])}}'" >
							<img src="/public_images/{{json_decode($product['product_image'])['0']}}" class="img-fluid" alt /></a>
					 </div>
					  <div class="cart_selected_single_caption">
						<h4 class="product_title">{{$product['product_name']}}</h4>
						<span class="numberof_item">Prix unitaire: {{$product['product_price']}} FCFA</span>
						<span class="numberof_item">Quantité: {{ $product['qty'] }} </span>
						<span>Prix Total: {{ $product['product_price']*$product['qty'] }} FCFA</span>
						 <span class="numberof_item" > <a href="/delete_product_to_caddy/{{$product['product_id']}}" class="text-danger">Supprimer</a> </span>
						 <span class="numberof_item" > <a href="/detail_shop/{{$product['product_id']}}" class="text-primary">Detail</a></span>
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
							{{Session::has('cart') ? Session::get('cart')->totalPrice:0  }} FCFA	
						 </span></h6>
					</div>
					 
					<div class="cart_action">
						<ul>
							<li><a href="{{URL::to('/caddy')}}" class="btn btn-go-cart btn-theme">Voir le panier</a></li>


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
		<script src="{{asset('backend_shop/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/metisMenu.min.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/owl-carousel.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/ion.rangeSlider.min.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/smoothproducts.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/jquery-rating.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/jQuery.style.switcher.js')}}"></script>
		<script src="{{asset('backend_shop/assets/js/custom.js')}}"></script>
		
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

	</body>
</html>