@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align: center">
                                Service {{ $service->service_name }}</h4>

                            <div class="m-4">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="nav-item">
                                        <a href="#home" class="nav-link active" data-toggle="tab">Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" class="nav-link" data-toggle="tab">Infos devis</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home">
                                    <form method="post" action="{{ url('/service_update_save_action') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <input type="hidden" value="{{ $service->id }}" name="id">
                                            <div class="col-lg-3">
                                                <label class="col-form-label">Nom : </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" maxlength="25" type="text" name="service_name"
                                                    value="{{ $service->service_name }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                <label class="col-form-label">Description:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" type="text" name="service_description"
                                                    value="{{ $service->service_description }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                <label class="col-form-label">Image</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <input class="form-control" name="service_image" type="file"
                                                    value="{{ $service->service_image }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                            </div>
                                            <div class="col-lg-8">
                                                <input type="submit" value="Envoyer" class="btn btn-success">
                                                <a href="{{ URL::to('/admin') }}" class="btn btn-danger"> Annuler</a>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile">

                                    <div class="row">
                                        <h4 class="card-title col-10">Liste des champs</h4>
                                        <button class="btn btn-outline-primary mb-4 right" data-toggle="modal"
                                            data-target="#openModalDevis">
                                            Ajouter
                                        </button>
                                    </div>

                                    <table id="order-listing table-responsive" class="table col-12">
                                        <thead>
                                            <tr>
                                                <th>Champs</th>
                                                <th>Type</th>
                                                <th>Valeur</th>
                                                <th colspan="3" style="text-align:center">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($service->devis)
                                                @foreach ($service->devis as $devi)
                                                    <tr>
                                                        <td>{{ $devi->champ_name }}</td>
                                                        <td>{{ $devi->champ_type }}</td>
                                                        <td>{{ $devi->valeur }}</td>
                                                        <td class="text-center" title="Supprimer"><i
                                                                class="ti-trash"></i></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>


                                    <div class="modal fade" id="openModalDevis" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un champ</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ url('/save_champ_devis_service/' . $service->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <h4 class="card-title col-10">Nouveau champs</h4>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label">Nom du champ
                                                                        : </label>
                                                                    <input class="form-control" type="text"
                                                                        name="champ_name" required>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-form-label">Type de champ
                                                                        : </label>
                                                                    <select class="form-control" onchange="create_item()"
                                                                        name="champ_type" id="type" required>
                                                                        <option value=" ">Choisissez un type</option>
                                                                        <option value="text">Zone de test</option>
                                                                        <option value="checkbox">Case à cocher
                                                                            multiple
                                                                        </option>
                                                                        <option value="radio">Case à cocher unique
                                                                        </option>
                                                                        <option value="select">Liste</option>
                                                                    </select>

                                                                </div>

                                                                <div id="champ_val" style="display: none"
                                                                    class="form-group row">
                                                                    <label class="col-form-label">Valeur du champ
                                                                        : </label>
                                                                    <input class="form-control" type="text"
                                                                        placeholder="Séparez les valeurs par de ';'"
                                                                        name="champ_val">
                                                                </div>
                                                                <div class="row col-lg-8">
                                                                    <input type="submit" value="Envoyer"
                                                                        class="btn btn-success">
                                                                    <button class="btn btn-danger ml-2"
                                                                        data-dismiss="modal"> Annuler
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

                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('include.footerAdmin')
        <!-- partial -->
    </div>
    <script>
        function create_item() {
            let select = document.getElementById("type");
            if (select.value == "select" || select.value == "checkbox" || select.value == "radio") {
                document.getElementById('champ_val').style.display = 'block';
            } else {
                document.getElementById('champ_val').style.display = 'none';
            }
        }
    </script>

@endsection
