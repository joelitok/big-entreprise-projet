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
                        <a href="{{ URL::to('/add_users') }}" class="btn btn-outline-primary mb-4">
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
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Roles</th>
                                            <th>Status</th>
                                            <th colspan="3" style="text-align:center">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($users)



                                            @forelse  ($users as $client)
                                                <tr>

                                                    <td>{{ $client->firstname }} {{ $client->lastname }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    {{-- <td>{{$client->created_at->format('d/m/Y   H:i:s')}}</td> --}}
                                                    <td>
                                                        {{ $client->phone }}
                                                    </td>
                                                    <td>
                                                        @foreach ($client->roles as $role)
                                                            <span class="badge badge-pill badge-dark">{{ $role->name }}
                                                            </span>
                                                        @endforeach
                                                        <a href="{{ route('addRole', $client->id) }}"
                                                            class="ti-plus"></a>
                                                    </td>
                                                    <td>
                                                        @if ($client->status == 1)
                                                            Activer
                                                        @else
                                                            Désactiver
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ url('/delete_user_a/' . $client->id) }}"
                                                            class="btn btn-sm btn-outline-danger" id="delete">Supprimer</a>

                                                        @if ($client->status == 1)
                                                            <button class="btn btn-sm btn-outline-warning"
                                                                onclick="window.location='{{ url('/desactiveruser_a/' . $client->id) }}'">
                                                                désactiver
                                                            </button>
                                                        @else
                                                            <button class="btn btn-sm btn-outline-success"
                                                                onclick="window.location='{{ url('/activeruser_a/' . $client->id) }}'">
                                                                activer
                                                            </button>
                                                        @endif

                                                        <a href="{{ route('adminEditUser', $client->id) }}"
                                                            class="btn btn-sm btn-outline-secondary">Modifier</a>

                                                    </td>
                                                </tr>
                                                <input type="hidden" value="{{ $inc = $inc + 1 }}">
                                            @empty
                                                <tr>
                                                    <td colspan="8" style="text-align: center"> Aucun utilisateurs trouvé
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endif


                                    </tbody>

                                </table>
                                {{ $users->links('pagination.paginatelinks') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        @include('include.footerAdmin')
        <!-- partial -->
    </div>

    <style>
        a:hover {
            text-decoration: none;
        }

    </style>
@endsection
