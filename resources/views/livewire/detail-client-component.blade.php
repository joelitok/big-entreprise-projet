<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4 class="card-title col-10">Détails des commandes du
                    client {{$client->firstname}} {{$client->lastname}} (N° {{$client->numero}} )</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">

                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>N° commande</th>
                                <th>Montant Commande</th>
                                <th>Status Commande</th>
                                <th>Dernière Modification</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($client->orders)
                                @foreach ($client->orders as $order)
                                    <tr>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->numero}}</td>
                                        <td class="text-center">15000</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->updated_at}}</td>
                                        <td class="text-center"
                                            title="Voir le contenu">
                                            <button wire:model="order" wire:click="selectOrder({{$order->id}})" data-target="#exampleModal"
                                                    data-toggle="modal"><i class="ti-eye"> </i></button>
                                        </td>

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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contenu de la commande N°{{$order->numero}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="order-listing" class="table">
                        <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix unitaite</th>
                            <th>Quantite</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->contents as $content)
                            <tr>
                                <td>{{$content->product->product_name}}</td>
                                <td class="text-center">{{$content->product->product_price}}</td>
                                <td class="text-center">{{$content->quantite}}</td>
                                <td class="text-center">{{$content->total_price}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
