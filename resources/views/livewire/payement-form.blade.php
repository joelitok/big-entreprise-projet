<div class="container">
    <form action="{{ URL::to('/payment_order_save') }}" method="post">
        @csrf
        <!-- Heading -->
        <h4 class="mb-5">Détails de la livraison</h4>
        <!-- Billing details -->
        <div class="row mb-5">


            <div class="col-12 col-md-6">
                <!-- First Name -->
                <div class="form-group">
                    <label>Nom :</label>
                    <input class="form-control form-control-sm" type="text" name="lastname" value="{{ $user->lastname }}"
                        disabled>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <!-- Last Name -->
                <div class="form-group">
                    <label>Prenom : </label>
                    <input class="form-control form-control-sm" type="text" name="firstname"
                        value="{{ $user->firstname }}" disabled>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <!-- First Name -->
                <div class="form-group">
                    <label>Numéro :</label>
                    <input class="form-control form-control-sm" type="text" name="phone" value="{{ $user->phone }}"
                        disabled>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <!-- Last Name -->
                <div class="form-group">
                    <label>Email : </label>
                    <input class="form-control form-control-sm" type="email" name="email" value="{{ $user->email }}"
                        disabled>
                </div>
            </div>


            <h4 class="mb-2">Votre commande </h4>
            <!-- Address -->
            <div class="mb-3 col-12">
                <br>
                <!-- Checkbox -->
                <div class="customs-control customs-checkbox">
                    <input type="checkbox" class=" font-size-sm collapsed" data-toggle="collapse"
                        data-target="#another">&nbsp; je voudrai être livré un autre jour

                </div>
                <!-- Collapse -->
                <div class="collapse" id="another" style>
                    <div class="row mt-4">
                        <div class="col-12">
                            <input type="date" name="anotherDay" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12">
                <br />
                <!-- Checkbox -->


                <div class="row mt-4" style="justify-content: center">
                    <div class="col-12">
                        <label> Sélectionné votre ville</label>
                        <select name="city_id" id="city" class="form-control form-control-sm" wire:model="selectedCity">

                            @if ($cities)
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"> {{ $city->city_name }}</option>
                                @endforeach
                            @else
                                <option value="0">Aucun</option>
                            @endif

                        </select>
                    </div>
                    <br />

                    <!-- Checkbox -->
                    @if ($afficher)
                        <div class="col-12">
                            <label> Sélectionnez votre quartier </label>
                            <select name="quatar_id" id="quatar" wire:model="selectQuartier"  wire:change="deliverycost"  class="form-control form-control-sm">
                                <option value="">--sélectionner le quartier--</option>
                                @if ($quatars)
                                    @forelse ($quatars as $quatar)
                                        <option value="{{$quatar->id}}">
                                            {{ $quatar->quatar_name }}

                                        </option>

                                    @empty
                                        <option value="">Aucun quartier</option>
                                    @endforelse
                                @else

                                @endif




                            </select>
                        </div>
                    @endif


                    <div class="col-12">
                        <!-- Country -->
                        <div class="form-group">
                            <label>Adresse exacte de livraison <span style="color: red">*</span> </label>
                            <input class="form-control form-control-sm" type="text" name="address"
                                placeholder="préciser avec detail votre lieu de livraison" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- Address Line 1 -->
                        <div class="form-group">
                            <label>Numéro de téléphone supplementaire <span style="color: red">*</span></label>
                            <input class="form-control form-control-sm" type="number" name="anothernumber" required>
                        </div>
                    </div>


                    <div class="col-12">
                        <table class="table table-bordered table-sm table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control">
                                            <label class="custom-control-label text-body text-nowrap"
                                                for="checkoutShippingStandard">Frai de livraison</label>
                                        </div>
                                    </td>
                                    <td> 500 FCFA </td>
                                    <td>{{$coutSup}} FCFA <i class="badge badge-danger">sup </i></td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="custom-control">
                                            <label class="custom-control-label text-body text-nowrap">Total</label>
                                        </div>
                                    </td>
                                    <td> {{Session::has('cart') ? Session::get('cart')->totalQty:0}}</td>
                                    <td>{{Session::has('cart') ? Session::get('cart')->totalPrice :0}} FCFA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="text-align: center">
                <input type="checkbox" onclick="check()"> je confirme les informations rensiegnés <br>
                <input type="submit" id="checkoutb" class="btn btn-success" value="Passez a la caisse" disabled="">

            </div>

        </div>
    </form>

</div>
