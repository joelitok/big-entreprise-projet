<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tableau de bord </title>

    <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('frontend/images/logo.png')}}"/>
    <link rel="stylesheet" href="{{asset('backend/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @notifyCss
    @livewireStyles
</head>
<x:notify-messages/>
<body>
@include('sweetalert::alert')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            {{--navbar-brand brand-logo --}}
            <a class="mr-5" href="">
                <img src="{{asset('backend/images/2h_.png')}}" class="mr-2 mb-2 " alt="logo" height="60px"
                     width="75px"/></a>
            @if(Session::has('admin_type'))
                <b>Administrateur</b>
            @endif
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-layout-grid2"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{asset('backend/images/logo_2H_tech.png')}}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{URL::to('/logout')}}">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="ti-layout-grid2"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('admin')}}">
                        <i class="ti-home menu-icon"></i>
                        <span class="menu-title">Administrateur</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                       aria-controls="form-elements">
                        <i class="ti-clipboard menu-icon"></i>
                        <span class="menu-title">Tableau de Bord</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            @if( in_array('liste service', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item" disabled="disabled"><a class="nav-link"
                                                                            href="{{URL::to('/service_list')}}">Gestion
                                        des services </a></li>
                            @endif

                            @if( in_array('liste slider', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/slider_list')}}">Gestion des
                                        sliders</a></li>
                            @endif

                            @if( in_array('liste client', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/client_list')}}">Gestion des
                                        clients</a></li>
                            @endif 


                            @if( in_array('liste users', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/users')}}">Gestion des
                                        utilisateurs</a></li>
                            @endif

                            @if( in_array('liste categories', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/list_category')}}">Gestion
                                        des catégories</a></li>
                            @endif

                            @if( in_array('liste article', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/list_product_a')}}">Gestion
                                        des
                                        articles</a></li>
                            @endif

                            @if( in_array('liste produit', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/product_attach_list')}}">Gestion
                                        des produits</a></li>
                            @endif

                            @if( in_array('liste zone', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/list_zone')}}">Gestion des
                                        zones</a></li>
                            @endif

                            @if( in_array('liste villes', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/list_city')}}">Gestion des
                                        villes</a></li>
                            @endif

                            @if( in_array('liste quatiers', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a href="{{URL::to('/list_quatar')}}" class="nav-link"> Gestion des
                                        quatiers</a></li>
                            @endif

                            @if( in_array('liste commandes', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/list_order_a')}}">Gestion des
                                        commandes</a></li>
                            @endif
                            @if( in_array('cout supplementaire', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/cout_sup')}}">Coûts supplémentaire
                                </a></li>
                            @endif
                            @if( in_array('newsletters', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                                <li class="nav-item"><a class="nav-link" href="{{URL::to('/list_newsletter')}}">Gestions des NewsLetters
                                </a></li>
                            @endif
                            @if( in_array('visites', \Illuminate\Support\Facades\Session::get('user_ressources')) )
                            <li class="nav-item"><a class="nav-link" href="{{URL::to('/list_visitor')}}">Visiteurs
                            </a></li>
                            @endif

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#table" aria-expanded="false"
                       aria-controls="table">
                        <i class="ti-settings menu-icon"></i>
                        <span class="menu-title">Profiles</span>
                        <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" id="table">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="{{URL::to('/admin_profile')}}">Mes
                                    paramètres</a></li>
                        </ul>
                    </div>

                </li>
            </ul>
        </nav>

    @yield('content')



    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@livewireScripts
<!-- plugins:js -->
<script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('backend/js/off-canvas.js')}}"></script>
<script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/settings.js')}}"></script>
<script src="{{asset('backend/js/todolist.js')}}"></script>
<script src="{{asset('backend/js/bootbox.min.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('backend/js/dashboard.js')}}"></script>
<!-- End custom js for this page-->


<script>
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Voulez-vous vraiment supprimer cet element ?", function (confirmed) {
            if (confirmed) {
                window.location.href = link;

            }
            ;
        });
    });
</script>


 {{-- <script>
    $(document).ready(()=>{
        $("#newsForm").on("submit",(e)=>{
            e.preventDefault();
            var spinner ='<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
    console.log("Login button clicked and spinner added");
    $('#submitBtn').html(spinner);
    var formData =new FormData(document.getElementById("newsForm"));
    $.ajax({
        url:"/newslet_add_save",
        type:"POST",
       data:formData,
       processData:false,
      contentType:false
    }).done((response)=>{
        console.log(response);
    });     
        
        })
    })
</script>  --}}


<script>
    $(document).on("click", "#delivery", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Tranférer la commande chez le livreur ?", function (confirmed) {
            if (confirmed) {
                window.location.href = link;
            }
            ;
        });
    });
</script>


@notifyJs

<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

</body>

</html>

