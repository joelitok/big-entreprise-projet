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

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="card-title col-10">Gestion des utilisateurs</h4>

                    <div class="m-4">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a href="#home" class="nav-link active" data-toggle="tab">Utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" class="nav-link" data-toggle="tab">Role</a>
                            </li>
                            <li class="nav-item">
                                <a href="#messages" class="nav-link" data-toggle="tab">Ressources</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            {{-- formulaire de créationd des users --}}
                            <div class="tab-pane fade show active" id="home">
                                <h4 class="mt-2">Ajouter un nouvel utilisateur</h4>

                                <form method="post" action="{{ url('/store_user') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('message') }}
                                                {{ Session::put('message', null) }}
                                            </div>
                                        @endif

                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="nom">Nom:</label>
                                                    <input class="form-control" type="text" id="nom" required="required"
                                                        name="nom" required>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="prenom">Prénom:</label>
                                                    <input class="form-control" type="text" id="prenom" name="prenom"
                                                        required>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="phone">Numéro de téléphone:</label>
                                                    <input class="form-control" type="tel" id="phone" name="phone"
                                                        required>
                                                </div>

                                                <div class="form-group col-6">
                                                    <label for="email">Email:</label>
                                                    <input class="form-control" type="email" id="email" name="email"
                                                        required>
                                                </div>

                                                <div class="form-group col-6 row mt-4">
                                                    <label for="sexe" class="col-4">Sexe:</label>
                                                    <div class="col">
                                                        Masculin <input value="Masculin" type="radio" id="sexe" name="sexe"
                                                            required>
                                                        Féminin <input value="Féminin" type="radio" id="sexe" name="sexe"
                                                            required>
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


                            {{-- page d'ajout des role --}}
                            <div class="tab-pane fade" id="profile">

                                <div class="row">
                                    <h4 class="card-title col-10">Liste des rôles</h4>
                                    <button class="btn btn-outline-primary mb-4" data-toggle="modal"
                                        data-target="#openModalRole">
                                        Ajouter
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Description</th>
                                                <th colspan="3" style="text-align:center">action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($roles)
                                                @foreach ($roles as $role)
                                                    <tr>
                                                        <td>{{ $role->name }}</td>
                                                        <td>{{ $role->description }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ url('/delete_client_a/' . $role->id) }}"
                                                                title="supprimer" id="delete"> <i
                                                                    class="ti-trash"></i></a>

                                                            <a href="{{ route('addRessource', $role->id) }}"
                                                                title="Ajouter une ressource"> <i
                                                                    class="ti-plus ml-2"></i></a>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>


                            {{-- page d'ajout des ressources --}}
                            <div class="tab-pane fade" id="messages">
                                <div class="row">
                                    <h4 class="card-title col-10">Liste des ressources</h4>
                                    <button class="btn btn-outline-primary mb-4" data-toggle="modal"
                                        data-target="#openModalRessource">
                                        Ajouter
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th colspan="3" style="text-align:center">action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($ressources)
                                                @foreach ($ressources as $res)
                                                    <tr>
                                                        <td>{{ $res->name }}</td>
                                                        <td class="text-center">
                                                            <a href="{{ url('/delete_client_a/' . $res->id) }}"
                                                                id="delete">
                                                                <i class="ti-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="openModalRole" tabindex="-1" aria-labelledby="exampleModalLabels"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabels">Nouveau Role</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/store_role') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card">
                                                @if (Session::has('status'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('status') }}
                                                        {{ Session::put('status', null) }}
                                                    </div>
                                                @endif

                                                @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="col-lg-3">
                                                            <label class="col-form-label">Nom:</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input class="form-control" maxlength="25" type="text"
                                                                name="name" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="desc">Description:</label>
                                                        <textarea id="desc" name="description" class="form-control"
                                                            rows="5" cols="5">

                                                                </textarea>


                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input type="submit" value="Envoyer" class="btn btn-success">
                                                        <button class="btn btn-danger" data-dismiss="modal">
                                                            Annuler
                                                        </button>

                                                    </div>
                                                </div>

                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="openModalRessource" tabindex="-1"
                            aria-labelledby="exampleModalLabels" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabels">Nouveau Role</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/store_ressource') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card">
                                                @if (Session::has('status'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('status') }}
                                                        {{ Session::put('status', null) }}
                                                    </div>
                                                @endif

                                                @if (count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="col-lg-3">
                                                            <label class="col-form-label">Nom:</label>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <input class="form-control" maxlength="25" type="text"
                                                                name="ressource_name" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input type="submit" value="Envoyer" class="btn btn-success">
                                                        <button class="btn btn-danger" data-dismiss="modal">
                                                            Annuler
                                                        </button>

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


            </div>

        </div>


        @include('include.footerAdmin')
        <!-- partial -->
    </div>

@endsection
