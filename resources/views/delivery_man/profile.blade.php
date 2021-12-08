@extends('layouts.layoutDelivery.appDelivery')
@section('content')

<!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="border-bottom text-center pb-4">
                    <img src="backend/images/profile.png" alt="profile" class="img-lg rounded-circle mb-3"/>
                    <div class="mb-3">
                      <h3>
                        @isset($delivery_man_profiles) 
                        {{strtoupper($delivery_man_profiles->lastname)}}
                           {{$delivery_man_profiles->firstname}}
                        @endisset
                      </h3> 
                        </div>
                    <p class="w-75 mx-auto mb-3">
                      L’équipe entière bénéficie de votre travail acharné et grâce à vous, 
                      nous avançons plus rapidement dans notre mission à long terme et dépassons les objectifs. 
                      Nous vous remercions ! </p>
                    <div class="d-flex justify-content-center">
                      @isset($delivery_man_profiles)
                      Profiles crée le :
                      {{$delivery_man_profiles->created_at->format('d /m/ Y')}}
                        @endisset
                     
                    </div>
                  </div>
                  <div class="border-bottom py-4">
                    <div class="d-flex mb-3">
                      <div class="progress progress-md flex-grow">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="progress progress-md flex-grow">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="py-4">
                    <p class="clearfix">
                      <span class="float-left">
                        Status
                      </span>
                      <span class="float-right text-muted">
                        @isset($delivery_man_profiles)
                        @if($delivery_man_profiles->status===1)
                        Active
                        @else 
                         Désactiver
                        @endif
                       @endisset

                       
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Téléphone
                      </span>
                      <span class="float-right text-muted">
                        @isset($delivery_man_profiles)
                        {{$delivery_man_profiles->phone}}
                          @endisset
         
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Mail
                      </span>
                      <span class="float-right text-muted">
                        @isset($delivery_man_profiles)
                        {{$delivery_man_profiles->email}}
                          @endisset
         
                        
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Facebook
                      </span>
                      <span class="float-right text-muted">
                        <a href="#">@nodefine</a>
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Twitter
                      </span>
                      <span class="float-right text-muted">
                        <a href="#">@nodefine</a>
                      </span>
                    </p>
                  </div>
              </div>
                <div class="col-lg-8">
                  <div class="mt-4 py-2 border-top border-bottom">
                    <ul class="nav profile-navbar">
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="ti-user"></i>
                          Livreur
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#">
                          <i class="ti-receipt"></i>
                          Alimentation
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="ti-calendar"></i>
                          Agenda
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="ti-clip"></i>
                          Resume
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="profile-feed">
                  Les Nouveaux produires
                  @isset($products)
                       @foreach ($products as $product)
                       <div class="d-flex align-items-start profile-feed-item">
                         <div style="margin: 10px 10px 10px 10px">
                          <img src="/storage/product_images/{{$product->product_image}}" class="img-fluid" alt="" />
                         </div>
                       <div class="ms-4">
                          
                          <h6>
                           {{$product->product_name}}
                             
                          </h6>
                          <p>
                            {{\Illuminate\Support\Str::limit($product->product_description, 35, $end='...')}}
                          </p>
                             <p class="small text-muted mt-2 mb-0">
                            <span>
                              <i class="ti-star me-1"></i>{{$product->product_price}}
                            </span>
                            <span class="ms-2">
                              <i class="ti-share"></i>
                            </span>
                          </p>
                        </div><br/> 
                        <small class="ms-4 text-muted">
                          
                          <i class="ti-time me-1"></i> &nbsp; {{$product->created_at->format('d/m/Y')}}
                        </small>
                      </div>
                      
                       @endforeach
                  @endisset
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
      @include('include.footerAdmin')
      <!-- partial -->
    </div>
  
  
  
  
  
  
  


  @endsection