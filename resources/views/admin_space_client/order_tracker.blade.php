@extends('layouts.layoutShopAdmin.appShopClient')
@section('contenu')


    <!-- =========================== My Order =================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-3">
                    <nav class="dashboard-nav mb-10 mb-md-0">
                        <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                            <a class="list-group-item list-group-item-action dropright-toggle {{ request()->is('my_order') ? 'active' : '' }}"
                                href="{{ URL::to('my_order') }}">
                                Mes commandes
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle {{ request()->is('history_order') ? 'active' : '' }}"
                                href="{{ URL::to('history_order') }}">
                                Historique
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle {{ request()->is('order_tracker') ? 'active' : '' }}"
                                href="{{ URL::to('order_tracker') }}">
                                Evolution
                            </a>
							<a class="list-group-item list-group-item-action dropright-toggle
								 {{ request()->is('order_facture') ? 'active' : '' }}"
                                href="{{ URL::to('order_facture') }}">
                                Mes Factures
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle {{ request()->is('client_profile') ? 'active' : '' }}"
                                href="{{ URL::to('client_profile') }}">
                                Parametres du compte
                            </a>
                            <a class="list-group-item list-group-item-action dropright-toggle {{ request()->is('logout') ? 'active' : '' }}"
                                href="{{ URL::to('logout') }}">
                                Logout
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-8 col-md-9 col-sm-12 col-12">
                    <div class="checked-shop">



                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul class="track_order_list mt-4">
                                    @isset($count_order_recieve)
                                        <li class="complete">
                                            <div class="trach_single_list">
                                                <div class="trach_icon_list"><i class="ti-write"></i></div>
                                                <div class="track_list_caption">
                                                    <h4 class="mb-0">{{ $count_order_recieve }} Commande(s) Envoyé(s)
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>
                                    @endisset


                                    @isset($count_order_confirm)
                                        <li class="processing">
                                            <div class="trach_single_list">
                                                <div class="trach_icon_list"><i class="ti-package"></i></div>
                                                <div class="track_list_caption">
                                                    <h4 class="mb-0">{{ $count_order_confirm }} Commande(s)
                                                        Confirmé(s)</h4>
                                                </div>
                                            </div>
                                        </li>
                                    @endisset
                                    @isset($count_order_rejet)
                                        <li>

                                            <div class="trach_single_list">
                                                <div class="trach_icon_list"><i class="ti-close" style="color: red"></i>
                                                </div>
                                                <div class="track_list_caption">
                                                    <h4 class="mb-0">{{ $count_order_rejet }} Commande(s) rejetté(s)
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>
                                    @endisset


                                    @isset($count_order_delivery)
                                        <li>
                                            <div class="trach_single_list">
                                                <div class="trach_icon_list"><i class="ti-gift"></i></div>
                                                <div class="track_list_caption">
                                                    <h4 class="mb-0">{{ $count_order_delivery }} Commande(s) livré(s)
                                                    </h4>
                                                </div>
                                            </div>
                                        </li>
                                    @endisset


                                </ul>
                            </div>
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

                    @isset($products_caddy)
                        @foreach ($products_caddy as $product)
                            <!-- Single Item -->
                            <div class="cart_selected_single">
                                <div class="cart_selected_single_thumb">
                                    <a onclick="window.location='{{ url('/detail_shop/' . $product['product_id']) }}'"><img
                                            src="/storage/product_images/{{ $product['product_image'] }}"
                                            class="img-fluid" alt="" /></a>
                                </div>
                                <div class="cart_selected_single_caption">
                                    <h4 class="product_title">{{ $product['product_name'] }}</h4>
                                    <span class="numberof_item">Prix unitaire: {{ $product['product_price'] }} FCFA</span>
                                    <span class="numberof_item">Quantité: {{ $product['qty'] }} </span>
                                    <span>Prix Total: {{ $product['product_price'] * $product['qty'] }} FCFA</span>
                                    <span class="numberof_item"> <a
                                            href="/delete_product_to_caddy/{{ $product['product_id'] }}"
                                            class="text-danger">Supprimer</a> </span>
                                    <span class="numberof_item"> <a href="/detail_shop/{{ $product['product_id'] }}"
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
                    <li><a href="{{ URL::to('/caddy') }}" class="btn btn-go-cart btn-theme">Voir le panier</a></li>
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