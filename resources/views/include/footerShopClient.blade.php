<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer style-2">
    <div class="before-footer">
        <div class="container">
            <div class="row">
        
                <div class="col-lg-4 col-md-4">
                    <div class="single_facts">
                        <div class="facts_icon">
                            <i class="ti-shopping-cart"></i>
                        </div>
                        <div class="facts_caption">
                            <h4>Livraison gratuite à domicile</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <div class="single_facts">
                        <div class="facts_icon">
                            <i class="ti-money"></i>
                        </div>
                        <div class="facts_caption">
                            <h4>Garantie de remboursement</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <div class="single_facts last">
                        <div class="facts_icon">
                            <i class="ti ti-headphone"></i>
                        </div>
                        <div class="facts_caption">
                            <h4>Assistance en ligne 24x7</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-4 col-md-4">
                    <div class="footer_widget">
                        <h4 class="extream">Nous contacter</h4>
                        <p>Racontez-nous tout ! <a href="#" class="theme-cl">Touchez-le</a></p>
                        
                        <div class="address_infos">
                            <ul>
                                <li><i class="ti-home theme-cl"></i>Deido au lieu dit Cinéma l'Eden face Total 3 Morts<br>E-mail:contact@securtrack.net</li>
                                <li><i class="ti-headphone-alt theme-cl"></i>Tél:(+237) 233 400 243 / 693 347 312 </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                        
                <div class="col-lg-2 col-md-2">
                    <div class="footer_widget">
                        <h4 class="widget_title">Catégories</h4>
                        <ul class="footer-menu">
                            @isset($categories)
                            @foreach ($categories as $category)
                            <li><a href="/select_by_category/{{$category->category_name}}"> {{$category->category_name}}</a></li>
                            @endforeach
                            @endisset
                            
                          
                        </ul>
                    </div>
                </div>
                        
                <div class="col-lg-2 col-md-2">
                    <div class="footer_widget">
                        <h4 class="widget_title">Notre entreprise</h4>
                        <ul class="footer-menu">
                            <li><a href="{{URL::to('/about')}}">A propos</a></li>
                            <li><a href="#">Notre studio</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2">
                    <div class="footer_widget">
                        <h4 class="widget_title">Dernières nouvelles</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Offres et promotions</a></li>
                            <li><a href="#">Mon compte</a></li>
                            <li><a href="#">Mes produits</a></li>
                            <li><a href="#">Favoris</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2">
                    <div class="footer_widget">
                        <h4 class="widget_title">Support client</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Conditions</a></li>
                            <li><a href="#">Vie privée</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-6 col-md-8">
                    <p class="mb-0"> &copy;Copyright 2021 </p>
                </div>
                
                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer_social_links">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->
