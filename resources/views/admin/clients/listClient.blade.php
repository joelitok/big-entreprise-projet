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
                        <h4 class="card-title col-10">Liste des utilisateurs</h4>
                        {{-- data-toggle="modal" data-target="#exampleModal" --}}
                        <a class="btn btn-outline-primary mb-4" href="{{ url('add_users') }}">
                            Ajouter
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">

                                    <thead>

                                        <tr>
                                            <th>Noms</th>
                                            <th>Identifiant</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th colspan="3" style="text-align:center">action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @if ($clients)
                                            @forelse ($clients as $client)
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('details/' . $client->id) }}">
                                                            {{ $client->firstname }} {{ $client->lastname }}</a>
                                                    </td>
                                                    <td>{{ $client->numero }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>
                                                        @if ($client->status == 1)
                                                            <label class="badge badge-success"> Activé</label>
                                                        @else
                                                            <label class="badge badge-danger"> Desactivé</label>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/delete_client_a/' . $client->id) }}"
                                                            id="delete">
                                                            <i class="ti-trash"></i></a>
                                                    </td>
                                                    <td>
                                                        @if ($client->status == 1)
                                                            <button class="btn btn-outline-warning"
                                                                onclick="window.location='{{ url('/desactiverclient_a/' . $client->id) }}'">
                                                                désactiver
                                                            </button>
                                                        @else
                                                            <button class="btn btn-outline-success"
                                                                onclick="window.location='{{ url('/activerclient_a/' . $client->id) }}'">
                                                                activer
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <input type="hidden" value="{{ $inc = $inc + 1 }}">
                                            @empty
                                                <tr>
                                                    <td colspan="5" style="text-align: center"> Aucun client ajouter à la
                                                        liste </td>
                                                </tr>
                                            @endforelse

                                        @endif

                                    </tbody>
                                </table>
                                {{ $clients->links('pagination.paginatelinks') }}
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
