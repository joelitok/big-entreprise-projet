@extends('layouts.layoutShopAdmin.appShopClient')
@section('contenu')
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ======================== Offer Banner Start ==================== -->
			<section class="offer-banner-wrap gray pt-4">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel banner-offers owl-theme">


                                @foreach ($products as $product)
                                  <!-- Single Item -->
								<div class="item">
									<div class="offer_item">
										<div class="offer_item_thumb">
											<div class="offer-overlay"></div>
											<img src="/storage/product_images/{{$product->product_image}}" alt="">
										</div>
										<div class="offer_caption">
											<div class="offer_bottom_caption">
												<p>{{$product->product_name}}</p>
												<div class="offer_title">{{\Illuminate\Support\Str::limit($product->product_description, 20, $end='...')}}</div>
												<span>{{$product->product_price}} FCFA</span>
                                                
											</div>
											<a  onclick="window.location='{{url('/detail_shop/'.$product->id)}}'"
												 class="btn offer_box_btn"> 
												<b style="color: white">voir plus  </b> </a>
										</div>
									</div>
								</div>

                                @endforeach


							</div>
						</div>
					</div>
				</div>
				<div class="ht-25"></div>
			</section>

			<div class="clearfix"></div>
			<!-- ======================== Offer Banner End ==================== -->













			
			<!-- ======================== Choose Category Start ==================== -->
			<section class="pt-0 overlio pb-5">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="owl-carousel category-slider owl-theme">
							@forelse ($categories as $category)
							<!-- Single Item -->
							<div class="item">
								<div class="woo_category_box border_style rounded">
									<div class="woo_cat_thumb">
										<a href="/select_by_category/{{$category->category_name}}">
										<img src="{{asset('backend_shop/assets/img/c-1.png')}}" class="img-fluid" alt="" /></a>
									</div>
									<div class="woo_cat_caption">
										<h4><a href="/select_by_category/{{$category->category_name}}"> {{$category->category_name}}</a></h4>
									</div>
								</div>
							</div>	
							@empty
								Aucun catégories trouvé actuellement 
							@endforelse
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ======================== Choose Category End ==================== -->




			
			<!-- ======================== Fresh Vegetables Start ==================== -->
			<section class="pt-0 pb-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="owl-carousel products-slider owl-theme">
							
@foreach($products as $product)

	 <!-- Single Item -->
	 <div class="item">
        <div class="woo_product_grid">
            <span class="woo_pr_tag hot">tchop</span>
            <div class="woo_product_thumb">
                <img src="/storage/product_images/{{$product->product_image}}" class="img-fluid" alt="" />
            </div>
            <div class="woo_product_caption center">
                <div class="woo_title">
                    <h4 class="woo_pro_title"><a href="">{{$product->product_name}}</a></h4>
                </div>
                <div class="woo_price">
                    <h6>{{$product->product_price}} FCFA
						{{-- <span class="less_price">100000 FCFA</span> --}}
					
					</h6>
                </div>
            </div>
            <div class="woo_product_cart hover">
                <ul>
                    {{-- <li><a href="javascript:void(0);" data-toggle="modal" data-target="#viewproduct-over" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>--}}
					 <li> <a onclick="window.location='{{url('/detail_shop/'.$product->id)}}'" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
                   
                    <li><a href="/add_to_caddy/{{$product->id}}" class="woo_cart_btn btn_view"> <i class="ti-shopping-cart"></i></a></li> 
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
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="sec-heading-flex pl-2 pr-2">
						<div class="sec-heading-flex-one">
							<h2>   </h2>
						</div>
						<div class="sec-heading-flex-last">
							<a href="{{URL::to('/shop-full-v')}}" class="btn btn-theme">Voir plus<i class="ti-arrow-right ml-2"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- ======================== Fresh Vegetables End ==================== -->
			





			
			<!-- ======================== Fresh & Fast Fruits End ==================== -->
			
		
			




	
@endsection


			<!-- ============================ Footer End ================================== -->
			
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
							<a onclick="window.location='{{url('/detail_shop/'.$product['product_id'])}}'" ><img src="/storage/product_images/{{$product['product_image']}}" class="img-fluid" alt="" /></a>
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

{{-- composer require yoeunes/notify 
notify_render pied
notify_js  pied
notify_css entete
notify()-sucess("supprimer du panier ") --}}
						</div>
						
						 <div class="cart_subtotal">
							<h6>Total<span class="theme-cl">
								{{Session::has('cart') ? Session::get('cart')->totalPrice:0  }} FCFA	
							 </span></h6>
						</div>
						 
						<div class="cart_action">
							<ul>
								<li><a href="{{URL::to('/caddy')}}" class="btn btn-go-cart btn-theme">Voir le panier</a></li>
								<li><a href="{{URL::to('/payment')}}" class="btn btn-checkout">passez la commande</a></li>
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
			<!-- Left Collapse navigation -->
			







			{{-- <!-- Product View -->
			<div class="modal fade" id="viewproduct-over" tabindex="-1" role="dialog" aria-labelledby="add-payment" aria-hidden="true" data-target="#myModal">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content" id="view-product">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<div class="row align-items-center">
					
						<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="sp-wrap">
									<img src="{{asset('backend_shop/assets/img/detail/detail-6.png')}}" class="img-fluid rounded" alt="">
								</div>
							</div>
							
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="woo_pr_detail">
									
									<div class="woo_cats_wrps">
										<a href="#" class="woo_pr_cats">Casual Shirt</a>
										<span class="woo_pr_trending">Trending</span>
									</div>
									<h2 class="woo_pr_title">Fresh Green Pineapple</h2>
									
									<div class="woo_pr_reviews">
										<div class="woo_pr_rating">
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star filled"></i>
											<i class="fa fa-star"></i>
											<span class="woo_ave_rat">4.8</span>
										</div>
										<div class="woo_pr_total_reviews">
											<a href="#">(124 Reviews)</a>
										</div>
									</div>
									
									<div class="woo_pr_price">
										<div class="woo_pr_offer_price">
											<h3>$149<sup>.00</sup><span class="org_price">$199<sup>.99</sup></span></h3>
										</div>
									</div>
									
									<div class="woo_pr_short_desc">
										<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores voluptatem quia voluptas sit aspernatur.</p>
									</div>
									
									<div class="woo_pr_color flex_inline_center mb-3">
										<div class="woo_pr_varient">
											<h6>Size:</h6>
										</div>
										<div class="woo_colors_list pl-3">
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioOne" value="5" data-toggle="form-caption" data-target="#sizeCaption">
												<label class="custom-control-label" for="sizeRadioOne">SM</label>
											</div>
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioTwo" value="6" data-toggle="form-caption" data-target="#sizeCaption">
												<label class="custom-control-label" for="sizeRadioTwo">M</label>
											</div>
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioThree" value="6.6" data-toggle="form-caption" data-target="#sizeCaption">
												<label class="custom-control-label" for="sizeRadioThree">L</label>
											</div>
											<div class="custom-varient custom-size">
												<input type="radio" class="custom-control-input" name="sizeRadio" id="sizeRadioFour" value="7" data-toggle="form-caption" data-target="#sizeCaption" checked>
												<label class="custom-control-label" for="sizeRadioFour">XL</label>
											</div>
										</div>
									</div>
									
									<div class="woo_pr_color flex_inline_center mb-3">
										<div class="woo_pr_varient">
											<h6>Color:</h6>
										</div>
										<div class="woo_colors_list pl-3">
											<div class="custom-varient custom-color red">
												<input type="radio" class="custom-control-input" name="colorRadio" id="red" value="5" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="red">5</label>
											</div>
											<div class="custom-varient custom-color green">
												<input type="radio" class="custom-control-input" name="colorRadio" id="green" value="6" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="green">6</label>
											</div>
											<div class="custom-varient custom-color purple">
												<input type="radio" class="custom-control-input" name="colorRadio" id="purple" value="6.6" data-toggle="form-caption" data-target="#colorCaption" checked>
												<label class="custom-control-label" for="purple">6.5</label>
											</div>
											<div class="custom-varient custom-color yellow">
												<input type="radio" class="custom-control-input" name="colorRadio" id="yellow" value="7" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="yellow">7</label>
											</div>
											<div class="custom-varient custom-color blue">
												<input type="radio" class="custom-control-input" name="colorRadio" id="blue" value="6" data-toggle="form-caption" data-target="#colorCaption">
												<label class="custom-control-label" for="blue">7.5</label>
											</div>
										</div>
									</div>
									
									<div class="woo_btn_action">
										<div class="col-12 col-lg-auto">
											<input type="number" class="form-control mb-2 full-width" value="1" />
										</div>
									</div>
									
									<div class="woo_btn_action">
										<div class="col-12 col-lg-auto">
											<button type="submit" class="btn btn-block btn-dark mb-2">Add to Cart <i class="ti-shopping-cart-full ml-2"></i></button>
										</div>
										<div class="col-12 col-lg-auto">
											<button class="btn btn-gray btn-block mb-2" data-toggle="button">Wishlist <i class="ti-heart ml-2"></i></button>
										</div>
									</div>
									
								</div>
							</div>
							
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal --> --}}




		</div>





               
{{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal"
daclass="fas fa-eye text-success  fa-lg"></i>
</a>ta-attr="" title="show">
<i  --}}



        




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
		
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		
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

		{{-- <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
		<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
		{!! Toastr::message() !!}

	</body>
</html>