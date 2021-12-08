@extends('layouts.layoutsClient.appClient');
@section('content')
    

    <!--======= CONTENT START =========-->
    <div class="content"> 

        <!--======= CONTACT =========-->
        <section class="contact"> 

            <!--======= MAP =========-->
            {{-- <div id="map"></div> --}}

            <div class="container"> 

                <!--======= CONTACT INFORMATION =========-->
                <div class="contact-info">
                    <div class="row"> 

                        <!--======= CONTACT FORM =========-->
                        <div class="col-sm-6">
                            <h3>CONTACTEZ-NOUS</h3>
                            <p class="margin-b-40">Bonjour, nous sommes ici pour vous fournir les meilleures offres grâce à nos services au meilleur prix.</p>
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
                            </div>                      
                            @endif
                            <form role="form" id="contact_form" method="post" action="{{url('/contact-us')}}">
                                @csrf
                                <ul class="row">
                                    <li class="col-md-6">
                                        <input type="text" 
                                               name="name" id="name" placeholder="Nom"
                                               data-toggle="tooltip" title="nom"
                                               required>
                                             </li>
                                    <li class="col-md-6">
                                        <input type="text" class="form-control"
                                               name="email" id="email" placeholder="Email"
                                               data-toggle="tooltip" title="email" required>
                                    </li>
                                   
                                    <li class="col-md-6">
                                        <input type="text" class="form-control"
                                               name="phone" id="phone" placeholder="Téléphone" required>
                                    </li>
                                    
                                    <li class="col-md-6">
                                        <input type="text" class="form-control"
                                               name="subject" id="subject" placeholder="sujet" required>
                                    </li>
                                      
                                    <li class="col-md-12">
                                                <textarea class="form-control"
                                                  name="message" id="message" rows="5" placeholder="Message"
                                                  data-toggle="tooltip" title="Message " required>
                                                 </textarea>
                   
                                    </li>
                                    <li>
                                        <button type="submit" value="submit" class="btn" id="btn_submit">ENVOYER</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <!--======= CONTACT =========-->
                        <div class="col-sm-6">
                            <h3>Contact</h3>
                            <p class="margin-b-40">Merci de nous faire confiance pour nos meilleurs offres</p>
                            <ul class="con-det">

                                <!--======= ADDRESS =========-->
                                <li> 
                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                    <h6>Adresse</h6>
                                    <p> CAMEROUN </p>
                                    <p> 1360 Blvd. de la réunification </p>
                                    <p> Deido au lieu dit Cinéma l’Eden face Total 3 Morts</p>
                                    <p>Tél:+(237) 652 53 67 27 / 693 48 03 23 / 693 34 73 12 / 233 40 02 43 </p>
                                    <p>E-mail: info.cmr@gtafric.cm / info.gtafric@gmail.com,<br>
                                         </p>
                                </li>
                                
                              

                                <!--======= EMAIL =========-->
                                <li> 
                                    {{-- <i class="fa fa-envelope"></i> --}}
                                    <h6>Adresse</h6>
                                    <p>RCA</p>
                                    <p> Av. de France sica1 - BP: 563 Bangui</p>
                                    <p>Tél: +(236) 75 89 73 44 / 72 03 63 60</p>
                                    <p> E-mail: Info.rca@gtafric.cm</p>
                                    <p> gtafric@yahoo.fr</p> 
                                </li>
                            </ul>

                            <!--======= SOCIAL ICON =========-->
                            <ul class="social_icons">
                                <li class="facebook"> <a href="#."><i class="fa fa-facebook"></i> </a></li>
                                <li class="twitter"> <a href="#."><i class="fa fa-twitter"></i> </a></li>
                                <li class="linkedin"> <a href="#."><i class="fa fa-linkedin"></i> </a></li>
                                <li class="googleplus"> <a href="#."><i class="fa fa-google-plus"></i> </a></li>
                                <li class="dribbble"> <a href="#."><i class="fa fa-dribbble"></i> </a></li>
                                <li class="skype"> <a href="#."><i class="fa fa-skype"></i> </a></li>
                                <li class="behance"> <a href="#."><i class="fa fa-behance"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection