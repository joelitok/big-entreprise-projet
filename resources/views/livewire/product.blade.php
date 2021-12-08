@extends('layouts.layoutShopAdmin.appShopClient')

@section('contenu')                    
 <div class="clearfix"> 

 </div>
 @livewire('shop-full-v')
 <!-- ============================ Footer End ================================== -->

 @endsection


 			
			<!-- cart -->
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
				<div class="rightMenu-scroll">
					<h4 class="cart_heading">Mon panier</h4>
					<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
					<div class="right-ch-sideBar" id="side-scroll">
						
						<div class="cart_select_items">
					
						@if(Session::has('cart'))
						
						
							
						
						@foreach (Session::get('cart')->items as $product)
						<!-- Single Item -->
					<div class="cart_selected_single">
						<div class="cart_selected_single_thumb">
							<a onclick="window.location='{{url('/detail_shop/'.$product['product_id'])}}'">

							<img src="/public_images/{{json_decode($product['product_image'])['0']}}" class="img-fluid" alt="" /></a>
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
				     	@endforeach	
					
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
								<li><a href="{{URL::to('/payment')}}" class="btn btn-checkout">passez a la caisse</a></li>
							</ul>
						</div>
						
					</div>
				</div>
</div>
<!-- cart -->			

</div> 




 {{-- <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>  --}}
 <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 {!! Toastr::message() !!} 

        
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
<livewire:scripts />
 
	</body>
</html>

