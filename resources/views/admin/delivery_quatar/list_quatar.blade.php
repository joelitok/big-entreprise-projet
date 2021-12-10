@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <input type="hidden" value="{{ $inc = 1 }}">

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

                    <div class="row">
                        <h4 class="card-title col-10">Les Quartiers de livraison</h4>
                        <button class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#exampleModal">
                            Ajouter
                        </button>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nouveau Quartier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('/quatar_add_save') }}"
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
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Nom:</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" maxlength="25" type="text"
                                                            name="quatar_name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Description : </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" type="text" name="quatar_description"
                                                            required>
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
                                                        <label class="col-form-label">Zones :</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <select class="form-control" maxlength="25" type="text"
                                                            name="zone_id" required>

                                                            @foreach ($zones as $zone)
                                                                <option value="{{ $zone->id }}">
                                                                    {{ $zone->zone_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="submit" value="Envoyer" class="btn btn-success">
                                                    <button class="btn btn-danger" data-dismiss="modal"> Annuler</button>

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

                                            <th>Nom</th>
                                            <th>Zone</th>
                                            <th> Ville</th>
                                            <th>Temps</th>
                                            <th style="text-align:center">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($quatars)



                                            @forelse ($quatars as $quatar)
                                                <tr>

                                                    <td>{{ $inc }}</td>
                                                    <td>{{ $quatar->quatar_name }}</td>
                                                    <td>{{ $quatar->zone->zone_name }}</td>
                                                    <td>{{ $quatar->city->city_name }}</td>
                                                    <td>{{ $quatar->zone->max_time_delivery }}</td>
                                                    <td>
                                                        <a class="btn btn-outline-danger"
                                                            href="{{ url('/delete_quatar/' . $quatar->id) }}"
                                                            id="delete">Delete</a>
                                                    </td>
                                                </tr>

                                                <input type="hidden" value="{{ $inc = $inc + 1 }}">
                                            @empty
                                                <tr>
                                                    <td colspan="6" style="text-align: center"> Aucun quatier dans la liste
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('include.footerAdmin')
        <!-- partial -->
    </div>

@endsection
