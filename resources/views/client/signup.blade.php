
<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/vendor.bundle.addons.css')}}">

{{-- script  pour verifier si deux mots de passe corresponde bien --}}

<script>
  function validate() {
var pass = document.reg.password.value;
var cpass = document.reg.confirm_password.value;
var message = document.getElementById('message');
if(pass=="") { 
       alert(" Le mots de passe ne dois pas un chaine vide"); 
      message.style.color = 'red';      
      message.innerHTML = 'Le mots de passe ne dois pas un chaine vide';
return false; 
} else if(pass != cpass){
      alert("Vos mots de passe ne corresponde pas"); 
      message.style.color = 'red';      
      message.innerHTML = '<div class="alert alert-danger">le mots de passe de confirmation est incorrect</div>';
return false; 
}



  }

  function mypass(){
  var x = document.getElementById("password");
  if (x.type === "password") {
  x.type = "text";
  } else {
   x.type = "password";
  }
  }
</script>
{{-- end script  pour verifier si deux mots de passe corresponde bien --}}









  {{--end script  pour verifier si deux mots de passe corresponde bien --}}
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="text-align: center">
                <img src="{{asset('frontend/images/logo.png')}}" alt="logo">
              </div>
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

              <span id='message'></span>
              <form class="pt-3" action="{{url('/add_account')}}" method="post" onsubmit="return validate()" name="reg">
              @csrf
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg"  placeholder="nom d'utilisateur" name="name" required style="color: black; font-size:17px">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg"  placeholder="email" name="email" required style="color: black; font-size:17px">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg"  placeholder="mot de passe" name="password" required  id="password" style="color: black; font-size:17px">
                      <label style="color: black;font-weight:bold"> Voir</label>  <input type="checkbox" onclick="mypass()" style="margin-top: 5px">
                      </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Confirmer le mot de passe" name="cpassword" required  id="confirm_password" style="color: black; font-size:17px">
                    </div>
                    <div class="mt-3">
                         <div class="row" style="text-align: center"> 
                             <input type="submit" value="Envoyer" class="btn btn-primary btn-lg font-weight-medium auth-form-btn" style="margin:5px"  id="form">
                             <a href="{{URL::to('/home')}}" class="btn btn-danger btn-lg font-weight-medium auth-form-btn" style="margin:5px; float: right;" >Annuler</a>
                        </div>
                        
                    </div>
                </fieldset>
                
            </form>

          {{--- code to comparer two password ---}}


          
          {{--- code to comparer two password ---}}



            <div style="margin-top: 5px; text-align:center"> <label> <a href="{{URL::to('/login')}}"> Connectez - vous </a> </label></div>
         
            </div>
            </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('script.js')}}"></script>
  <script src="{{asset('backend/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('backend/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('backend/js/template.js')}}"></script>
  <script src="{{asset('backend/js/settings.js')}}"></script>
  <script src="{{asset('backend/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>







