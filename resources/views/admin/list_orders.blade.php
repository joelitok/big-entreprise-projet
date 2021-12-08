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
                    <h4 class="card-title">Gestion des commandes</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">

                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Client</th>
                                            <th>Ville</th>
                                            <th>Quartier</th>
                                            <th>Etat</th>

                                            <th colspan="3" style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($orders)
                                            @forelse  ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->numero }}</td>
                                                    <td>{{ $order->client->firstname }} {{ $order->client->lastname }}
                                                    </td>
                                                    <td>{{ $order->city_id }}</td>
                                                    <td>{{ $order->quatar_id }}</td>
                                                    <td>{{ $order->order_status }}</td>
                                                    <td><i class="ti-eye" data-toggle="modal" title="message"
                                                            data-target="#exampleModalLong{{ $order->id }}"> </i></td>
                                                    <td>
                                                        <a
                                                            onclick="window.location='{{ url('/voir_pdf/' . $order->id . '/' . $order->client_id) }}'">
                                                            <i class="ti-download"> </i></a>
                                                    </td>
                                                    <td>
                                                        @if (in_array('Valider commandes', \Illuminate\Support\Facades\Session::get('user_ressources')))
                                                            @if ($order->order_status == \App\enums\RoleEnums::ENATTENTE)
                                                                <button class="btn btn-sm btn-outline-primary" type="submit"
                                                                    onclick="recupValue({{ $order->id }},1)"
                                                                    data-toggle="modal" data-target="#exampleModal"> Valider
                                                                </button>
                                                            @endif
                                                        @endif


                                                        @if (in_array('Preparer commande', \Illuminate\Support\Facades\Session::get('user_ressources')))
                                                            @if ($order->order_status == \App\enums\RoleEnums::VALIDER)
                                                                <button class="btn btn-sm btn-outline-primary" type="submit"
                                                                    onclick="recupValue({{ $order->id }},2)"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    Preparer
                                                                </button>
                                                            @endif
                                                        @endif


                                                        @if (in_array('Livrer commande', \Illuminate\Support\Facades\Session::get('user_ressources')))
                                                            <a href="{{ url('add_image_bill/' . $order->id) }}"
                                                                title="Ajouter une photo"><i class="ti-camera"></i>
                                                            </a>
                                                            @if ($order->order_status == \App\enums\RoleEnums::ENCOURS)
                                                                <button class="btn btn-sm btn-outline-primary" type="submit"
                                                                    onclick="recupValue({{ $order->id }},3)"
                                                                    data-toggle="modal" data-target="#exampleModal"> Livrer
                                                                </button>
                                                            @endif
                                                        @endif

                                                    </td>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalLong{{ $order->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        @foreach ($client as $clt)
                                                                            @if ($clt->id == $order->client_id)
                                                                                {{ $clt->firstname }} &nbsp;
                                                                                {{ $clt->phone }}
                                                                            @endif
                                                                        @endforeach
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @foreach ($order->contents as $caddy)
                                                                        <?php $order->total += $caddy->total_price; ?>
                                                                        <p>
                                                                            <img src="/public_images/{{ json_decode($caddy->product->product_image)['0'] }}"
                                                                                height="100px" width="80px">
                                                                            &nbsp; Prix :
                                                                            <strong> {{ $caddy->product->product_price }}
                                                                                FCFA
                                                                                ;
                                                                            </strong> &nbsp; Nom :
                                                                            <strong> {{ $caddy->product->product_name }}
                                                                                &nbsp; Q: {{ $caddy->quantite }}</strong>
                                                                        </p>
                                                                    @endforeach

                                                                    <p style="text-align: right">Quantité &nbsp; :
                                                                        <strong> {{ $order->contents->count() }}
                                                                        </strong>
                                                                    </p>
                                                                    <p style="text-align: right">Prix Total &nbsp; :
                                                                        <strong> {{ $order->total }} FCFA </strong>
                                                                    </p>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Fermé
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" style="text-align: center"> Aucun commande fait </td>
                                                </tr>
                                            @endforelse
                                        @endif

                                    </tbody>
                                </table>
                                {{ $orders->links('pagination.paginatelinks') }}
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Validation</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/change_statut') }}" method="POST">
                                                @csrf
                                                <h1 class="text-center"> Vous allez changer le statut de la
                                                    commande</h1>
                                                <br />
                                                <p class="text-center">
                                                    Voulez-vous continuer ?
                                                </p>
                                                <input type="hidden" name="idCommande" value="order_id" id="order_id" />
                                                <input type="hidden" name="statut" value="statut_value" id="statut_value" />
                                                <br /> <br />
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Annuler
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Continuer</button>
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('include.footerAdmin')
        <!-- partial -->
    </div>

    <script>
        function setOrderId(id, statut) {
            inputs = document.getElementById("order_id");
            statuts = document.getElementById("statut");
            inputs.innerText = id;
            statuts.innerText = statut;
        }

        function recupValue(id, statut) {
            inputs = document.getElementById("order_id");
            statut_value = document.getElementById("statut_value");
            statut_value.value = statut;
            inputs.value = id;

        }
    </script>
@endsection
