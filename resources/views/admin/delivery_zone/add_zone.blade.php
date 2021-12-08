@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-12">
                    <form method="post" action="{{ url('/zone_add_save') }}" enctype="multipart/form-data">
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
                                <h4 class="card-title" style="text-align: center">Zones</h4>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Numéro de la zone:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" type="text" name="zone_name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Heurs : </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <select id="cname" class="form-control" name="hour_delivery" required>

                                            <option value="10h"> 10h</option>
                                            <option value="11h"> 11h</option>
                                            <option value="12h"> 12h </option>
                                            <option value="13h"> 13h</option>
                                            <option value="14h"> 14h</option>
                                            <option value="15h"> 15h</option>
                                            <option value="16h"> 16h</option>
                                            <option value="17h"> 17h </option>
                                            <option value="18h"> 18h</option>
                                            <option value="19h"> 19h</option>
                                            <option value="20h"> 20h</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="col-form-label">Minutes : </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <select id="cname" class="form-control" name="minute_delivery" required>
                                            <option value="00"> 00 </option>
                                            <option value="15min"> 15 min</option>
                                            <option value="30min"> 30 min </option>
                                            <option value="45min"> 45 min </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Cout de livraison : </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" type="number" name="cost_delivery"
                                            required>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group row">
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-8">
                                    <input type="submit" value="Envoyer" class="btn btn-success">

                                    <a href="{{ URL::to('/list_zone') }}" class="btn btn-danger"> Annuler</a>



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
