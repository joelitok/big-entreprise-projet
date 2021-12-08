@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card-body">
                <div class="row">
                    <h4 class="card-title col-10">Paramètre Coûts supplémentaire</h4>
                </div>
                <div class="m-4">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a href="#home" class="nav-link active" data-toggle="tab">Coût Sup</a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" class="nav-link" data-toggle="tab">Gramage</a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages" class="nav-link" data-toggle="tab">Encombrement</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="home">
                            <div class="row">
                                <h4 class="card-title col-10">Coûts Supplémentaires</h4>
                                <button class="btn btn-outline-primary mb-4" data-toggle="modal"
                                    data-target="#openModalSupplement">
                                    Ajouter
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>

                                            <th>Supplément/zone</th>
                                            <th>Supplément/Grammage</th>
                                            <th>Supplément/Encombrement</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($parametres)
                                            @foreach ($parametres as $param)
                                                <tr>
                                                    <td class="text-center">{{ $param->suplement_zone }}</td>
                                                    <td class="text-center">{{ $param->suplement_gramage }}</td>
                                                    <td class="text-center">{{ $param->suplement_encombrement }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile">
                            <div class="row">
                                <h4 class="card-title col-10">Parametrage par grammage</h4>
                                <button class="btn btn-outline-primary mb-4" data-toggle="modal"
                                    data-target="#openModalGramage">
                                    Ajouter
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>Grammage</th>
                                            <th>Montant</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($all)
                                            @foreach ($all as $param)
                                                <tr>
                                                    <td class="text-center">{{ $param->gramage }}</td>
                                                    <td class="text-center">{{ $param->valeur_gramage }}</td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>


                        </div>

                        <div class="tab-pane fade" id="messages">
                            <div class="row">
                                <h4 class="card-title col-10">Parametrage par niveau d'encombrement</h4>
                                <button class="btn btn-outline-primary mb-4" data-toggle="modal"
                                    data-target="#openModalEncombrement">
                                    Ajouter
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>Catégorie Encombrement</th>
                                            <th>Niveau</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($encombrements)
                                            @foreach ($encombrements as $param)
                                                <tr>
                                                    <td class="text-center">{{ $param->categorie_encombrement }}</td>
                                                    <td class="text-center">{{ $param->niveau }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="openModalSupplement" tabindex="-1" aria-labelledby="exampleModalLabels"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabels">Nouveau paramètre</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('store_param') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label class="col-form-label">Supplément par zone:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="number" name="sup_zone"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label class="col-form-label">Supplément par gramage:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="number" name="sup_grame"
                                                    required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label class="col-form-label">Supplément par niveau
                                                    d'encombrement:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="number" name="sup_niveau"
                                                    required>
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
            <div class="modal fade" id="openModalGramage" tabindex="-1" aria-labelledby="exampleModalLabels"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabels">Nouveau paramètre</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('store_grammage') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label class="col-form-label">Grammage:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="number" name="grame"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label class="col-form-label">Montant:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="number" name="montant"
                                                    required>
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
            <div class="modal fade" id="openModalEncombrement" tabindex="-1" aria-labelledby="exampleModalLabels"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabels">Nouveau paramètre</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('store_niveau') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label class="col-form-label">Catégorie:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="number" name="cat"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label class="col-form-label">Niveau:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="number" name="niveau"
                                                    required>
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('include.footerAdmin')
        <!-- partial -->
    </div>
@endsection
