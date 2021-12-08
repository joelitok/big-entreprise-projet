@extends('layouts.layoutShopAdmin.appShopClient');
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


                               

							</div>
						</div>
					</div>
				</div>
				<div class="ht-25"></div>
			</section>



            	<!-- =========================== Search Products =================================== -->
			<section class="gray">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
                            <!-- row -->
							<div class="row">

								
								@forelse ($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6">
									<div class="woo_product_grid">
										<span class="woo_pr_tag hot">{{$product->product_name}}</span>
										<div class="woo_product_thumb">
											<img src="/storage/product_images/{{$product->product_image}}" class="img-fluid" alt="" />
										</div>
										<div class="woo_product_caption center">
											<div class="woo_title">
												<h4 class="woo_pro_title"><div class="offer_title">{{\Illuminate\Support\Str::limit($product->product_description, 20, $end='...')}}</div></h4>
											</div>
											<div class="woo_price">
												<h6>{{$product->product_price}} FCFA</h6>
											</div>
										</div>
										<div class="woo_product_cart hover">
											<ul>
												<li><a onclick="window.location='{{url('/detail_shop/'.$product->id)}}'" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
												<li><a href="/add_to_caddy/{{$product->id}}" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
												<li><a href="" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
											</ul>
										</div>								
									</div>
								</div>   
								@empty
	                               <h2 style="text-align: center"> Aucun Résultat trouvé</h2>
								@endforelse


	


							</div>
							<!-- row -->
							
							<div class="row">
								<div class="col-lg-12">
									<nav aria-label="Page navigation example">
									  <ul class="pagination">
										{{$products->links('pagination.paginatelinks')}}
									  </ul>
									</nav>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</section>

			<div class="clearfix"></div>
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

						</div>
						
						 <div class="cart_subtotal">
							<h6>Total<span class="theme-cl">
								{{Session::has('cart') ? Session::get('cart')->totalPrice:0  }} FCFA	
							 </span></h6>
						</div>
						 
						<div class="cart_action">
							<ul>
								<li><a href="{{URL::to('/caddy')}}" class="btn btn-go-cart btn-theme">Voir le panier</a></li>
								<li><a href="{{URL::to('payment')}}" class="btn btn-checkout">Passez a la caisse</a></li>
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

	</body>
</html>