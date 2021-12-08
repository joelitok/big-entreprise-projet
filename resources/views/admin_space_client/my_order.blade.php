@extends('layouts.layoutShopAdmin.appShopClient')
@section('contenu')


    <!-- =========================== My Order =================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-3">
                    <nav class="dashboard-nav mb-10 mb-md-0">
                        <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                            <a class="list-group-item list-group-item-action dropright-toggle 
								{{ request()->is('my_order') ? 'active' : '' }}"
                                href="{{ URL::to('my_order') }}">
                                Mes commandes
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle 
								{{ request()->is('history_order') ? 'active' : '' }}"
                                href="{{ URL::to('history_order') }}">
                                Historique
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle
								 {{ request()->is('order_tracker') ? 'active' : '' }}"
                                href="{{ URL::to('order_tracker') }}">
                                Evolution
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle
								 {{ request()->is('order_facture') ? 'active' : '' }}"
                                href="{{ URL::to('order_facture') }}">
                                Mes Factures
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle 
								{{ request()->is('client_profile') ? 'active' : '' }}"
                                href="{{ URL::to('client_profile') }}">
                                Parametres du compte
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle 
								{{ request()->is('logout') ? 'active' : '' }}"
                                href="{{ URL::to('logout') }}">
                                Logout
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-8 col-md-9">
                    <!-- Order Items -->
                    <div class="card style-2 mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">
                                @if ($count_orders)
                                    {{ $count_orders }} Déja effectué dans le système
                                @else
                                    Vous n'avez effectué aucun commande
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">

							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Icon</th>
											<th scope="col">Num commande</th>
											<th scope="col">Date</th>
											<th scope="col">Téléphone</th>
											<th scope="col">Status</th>
											<th scope="col" colspan="2">Action</th>

										</tr>
									</thead>
									<tbody>

                                        @isset($orders)
                                            
                                       
                                            
                                        
										@foreach ($orders as $order)
										<tr>
											<th scope="row">
												<div class="tbl_cart_product">
													<div class="tbl_cart_product_thumb m-0">
														<img src="/public_images/user.png" class="img-fluid">
													</div>
												</div>
											</th>
											<td>{{$order->numero}}</td>
											<td>{{$order->updated_at->format('d/m/Y')}}</td>
											<td>{{$order->anothernumber}}</td>

											<td>{{$order->order_status}}
											</td>
											
											<td>
												<a  class="btn-sm  btn-outline-primary" data-toggle="modal" data-target="#exampleModalLong{{$order->id}}"><i class="ti ti-eye"> </i> </a></td>
												<td> <a href="{{URL::to('/order_tracker')}}" class="btn btn-sm btn-theme" title="évolution de commande"> 
													<i class="ti ti-arrow-right"> </i></a></td>
												 
												
											

										




										
											<!-- Modal -->
								               
									     <!-- Modal -->
                                         <div class="modal fade" id="exampleModalLong{{ $order->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            @foreach ($client as $clt)
                                                                @if ($clt->id == $order->client_id)
                                                                    {{ $clt->firstname }} &nbsp;
                                                                    {{ $clt->phone }}
                                                                @endif
                                                            @endforeach
                                                        </h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach ($order->contents as $caddy)
                                                            <?php $order->total += $caddy->total_price; ?>
                                                            <p>
                                                                <img src="/public_images/{{ json_decode($caddy->product->product_image)['0']}}"
                                                                    height="100px" width="80px">
                                                                &nbsp; Prix :
                                                                <strong> {{ $caddy->product->product_price }}
                                                                    FCFA
                                                                    ;
                                                                </strong> &nbsp; Nom :
                                                                <strong> {{ $caddy->product->product_name }}
                                                                    &nbsp; Q: {{ $caddy->quantite }}</strong>
                                                            </p>
                                                        @endforeach

                                                        <p style="text-align: right">Quantité &nbsp; :
                                                            <strong> {{ $order->contents->count()}} </strong>
                                                        </p>
                                                        <p style="text-align: right">Prix Total &nbsp; :
                                                            <strong> {{ $order->total }} FCFA </strong>
                                                        </p>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Fermé
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </tr>

                                @endforeach
                            @endif

                        </tbody>
                    </table>
								{{$orders->links('vendor.pagination.default')}}
							</div>





















                            {{ $orders->links('vendor.pagination.default') }}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- =========================== My Order =================================== -->



@endsection


<!-- ============================ Footer End ================================== -->

<!-- cart -->
<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
    <div class="rightMenu-scroll">
        <h4 class="cart_heading">Mon panier</h4>
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"><i
                class="ti-close"></i></button>
        <div class="right-ch-sideBar" id="side-scroll">

            <div class="cart_select_items">

                @if (Session::has('cart'))
                    @foreach (Session::get('cart')->items as $product)
                        <!-- Single Item -->
                        <div class="cart_selected_single">
                            <div class="cart_selected_single_thumb">
                                <a onclick="window.location='{{ url('/detail_shop/' . $product['product_id']) }}'">
                                    <img src="/storage/facture_images/image{{$order->id}}.png"/>
                                    <img src="/public_images/{{ json_decode($product['product_image'])['0'] }}"
                                        class="img-fluid" alt="" /></a>
                            </div>
                            <div class="cart_selected_single_caption">
                                <h4 class="product_title">{{ $product['product_name'] }}</h4>
                                <span class="numberof_item">Prix unitaire: {{ $product['product_price'] }} FCFA</span>
                                <span class="numberof_item">Quantité: {{ $product['qty'] }} </span>
                                <span>Prix Total: {{ $product['product_price'] * $product['qty'] }} FCFA</span>
                                <span class="numberof_item"> <a
                                        href="/delete_product_to_order/{{ $product['product_id'] }}"
                                        class="text-danger">Supprimer</a> </span>
                                <span class="numberof_item"> <a href="/detail_shop/{{ $product['product_id'] }}"
                                        class="text-primary">Detail</a></span>
                            </div>
                        </div>
                    @endforeach

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
                    <li><a href="{{ URL::to('/order') }}" class="btn btn-go-cart btn-theme">Voir le panier</a></li>
                    <li><a href="{{ URL::to('payment') }}" class="btn btn-checkout">Passez a la caisse</a></li>
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



{{-- utiliser pour affichier les Toarstr Controller --}}

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

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
