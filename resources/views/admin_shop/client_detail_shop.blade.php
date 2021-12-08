<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
        <title>sécurTrack</title>
		 
        <!-- Custom CSS -->
        <link href="{{asset('backend_shop/assets/css/styles.css')}}" rel="stylesheet">
        <link href="http://themify.me/themify-icons" rel="stylesheet">
        <link href="{{asset('backend_shop/themify-icons.css')}}" rel="stylesheet">
		
    </head>
	
    <body class="grocery-theme">
		@include('sweetalert::alert')
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css')}} -->
        <!-- ============================================================== -->
        <div id="preloader">
        <div class="preloader">
        <span></span><span></span></div></div>
		
		
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
                
                </head>
                
                <body class="grocery-theme">
                
                    <!-- ============================================================== -->
                    <!-- Preloader - style you can find in spinners.css -->
                    <!-- ============================================================== -->
                    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
                    
                    
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
			<div class="breadcrumbs_wrap dark">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="text-center">
								<h2 class="breadcrumbs_title">{{$product->product_name}}</h2>
								<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
									{{-- <li class="breadcrumb-item"><a href="#">Men</a></li>
									<li class="breadcrumb-item"><a href="#">Fresh Fruits</a></li> --}}
									<li class="breadcrumb-item active" aria-current="page">{{$product->product_category}}</li>
								  </ol>
								</nav>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- =========================== Breadcrumbs =================================== -->
			
			
			<!-- =========================== Product Detail =================================== -->
			<section>
				<div class="container">
					<div class="row">
					
						<div class="col-lg-6 col-md-12 col-sm-12">
						

 






				<div class="sp-loading">
				 <img src="/public_images/{{json_decode($product->product_image)['0'] ?? 'noimage.jpg'}}"> <br>LOADING IMAGES 
				</div>



				<div class="sp-wrap">
				 @foreach(json_decode($product->product_image) as $image)
				<a href="/public_images/{{$image}}"><img src="/public_images/{{$image ?? 'noimage.jpg'}}"></a>
				@endforeach			
				</div>



						
							
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="woo_pr_detail">
								
								<div class="woo_cats_wrps">
									<a href="#" class="woo_pr_cats">{{$product->product_category}}</a>
								<a href="{{URL::to('/payment')}}"> 
									<span class="woo_pr_trending" > Commandez maintenant</span>
								</a>
								</div>
								<h2 class="woo_pr_title">{{$product->product_name}}</h2>
								
							
								<div class="woo_pr_short_desc">
									<p>{{$product->product_description}}</p>
								</div>
								
								<div class="woo_pr_price">
									<div class="woo_pr_offer_price">
										<h3>
                                        {{$product->product_price}} FCFA
                                        {{-- <span class="org_price">$199<sup>.99</sup></span> --}}
                                        
                                        </h3>
									</div>
									<div class="woo_offer_box">
										<div class="woo_off_text">
											<h4>40%
                                                {{-- <span></span> --}}
                                            </h4>
										</div>
									</div>
								</div>
								
								<!-- Short Info -->
								<div class="pr_info_prefix grocery_style mb-3">
									<!-- First -->
									<div class="cart_sku_preflix">
										<div class="sku_preflix_first">
											<strong>Categories:</strong>
										</div>
										<div class="sku_preflix_last">
											{{$product->product_category}}
										</div>
									</div>
									<!-- First -->
									<div class="cart_sku_preflix">
										<div class="sku_preflix_first">
											<strong>mis à jours le :</strong>
										</div>
										<div class="sku_preflix_last">
											{{$product->updated_at->format('d / m / Y')}}
										</div>
									</div>
									
									<!-- First -->
									<div class="cart_sku_preflix">
										<div class="sku_preflix_first">
											<strong>Ajouté le :</strong>
										</div>
										<div class="sku_preflix_last">
											{{$product->created_at->format('d / m / Y')}}
										</div>
									</div>
		
									<!-- First -->
									<div class="cart_sku_preflix">
										<div class="sku_preflix_first">
											<strong>Pays :</strong>
										</div>
										<div class="sku_preflix_last">
											Cameroun
										</div>
									</div>

								</div>
								
								<div class="woo_btn_action">
                                    <form action="{{url('/update_quantity_product/'.$product->id)}}" method="POST">
                                        {{ csrf_field() }}
                                    
									<div class="col-12 col-lg-auto">
										<input type="number" name="quantity" class="form-control qua_pr mb-2" value="1"/>
										</div>
									     <div class="col-12 col-lg-auto">
										<button type="submit" class="btn btn-block btn-dark mb-2">Ajouté au panier <i class="ti-shopping-cart-full ml-2"></i></button>
									</div>
                                </form>
								</div>
                               
								
							</div>
						</div>
						
					</div>
					
					<!-- Product Description -->
					<div class="row mt-5">
						<div class="col-lg-12 col-md-12">
							<div class="custom-tab style-1">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true" aria-expanded="true">Description</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false" aria-expanded="false">Information addionnelle</a>
									</li>
								{{-- 	<li class="nav-item">
										<a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false" aria-expanded="false">Reviews</a>
									</li> --}}
								</ul>


								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab" aria-expanded="true">
										<p>{{$product->product_description}}</p>
									</div>
									<div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab" aria-expanded="false">
										<p>Pour ce produit la quantité disponible en stocke est de {{$product->stock}} ce produit est régulierement en promotion sur le site.</p>
										<div class="product_meta">
											<span class="sku_wrapper">CM: <span class="sku">+237</span></span>
											<span class="sku_wrapper">Réference: <span class="sku">{{$product->reference}}</span></span>
											<span class="posted_in">Catégorie:
												{{$product->product_category}}
											</span>
											<span class="tagged_as">Ajouté le : {{$product->created_at->format('d/m/Y')}}
											</span>
										</div>
									</div>

{{-- 


									<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" aria-expanded="false">
										<div class="review-wrapper">
											<div class="review-wrapper-header">
												<h4>24 Reviews</h4>
											</div>
											<div class="review-wrapper-body">
												<ul class="review-list">
													<li>
														<div class="reviews-box">
															<div class="review-body">
																<div class="review-avatar">
																	<img alt="" src="{{asset('backend_shop/assets/img/user-3.jpg')}}" class="avatar avatar-140 photo">
																</div>
																<div class="review-content">
																	<div class="review-info">
																		<div class="review-comment">
																			<div class="review-author">
																				Cole Harris																			
																			</div>
																			<div class="review-comment-stars">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star empty"></i>
																			</div>
																		</div>
																		<div class="review-comment-date">
																			<div class="review-date">
																				<span>4 weeks ago</span>
																			</div>
																		</div>
																	</div>
																	<p>At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident.</p>
																</div>
															</div>
														</div>
													</li>
													
													<li>
														<div class="reviews-box">
															<div class="review-body">
																<div class="review-avatar">
																	<img alt="" src="{{asset('backend_shop/assets/img/user-4.jpg')}}" class="avatar avatar-140 photo">
																</div>
																<div class="review-content">
																	<div class="review-info">
																		<div class="review-comment">
																			<div class="review-author">
																				Mariya Merry																			
																			</div>
																			<div class="review-comment-stars">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star empty"></i>
																			</div>
																		</div>
																		<div class="review-comment-date">
																			<div class="review-date">
																				<span>3 weeks ago</span>
																			</div>
																		</div>
																	</div>
																	<p>At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident.</p>
																</div>
															</div>
														</div>
													</li>
													
													<li>
														<div class="reviews-box">
															<div class="review-body">
																<div class="review-avatar">
																	<img alt="" src="{{asset('backend_shop/assets/img/user-5.jpg')}}" class="avatar avatar-140 photo">
																</div>
																<div class="review-content">
																	<div class="review-info">
																		<div class="review-comment">
																			<div class="review-author">
																				Wadden Will																	
																			</div>
																			<div class="review-comment-stars">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star empty"></i>
																			</div>
																		</div>
																		<div class="review-comment-date">
																			<div class="review-date">
																				<span>5 weeks ago</span>
																			</div>
																		</div>
																	</div>
																	<p>At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident.</p>
																</div>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
										
										<div class="review-wrapper">
											<div class="review-wrapper-header">
												<h4>Rate &amp; Write Reviews</h4>
											</div>
											<div class="review-wrapper-body">
											
												<div class="row mb-3">
													<div class="col-md-12">
														<div class="rating-opt">
															<div class="jr-ratenode jr-nomal"></div>
															<div class="jr-ratenode jr-nomal "></div>
															<div class="jr-ratenode jr-nomal "></div>
															<div class="jr-ratenode jr-nomal "></div>
															<div class="jr-ratenode jr-nomal "></div>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-6 form-group">
														<input type="text" class="form-control" placeholder="Your Name*">
													</div>
													<div class="col-sm-6 form-group">
														<input type="email" class="form-control" placeholder="Email Address*">
													</div>
													<div class="col-sm-12 form-group">
														<textarea class="form-control height-110" placeholder="Tell us your experience..."></textarea>
													</div>
													<div class="col-sm-12">
														<button type="button" class="btn btn-primary">Submit your review</button>
													</div>
												</div>
											</div>
										</div>
									</div> --}}







								</div>
							</div>	
						</div>
					</div>
					
				</div>
			</section>
			<!-- =========================== Product Detail =================================== -->
			
			<!-- =========================== Related Products =================================== -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 mb-2">
							<h4 class="mb-0">Autres Produits</h4>
						</div>						
					</div>
					
					<div class="row">
					
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel products-slider owl-theme">
@foreach ($products as $product)
<!-- Single Item -->
<div class="item">
    <div class="woo_product_grid">
        <span class="woo_pr_tag hot">{{$product->product_category}}</span>
        <div class="woo_product_thumb">
            <img src="/public_images/{{json_decode($product->product_image)['0'] ?? 'noimage.jpg'}}" class="img-fluid" alt="" />
			
		</div>
        <div class="woo_product_caption center">
            
            <div class="woo_title">
                <h4 class="woo_pro_title"><a href="">{{$product->product_name}}</a></h4>
            </div>
            <div class="woo_price">
                <h6>{{$product->product_price}} FCFA
                    {{-- <span class="less_price">$112.10</span> --}}
                
                </h6>
            </div>
        </div>
        <div class="woo_product_cart hover">
            <ul>
                <li><a onclick="window.location='{{url('/detail_shop/'.$product->id)}}'" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
                <li><a href="" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
                <li><a href="" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
            </ul>
        </div>								
    </div>
</div>
@endforeach
	
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<!-- =========================== Related Products =================================== -->
			
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
                    <a onclick="window.location='{{url('/detail_shop/'.$product['product_id'])}}'" ><img src="/public_images/{{json_decode($product['product_image'])['0'] ?? 'noimage.jpg'}}" class="img-fluid" alt="" /></a>
                    
                </div>
                <div class="cart_selected_single_caption">
                    <h4 class="product_title">{{$product['product_name']}}</h4>
                    <span class="numberof_item">Prix unitaire: {{$product['product_price']}} FCFA</span>
                    <span class="numberof_item">Quantité: {{ $product['qty'] }} </span>
                    <span>Prix Total: {{ $product['product_price']*$product['qty'] }} FCFA</span>
                     <span class="numberof_item" > <a href="/delete_product_to_caddy/{{$product['product_id']}}" class="text-danger">Supprimer</a></span>
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
                        <li><a href="{{URL::to('/payment')}}" class="btn btn-checkout">Commandez</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    <!-- cart -->


			<!-- Left Collapse navigation -->
			<div class="w3-ch-sideBar-left w3-bar-block w3-card-2 w3-animate-right"  style="display:none;right:0;" id="leftMenu">
				<div class="rightMenu-scroll">
					<div class="flixel">
						<h4 class="cart_heading">Navigation</h4>
						<button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
					</div>
					
					<div class="right-ch-sideBar">
						
						<div class="side_navigation_collapse">
							<div class="d-navigation">
								<ul id="side-menu">
									<li class="dropdown">
										<a href="#">Category<span class="ti-angle-left"></span></a>
										<ul class="nav nav-second-level">
											<li><a href="#">Grocery</a></li>
											<li><a href="#">Organic</a></li>
											<li><a href="#">Electronics</a></li>
											<li><a href="#">Fashion</a></li>
											<li><a href="#">Education</a></li>
											<li><a href="#">Beauty</a></li>
											
											<li class="dropdown">
												<a href="#">Digital<span class="ti-angle-left"></span></a>
												<ul class="nav nav-second-level">
													<li><a href="#">Sub Product</a></li>
													<li><a href="#">Sub Product</a></li>
													<li><a href="#">Sub Product</a></li>
													<li><a href="#">Sub Product</a></li>
												</ul>
											</li>
										</ul>
									</li>
									
									<li class="dropdown">
										<a href="#">Brands<span class="ti-angle-left"></span></a>
										<ul class="nav nav-second-level">
											<li><a href="#">Nike</a></li>
											<li><a href="#">Apple</a></li>
											<li><a href="#">Hackerl</a></li>
											<li><a href="#">Tuffan</a></li>
											<li><a href="#">Orio</a></li>
											<li><a href="#">Kite</a></li>
										</ul>
									</li>
									
									<li class="dropdown">
										<a href="#">Products<span class="ti-angle-left"></span></a>
										<ul class="nav nav-second-level">
											<li><a href="#">3 Columns products</a></li>
											<li><a href="#">4 Columns products</a></li>
											<li><a href="#">5 Columns products</a></li>
											<li><a href="#">6 Columns products</a></li>
											<li><a href="#">7 Columns products</a></li>
											<li><a href="#">8 Columns products</a></li>
										</ul>
									</li>
									
									<li><a href="#">About Us</a></li>
									<li><a href="#">Blogs</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Buy Odex</a></li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
	

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