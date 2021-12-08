@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-5 mb-4 mb-xl-0">
                            <h4 class="font-weight-bold">Salut, {{ \Illuminate\Support\Facades\Auth::user()->firstname }}
                            </h4>
                            <h4 class="font-weight-normal mb-0">SécurTrack</h4>
                        </div>
                        <div class="col-12 col-xl-7">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="border-right pr-4 mb-3 mb-xl-0">
                                    <p class="text-muted">Services</p>
                                    <h4 class="mb-0 font-weight-bold">
                                        @isset($count_service)
                                            {{ $count_service }}
                                        @endisset
                                    </h4>

                                </div>
                                <div class="border-right pr-4 mb-3 mb-xl-0">
                                    <p class="text-muted">Produits</p>
                                    <h4 class="mb-0 font-weight-bold">
                                        @isset($count_product)
                                            {{ $count_product }}
                                        @endisset</h4>
                                </div>
                                <div class="border-right pr-4 mb-3 mb-xl-0">
                                    <p class="text-muted">Commandes</p>
                                    <h4 class="mb-0 font-weight-bold">{{ $count_order }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Clients</p>
                            <div
                                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                    @isset($count_client)
                                        {{ $count_client }}
                                    @endisset</h4>
                                </h3>
                                <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-warning">2.00% <span class="text-body ml-1"><small>(30
                                        days)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left"> Livreurs</p>
                            <div
                                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                        @isset($count_delivery_man)
                                            {{ $count_delivery_man }}
                                        @endisset</h3>
                                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-danger">0.22% <span class="text-body ml-1"><small>(30
                                        days)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left"> Visiteurs</p>
                            <div
                                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                        @isset($count_visitors)
                                            {{ $count_visitors }}
                                        @endisset</h3>
                                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-danger">0.22% <span class="text-body ml-1"><small>(30
                                        days)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left"> Accueil</p>
                            <div
                                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                        @isset($count_visitors_home)
                                            {{ $count_visitors_home }} Visite(s)
                                        @endisset</h3>
                                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-danger">75% <span class="text-body ml-1"><small>(30
                                        days)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left"> Boutiques</p>
                            <div
                                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                        @isset($count_visitors)
                                            {{ $count_visitors }} Visite(s)
                                        @endisset</h3>
                                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-danger">0.22% <span class="text-body ml-1"><small>(30
                                        days)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Administrateurs</p>
                            <div
                                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                    @isset($count_admin)
                                        {{ $count_admin }}
                                    @endisset</h3>
                                <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-success">10.00%<span class="text-body ml-1"><small>(30
                                        days)</small></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">Gestionnaires</p>
                            <div
                                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                                    @isset($count_admin_shop)
                                        {{ $count_admin_shop }}
                                    @endisset</h3>
                                <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                            <p class="mb-0 mt-2 text-success">22.00%<span class="text-body ml-1"><small>(30
                                        days)</small></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card bg-primary border-0 position-relative">
                        <div class="card-body">
                            <p class="card-title text-white">Les derniers services</p>
                            <div id="performanceOverview"
                                class="carousel slide performance-overview-carousel position-static pt-2"
                                data-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item active">

                                        <div class="row">
                                            @foreach ($services as $service)
                                                <div class="col-md-4 item">
                                                    <div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
                                                        <div class="icon icon-a text-white mr-3">
                                                            <i class="ti-cup icon-lg ml-3"></i>
                                                        </div>
                                                        <div class="content text-white">
                                                            <div
                                                                class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                                                <h3 class="font-weight-light mr-2 mb-1">
                                                                    {{ $service->service_name }}</h3>
                                                                <h3 class="mb-0">
                                                                    {{ $service->created_at->format('d/m/Y') }}</h3>
                                                            </div>
                                                            <div
                                                                class="col-8 col-md-7 d-flex border-bottom border-info align-items-center justify-content-between px-0 pb-2 mb-3">
                                                                <img class="img-responsive"
                                                                    src="/service_images/{{ $service->service_image }}"
                                                                    alt="">
                                                            </div>
                                                            <p class="text-white font-weight-light pr-lg-2 pr-xl-5">
                                                                {{ \Illuminate\Support\Str::limit($service->service_description, 41, $end = '...') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#performanceOverview" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#performanceOverview" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
    @include('include.footerAdmin')
    </div>

@endsection
