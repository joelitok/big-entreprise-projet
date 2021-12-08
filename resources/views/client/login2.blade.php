<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
        <title>SécurTrack login</title>
        <link href="{{asset('backend_shop/themify-icons.css')}}" rel="stylesheet">
		 
        <!-- Custom CSS -->
        <link href="backend_shop/assets/css/styles.css" rel="stylesheet">

		<link rel="stylesheet" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
		
    </head>
    <script> 
        function mypass(){
          var x = document.getElementById("password");
          if (x.type === "password") {
          x.type = "text";
          } else {
           x.type = "password";
          }
          }
    </script>
    
    <body class="grocery-theme light">
		@include('sweetalert::alert')
    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
    <div id="main-wrapper"><div class="header_nav">
					<div class="container">	
						<div class="row align-item-center">
							<div class="col-lg-3 col-md-4 col-sm-8 col-10">
								<!-- For Desktop -->
								<div class="shopby_categories d-none d-xl-block d-lg-block">
									<a class="shop_category" href="{{URL::to('/')}}"> Accueil</a>
									<div class="collapse" id="myCategories">
										<div id="cats_menu">
											<ul>
											    <li><a href="{{URL::to('/')}}"><span>Accueil</span></a></li>
											   <li><a href="{{URL::to('/contact')}}"><span>Contact</span></a></li>
                                               <li><a href="{{URL::to('/service')}}"><span>Services</span></a></li>
                                               <li><a href="{{URL::to('shop')}}"><span>Boutique</span></a></li>
                                               
											</ul>
										</div>
									</div>
								</div>
								
								<!-- For Mobile -->
								<div class="shopby_categories d-xl-none d-lg-none">
                                    <a class="shop_category" href="{{URL::to('/')}}" onclick="openLeftMenu()"><i class="ti-menu"></i>Acccueil</a>
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
						
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="text-center">
								<h2 class="breadcrumbs_title">Login</h2>
								<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
									<li class="breadcrumb-item"><a href="#">Mon Compte</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{URL::to('/signup2')}}">s'inscrire </a></li>
								  </ol>
								</nav>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- =========================== Breadcrumbs =================================== -->
			
			
			<!-- =========================== Login/Signup =================================== -->
			<section>
				<div class="container">
					
					<div class="row">
						
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="login_signup">
								<h3 class="login_sec_title">Connexion</h3>
                                @if(Session::has('status'))
                                <div class="alert alert-success">
                                  {{Session::get('status')}}
                                  {{Session::put('status',null)}}
                                </div>    
                            @endif
                            @if(count($errors)>0)
                                  <div class="alert alert-danger">
                                  <ul>
                            @foreach($errors->all() as $error)
                                   <li>{{$error}}</li>
                            @endforeach
                
                                    </ul> 
                                  </div>                      
                            @endif
                            @if(Session::has('statusd'))
                            <div class="alert alert-danger">
                              {{Session::get('statusd')}}
                              {{Session::put('statusd',null)}}
                            </div>    
                        @endif
                    <form action="{{url('/signin_account')}}" method="post">
								@csrf
									<div class="form-group">
										<label>Adresse email</label>
										<input  class="form-control" name="email" type="email" id="email" required>
									</div>
									
									<div class="form-group">
										<label>Mot de passe</label>
										<input type="password" class="form-control" name="password" id="password" required>
									</div>
									
									<div class="login_flex">
										<div class="login_flex_1">
											<input type="checkbox" onclick="mypass()" style="margin-top: 5px"> voir mots de passe <br/>
                                             <a href="{{URL::to('/signup2')}}" class="text-bold">s'inscrire</a>
										</div>
										<div class="login_flex_2">
											<div class="form-group mb-0">
												<button type="submit" class="btn btn-md btn-theme">Connecté</button>
											</div>
										</div>
									</div>
								
								</form>
							</div>
						</div>
						
                 <div class="col-lg-6 col-md-12 col-sm-12">
				    <div class="login_signup">
								<h3 class="login_sec_title">Votre securité... notre métier!</h3>
                                <p style="text-align:center"><img src="{{asset('frontend/images/logo.png')}}" alt="logo" height="300px" width="300px">
                                </p>
					</div>
				</div>
						
					</div>
				</div>
			</section>
			<!-- =========================== Login/Signup =================================== -->
            @include('include.footerShopClient')
		 </div>

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
	
<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

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
		
		<script>
			function openFilterSearch() {
				document.getElementById("filter_search").style.display = "block";
			}
			function closeFilterSearch() {
				document.getElementById("filter_search").style.display = "none";
			}
		</script>

		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>
</html>