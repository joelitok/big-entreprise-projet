@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <script>
        function validate() {
            var pass = document.reg.password.value;
            var cpass = document.reg.cpassword.value;
            var message = document.getElementById('message');
            if (pass == "") {
                alert(" Le mots de passe ne dois pas un chaine vide");
                message.style.color = 'red';
                message.innerHTML = 'Le mots de passe ne dois pas un chaine vide';
                return false;
            } else if (pass != cpass) {
                alert("Vos mots de passe ne corresponde pas");
                message.style.color = 'red';
                message.innerHTML = '<div class="alert alert-danger">le mots de passe de confirmation est incorrect</div>';
                return false;
            }
        }

        function mypass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-12">
                    <span id='message'></span>
                    <form action="{{ url('/client_add_save') }}" method="post" onsubmit="return validate()" name="reg">
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
                                <h4 class="card-title" style="text-align: center">Nouveau Utilisateur</h4>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Nom : </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" maxlength="25" type="text" name="lastname"
                                            id="lastname" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Prénom : </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" maxlength="25" type="text" name="firstname"
                                            id="firstname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Email:</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="email" type="email" id="email"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Téléphone : </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" maxlength="25" type="text" name="phone" id="phone"
                                            required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Genre : </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="gender" id="gender" id="gender">
                                            <option value="male"> Masculin</option>
                                            <option value="female">Féminin</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Type:</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="type" id="type" id="type">
                                            <option value="admin">Admin</option>
                                            <option value="admin_shop">Gestionnaire de produire</option>
                                            <option value="admin_cost_destination">Gestionnaire de cout de livraison
                                            </option>
                                            <option value="delivery_man"> livreur </option>
                                            <option value="user">Utilisateur</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Ville:</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="city" id="city" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Mots de passe:</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" type="password" name="password" id="password"
                                            required>
                                        <input type="checkbox" onclick="mypass()" style="margin-top: 5px"> voir mots de
                                        passe <br />

                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-form-label"> confirmation du Mots de passe:</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" type="password" name="cpassword" id="cpassword"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="submit" value="Envoyer" class="btn btn-success">
                                        <a href="{{ URL::to('/client_list') }}" class="btn btn-danger"> Annuler</a>

                                    </div>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('include.footerAdmin')
        <!-- partial -->
    </div>

@endsection
