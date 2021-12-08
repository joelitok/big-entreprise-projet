@extends('layouts.layoutsClient.appClient');

@section('content')
   <!--======= BANNER =========-->
  {{-- <div class="sub-banner">
    <div class="container">
        <h2>Page non trouvée</h2>
        <ul class="links">
            <li><a href="#.">Home</a>/</li>
            <li><a href="#.">Page non trouvée</a></li>
        </ul>
    </div>
</div> --}}

<!--======= CONTENT START =========-->
<div class="content"> 
    
    <div class="missing-2">
        <div class="container">
            <div class="text">
                <div class="cont">
                    <h3> OOPS!</h3>
                    <br>
                    <span>4<span class="change">0</span>4</span>
                    <h3>Page non trouvée</h3>
                    <h5>LA PAGE QUE VOUS RECHERCHEZ EST MANQUANTE</h5>
                    <a class="btn" href="{{URL::to('/')}}">RETOUR</a> </div>
            </div>
        </div>
    </div>
@endsection



  