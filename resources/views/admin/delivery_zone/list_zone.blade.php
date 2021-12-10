@extends('layouts.layoutAdmin.appAdmin')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <input type="hidden" value="{{ $inc = 1 }}">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title col-10">Les zones de livraison</h4>
                        <button class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#exampleModal">
                            Ajouter
                        </button>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle zone</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('/zone_add_save') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Numéro de la zone:</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" maxlength="25" type="text"
                                                            name="zone_name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Villes :</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" maxlength="25" type="text"
                                                            name="city_id" required>

                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->id }}">{{ $city->city_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Durée maximun de livraison</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="col-lg-8">
                                                            <input class="form-control" maxlength="25" type="text"
                                                                name="max_time_delivery" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Cout de livraison : </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" maxlength="25" type="number"
                                                            name="cost_delivery" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="default" class="label-inverse">Zone par défaut
                                                        : </label>
                                                    <input class="form-check-danger" id="default" type="checkbox"
                                                        name="default">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="submit" value="Envoyer" class="btn btn-success">
                                                    <button class="btn btn-danger" data-dismiss="modal"> Annuler
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>Ordre #</th>
                                            <th>Zone</th>
                                            <th>Delai de livraison</th>
                                            <th>Prix</th>
                                            <th style="text-align:center">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($zones)




                                            @forelse ($zones as $zone)
                                                <tr>
                                                    <td>{{ $inc }}</td>
                                                    <td>{{ $zone->zone_name }}
                                                        @if ($zone->defaut)
                                                            <span class="badge badge-pill badge-dark">default </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center"> {{ $zone->max_time_delivery }}</td>
                                                    <td>{{ $zone->cost_delivery }} FCFA</td>
                                                    <td>
                                                        <a class="btn btn-outline-danger"
                                                            href="{{ url('/delete_zone/' . $zone->id) }}"
                                                            id="delete">Delete</a>
                                                    </td>
                                                </tr>
                                                <input type="hidden" value="{{ $inc = $inc + 1 }}">
                                            @empty
                                                <tr>
                                                    <td colspan="5" style="text-align:center"> Aucun Zone dans la liste
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper end -->
        <!-- partial:../../partials/_footer.html -->
        @include('include.footerAdmin')
        <!-- partial -->
    </div>

@endsection
