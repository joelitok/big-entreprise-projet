@extends('layouts.layoutsClient.appClient')


@section('content')
    
<!--======= CONTENT START =========-->
<div class="content"> 

    <!--======= ABOUT =========-->
    <section class="about">
        <div class="container"> 
            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>A propos</h3>
                <h5> Votre securité... notre métier! </h5>
                <hr>
            </div>

            <!--======= ABOUT INFO =========-->
            <div class="about-us">
                <ul class="row">
                    <li class="col-sm-8">
                        <h5>CE QUE NOUS FAISONS</h5>
                        <p> Notre objectif numéro 1 est de retrouver votre véhicule dans les meilleurs délais. notre objectif sécondaire est d'aider à l'arrestation en flagrant délit des voleurs. Vous pouvez rouler en toute confiance, car nous serons présents pour vous proposer une solution concrète en cas de vol de votre véhicule </p>
                        <h5 class="margin-t-40">COMMENT ÇA MARCHE?</h5>
                        <p class="margin-t-20">1: Votre véhicule est volé <br>
                            <i class="fa fa-check-circle"></i> 
                             Vous constatez la disparition de votre véhicule ou vous recevez une alerte sur votre téléphone.
                 
                        </p>
                        <p class="margin-t-20"> 2: Vous contactez SECURTRACK <br>
                            <i class="fa fa-check-circle"></i>Appelez SECURTRACK dès que vous constatez le vol. le PC prend en charge votre demande, contacte les forces de l'ordre
                        et leur donne la possibilité de localiser votre véhicule.</p>
                        <p class="margin-t-20">  3: Votre véhicule est retrouvé <br><i class="fa fa-check-circle"></i> Grace à la localisation GPS et
                             la triangulation GSM par Cell-ID  de votre traqueur Antivol GPS,votre véhicule est localisé
                            et retrouvé dans les meilleurs délais. SECURTRACK vous restitue votre bien. </p>
                        {{-- <p class="margin-t-20"> <i class="fa fa-check-circle"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p> <i class="fa fa-check-circle"></i> Proin tempus sapien non iaculis pretium.</p>
                        <a href="#." class="btn">See All PAckages</a> <a href="#." class="btn btn-1">Our services</a> </li> --}}

                    <!--======= ABOUT IMAGES =========-->
                    <li class="col-sm-4">
                        <ul class="row about-img">
                            <li class="col-md-6"> <img class="img-responsive" src="{{asset('frontend/images/img-3.jpg')}}" alt="" > </li>
                            <li class="col-md-6"> <img class="img-responsive" src="{{asset('frontend/images/img-2.jpg')}}" alt="" > </li>
                            <li class="col-md-6"> <img class="img-responsive" src="{{asset('frontend/images/img-4.jpg')}}" alt="" > </li>
                            <li class="col-md-6"> <img class="img-responsive" src="{{asset('frontend/images/img-1.jpg')}}" alt="" > </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!--======= NEWS / FAQS =========-->
    <section class="news faqs-with-bg-2" data-stellar-background-ratio="0.5">
        <div class="container"> 

            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>Présentation des services</h3>
                <p> Toujours une longueur d'avance</p>
                <hr>
            </div>

            <!--======= ACCORDING 1=========-->
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Ressources humaines</a> </h4>
                    </div>

                    <!--======= ADD INFO HERE =========-->
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p style="color: black; font-weight: bold;"> Une équipe dynamique, hautement qualifiée et compétente dévouée à la tâche avec un objectif précis
                                : « conquérir le monde ». Nous sommes disponible pour tous vos travaux quel qu’en soit l’envergure, (chez
                                socutrack votre sécurité est notre metier, ce qui nous amené à toujours vous satisfaire.)</p>
                                
                             <h4> Matériels</h4>   
                              <p style="color: black; font-weight: bold;">Travaillant selon les normes internationales, nous sommes équipés des Technologies de nouvelle Génération pour
                                rester connecté en temps réel avec le monde de l’innovation au plaisir de nos clients toujours satisfaits</p> 
                        </div>
                    </div>
                </div>

                <!--======= ACCORDING 2 =========-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">Tracking / Géolocalisation </a> </h4>
                    </div>

                    <!--======= ADD INFO HERE =========-->
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p style="color: black; font-weight: bold;"> Nous mettons à votre disposition des accessoires H-Tech qui vous permettrons de suivre et de retrouver vos biens (automobile personnel, flotte de véhicule en entreprise, moto etc...) <br> où qu'ils se trouvent grâce à la technologie que nous vous
                                offrons. Elle est simple et facile à utiliser, nos clients sont toujours satisfaits car nous les encadrons dans tous leurs projets
                                de digitalisation</p>
                        </div>
                    </div>
                </div>

                <!--======= ACCORDING 3 =========-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed"> Vidéosurveillance</a> </h4>
                    </div>

                    <!--======= ADD INFO HERE =========-->
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p style="color: black; font-weight: bold;"> Nous vous installons un système de vidéosurveillance doté de technologies de dernière génération dont vous pouvez
                                l’administrer en local ou à distance selon votre choix, ceci pour assurer la sécurité de vos locaux (maison, commerce, entreprise) même pendant votre absence.</p>
                        </div>
                    </div>
                </div>

                <!--======= ACCORDING 4 =========-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour" class="collapsed"> Contrôle d’accès</a> </h4>
                    </div>

                    <!--======= ADD INFO HERE =========-->
                    <div id="collapsefour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p style="color: black; font-weight: bold;"> Fournissez-vous en gadgets de derniers cris en contrôle d’accès, pour sécuriser et filtrer l’accès à vos locaux. Les portes
                                de vos Bureaux, laboratoires, entrepôts etc... <br> peuvent être déverrouillés par des Lecteurs de badges, des codes de sécurité
                                sur clavier numérique ou tactile etc...</p>
                        </div>
                    </div>
                </div>

                <!--======= ACCORDING 5 =========-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive" class="collapsed"> Biométrie</a> </h4>
                    </div>

                    <!--======= ADD INFO HERE =========-->
                    <div id="collapsefive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p style="color: black; font-weight: bold;"> Nous vous installons des outils de relève d’empreintes digitale et de reconnaissance faciale, ceci vous permet de contrôler
                                avec parfaite exactitude les entrées et sorties de vos locaux. La sécurisation et surveillance des mouvements vers vos
                                Bureaux, laboratoires, entrepôts etc... <br> sont effectuées avec la plus haute précision</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= ASK QUESTION =========-->
            <div class="text-center">
                <h6>Vous avez encore des questions ? Commencez à nous la poser.</h6>
                <a href="{{URL::to('/contact')}}" class="btn">Poser une question</a> </div>
        </div>
    </section>


    <!--======= INTRESTED =========-->
    <section class="intrested intrested-2">
        <div class="container"> 
            @if(Session::has('status'))
            <div class="alert alert-success">
                 {{Session::get('status')}}
               <i class="fa fa-check"></i> 
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
            @endif

            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>Contactez Nous</h3>
                <p>  sécurTrack</p>
                <hr>
            </div>
            <div class="intres-lesson">
                <h3>Une équipe dynamique, hautement qualifié et compétente dévoué à la tâche avec un objectif précis <br>
                    : « conquérir le monde ». Nous sommes disponible pour tous vos travaux quel qu’en soit l’envergure, <br>
                    chez sécurTrack nous avons toujours une longueur d’avance, ce qui nous amené à toujours vous satisfaire.</h3>

                <!--======= FORM =========-->
                <form  method="post" action="{{url('/contact-us')}}">
                    @csrf
                    <ul class="row">

                        <!--======= INPUT NAME =========-->
                        <li class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                                <span class="fa fa-user"></span> </div>
                        </li>

                        <!--======= INPUT EMAIL =========-->
                        <li class="col-sm-3">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email" name="email" required>
                                <span class="fa fa-envelope"></span> </div>
                        </li>

                        <!--======= INPUT PHONE NUMBER =========-->
                        <li class="col-sm-3">
                                    <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Téléphone" name="phone" required>
                                    <span class="fa fa-phone"></span> </div>
                        </li>

                        <!--======= INPUT SELECT =========-->
                        <li class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="message" name="message" required>
                                <span class="fa fa-file-text-o"></span> </div>
                        </li>
                    </ul>
                    <!--======= BUTTON =========-->
                    <div class="text-center">
                        <button class="btn" type="submit" >ENVOYER</button>
                    </div>
                </form>


            </div>
        </div>
    </section>
    
@endsection