@extends('layouts.layoutAdmin.appAdmin')
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
                                        <div class="mb-3">
                                            <h3>
                                                @isset($user)
                                                    {{ $user->lastname }}
                                                    {{ $user->firstname }}
                                                @endisset
                                            </h3>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            @isset($user)
                                                Profil crée le :
                                                {{ $user->created_at->format('d /m/ Y') }}
                                            @endisset

                                        </div>
                                    </div>
                                    <div class="border-bottom py-4">
                                        <div class="d-flex mb-3">
                                            <div class="progress progress-md flex-grow">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55"
                                                    style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="progress progress-md flex-grow">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75"
                                                    style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-4">
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Status
                                            </span>
                                            <span class="float-right text-muted">
                                                @isset($user)
                                                    @if ($user->status === 1)
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
                                                @isset($user)
                                                    {{ $user->phone }}
                                                @endisset

                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Mail
                                            </span>
                                            <span class="float-right text-muted">
                                                @isset($user)
                                                    {{ $user->email }}
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
                                        <h1>Modifiez vos informations personnels</h1>
                                    </div>
                                    <form method="post" action="{{ route('adminUpdateUser', $user->id) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="nom">Nom:</label>
                                                <input class="form-control" type="text" value="{{ $user->firstname }}"
                                                    id="nom" required="required" name="nom" required>
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="prenom">Prénom:</label>
                                                <input class="form-control" type="text" id="prenom"
                                                    value="{{ $user->lastname }}" name="prenom" required>
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="phone">Numéro de téléphone:</label>
                                                <input class="form-control" type="tel" id="phone"
                                                    value="{{ $user->phone }}" name="phone" required>
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="email">Email:</label>
                                                <input class="form-control" type="email" id="email" name="email"
                                                    value="{{ $user->email }}" required>
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="email">Mot de passe:</label>
                                                <input class="form-control" type="password" id="password" name="password"
                                                    required>
                                            </div>

                                            <div class="form-group col-12 row mt-4">
                                                <label for="sexe" class="col-4">Sexe:</label>
                                                <div class="col">
                                                    Masculin <input value="Masculin" type="radio" id="sexe" name="sexe"
                                                        required>
                                                    Féminin <input value="Féminin" type="radio" id="sexe" name="sexe"
                                                        required>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <button type="submit" value="Enregistrer" class="btn btn-success">Modifier
                                            </button>

                                        </div>
                                    </form>

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
