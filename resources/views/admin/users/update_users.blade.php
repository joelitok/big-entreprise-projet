@extends('layouts.layoutAdmin.appAdmin')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">


            <input type="hidden" value="{{ $inc = 1 }}">
            <div class="card">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                        {{ Session::put('message', null) }}
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="card-title col-10">Informations de <b> {{ $user->firstname }} {{ $user->lastname }}</b>
                    </h4>

                    <div class="m-4">
                        <div class="tab-content">
                            {{-- formulaire de créationd des users --}}
                            <div class="tab-pane fade show active" id="home">
                                <form method="post" action="{{ route('adminUpdateUser', $user->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">


                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="nom">Nom:</label>
                                                    <input class="form-control" value="{{ $user->firstname }}"
                                                        type="text" id="nom" required="required" name="nom" required>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="prenom">Prénom:</label>
                                                    <input class="form-control" value="{{ $user->lastname }}"
                                                        type="text" id="prenom" name="prenom" required>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="phone">Numéro de téléphone:</label>
                                                    <input class="form-control" value="{{ $user->phone }}" type="tel"
                                                        id="phone" name="phone" required>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="email">Email:</label>
                                                    <input class="form-control" value="{{ $user->email }}" type="email"
                                                        id="email" name="email" required>
                                                </div>

                                                <div class="form-group col-6 row mt-4">
                                                    <label for="sexe" class="col-4">Sexe:</label>
                                                    <div class="col">
                                                        Masculin <input type="radio" id="sexe" name="sexe" required
                                                            value="{{ old('is_active', $user->sexe) }}"
                                                            {{ $user->sexe == 'Masculin' ? 'checked' : '' }}>
                                                        Féminin <input type="radio" id="sexe" name="sexe" required
                                                            value="{{ old('is_active', $user->sexe) }}">
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <button type="submit" value="Enregistrer"
                                                    class="btn btn-success">Enregistrer
                                                </button>

                                                <a value="Annuler" href="{{ url('/users') }}"
                                                    class="btn btn-danger ml-4">Annuler</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>


            </div>

        </div>


        @include('include.footerAdmin')
        <!-- partial -->
    </div>

@endsection
