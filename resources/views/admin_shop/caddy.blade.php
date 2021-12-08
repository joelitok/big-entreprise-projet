@extends('layouts.layoutShopAdmin.appShopClient')
@section('contenu')
<script>
function mypass(){
var x =document.getElementById('button');

 if (x.disabled) {
   x.disabled=false;
   console.log('sam marche')
  } else {
	x.disabled=true;
 }

 }




</script>

	<!-- =========================== Breadcrumbs =================================== -->
    <div class="breadcrumbs_wrap gray">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-center">
                        <h2 class="breadcrumbs_title">Ajouter au panier</h2>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">boutique</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ajouter au panier</li>
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
					<div class="row">
						
						<div class="col-lg-8 col-md-12 col-sm-12 col-12">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Produit</th>
											<th scope="col">Prix</th>
											<th scope="col">Quantité</th>
											<th scope="col">Total</th>
										</tr>
									</thead>
									<tbody>
										@isset($products_caddy)
										@forelse ($products_caddy as $product)
                                        <tr>
                                            <td>
                                                <div class="tbl_cart_product">
                                                <div class="tbl_cart_product_thumb">
                                                    <img onclick="window.location='{{url('/detail_shop/'.$product['product_id'])}}'" src="/public_images/{{json_decode($product['product_image'])['0'] ?? 'noimage.jpg'}}" class="img-fluid" alt="" />
                                                </div>
                                                <div class="tbl_cart_product_caption">
                                                    <h5 class="tbl_pr_title">{{$product['product_name']}}</h5>
                                                    <span class="tbl_pr_quality theme-cl"><i class="ti ti-check"></i></span>
                                                </div>
                                            </div>
                                        </td>
                        <td>
							<h4 class="tbl_org_price">{{$product['product_price']}}</h4>
						</td>
						
                        <td>  <h4 class="tbl_org_price">{{$product['qty']}}</h4></td>
						<td>
									<div class="tbl_pr_action">
                                                <h5 class="tbl_total_price">{{$product['product_price']*$product['qty']}}</h5>
												<a onclick="window.location='{{url('/detail_shop/'.$product['product_id'])}}'"><i class="ti-pencil"></i></a>&nbsp;
                                                <a href="/delete_product_to_caddy/{{$product['product_id']}}" class="tbl_remove"><i class="ti-close"></i></a>
                                            </div>
                                        </td>
                                        </tr>   
                                        @empty
                                        <H2> Aucun produit dans le panier</H2>  
                                    @endforelse
										@endisset
                                    
									</tbody>
								</table>
							</div>
							
							<!-- Coupon Box -->
							<div class="row align-items-end
							 justify-content-between mb-10 mb-md-0">
								
								{{-- <div class="col-12 col-md-auto m-full">
								<!-- Button -->
								<button class="btn btn-outline-dark">Modifier le panier</button>
								</div> --}}
							</div>
							<!-- Coupon Box -->
							
						</div>
						
						<div class="col-lg-4 col-md-12 col-sm-12 col-12">
							<div class="cart_detail_box mb-4">
								<div class="card-body">
									<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
										<li class="list-group-item d-flex">
											<h5 class="mb-0">Résume de commande</h5>
										</li>
										<li class="list-group-item d-flex">
											<span>Sous-total</span> <span class="ml-auto font-size-sm">{{Session::has('cart') ? Session::get('cart')->totalPrice:0}} FCFA</span>
										</li>
										<li class="list-group-item d-flex">
											<span>Tax</span> <span class="ml-auto font-size-sm">00.00 FCFA</span>
										</li>
						
										<li class="list-group-item d-flex font-size-lg font-weight-bold">
											<span>Total</span> <span class="ml-auto font-size-sm">{{Session::has('cart') ? Session::get('cart')->totalPrice:0}} FCFA</span>
										</li>
									</ul>
								</div>
							</div>
							 <a class="btn btn-block btn-dark mb-2" href="{{URL::to('/payment')}}">Terminer la commande</a>
							<a class="px-0 text-body" href="{{URL::to('/shop-full-v')}}"><i class="ti-back-left mr-2"></i> Continuer les achats</a>
						</div>
						
						
					</div>
				</div>





				
	{{-- <div class="container">
	<div class="row">
@isset($products_caddy)
<div class="card style-2 mb-4">
	<div class="card-header">
	<h4 class="mb-0">Notice de la commande</h4>
	</div>
	<div class="card-body">
	<ul class="item-groups">
						
							<!-- Single Items -->
							<li>
								<div class="row align-items-center">
									<div class="col">
										<!-- Title -->
										    <p class="mb-2 font-size-sm font-weight-bold">
										    Votre commande comporte <b style="color: red; font-size:17px"> {{Session::has('cart') ? Session::get('cart')->totalQty:0}} produit(s)</b>
											ce qui vous coutera <b style="color: red; font-size:17px">  500 Fcfa</b> de frais de livraison 
											
											@if(Session::get('coutSup'))
											 plus cout supplémentaire.	
											@endif
										 </p>
									 <!-- Text -->
										
										
										
										
	
									</div>
								</div>
							</li>
							
							
						</ul>
					</div>
				</div>	
@endisset
</div>
</div>	 --}}
</section>















			<!-- =========================== Add To Cart =================================== -->

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
							<a onclick="window.location='{{url('/detail_shop/'.$product['product_id'])}}'" ><img src="/public_images/{{json_decode($product['product_image'])['0'] ?? 'noimage.jpg'}}" class="img-fluid" alt="" /></a>
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
								<li><a href="{{URL::to('/payment')}}" class="btn btn-checkout">Passez a la caisse</a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<!-- cart -->


		</div>

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

 {{-- <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>  --}}
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
	</body>
</html>