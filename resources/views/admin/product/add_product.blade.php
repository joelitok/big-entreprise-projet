@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-12">
                    <form method="post" action="{{ url('/product_add_save_a') }}" enctype="multipart/form-data">
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
                                <h4 class="card-title" style="text-align: center">Article</h4>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Nom : </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" type="text" name="product_name"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Description:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="product_description" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Prix:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="number" name="product_price" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Catégorie</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select id="cname" class="form-control" name="product_category" required>
                                            @if ($categories)
                                                @foreach ($categories as $category)
                                                    <option>{{ $category->category_name }} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Stock :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="number" name="stock" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Stock alerte:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="number" name="stock_min" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Niveau d'encombrement:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        {{-- <input class="form-control"  type="number"  name="encombrement" required> --}}
                                        <select id="niveau" class="form-control" name="encombrement" required>
                                            @if ($niveaux)
                                                @foreach ($niveaux as $niveau)
                                                    <option>{{ $niveau->niveau }} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Poids:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="number" name="poids" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Réference</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="reference" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Image</label>
                                    </div>




                                    <div class="col-lg-8">

                                        {{-- add images --}}
                                        <div class="input-group control-group increment">
                                            <input type="file" name="product_image[]" class="form-control">&nbsp;
                                            <div class="input-group-btn">
                                                <button class="btn btn-success add" type="button"><i
                                                        class="ti ti-plus"></i>&nbsp;Add</button>
                                            </div>
                                        </div>

                                        {{-- delete image --}}
                                        <div class="clone hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="product_image[]" class="form-control"> &nbsp;
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger remove" type="button"><i
                                                            class="ti ti-close"></i>&nbsp; Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $(".btn-success").click(function() {
                                                    var html = $(".clone").html();
                                                    $(".increment").after(html);
                                                });
                                                $("body").on("click", ".btn-danger", function() {
                                                    $(this).parents(".control-group").remove();
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ml-2">
                                <div class="col-lg-3 ">
                                    <label class="col-form-label"> Newsletter</label>

                                </div>
                                <div class="col-lg-8">
                                    <input type="checkbox" class="form-check-input" name="newsletter">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-8">
                                    <input type="submit" value="Envoyer" class="btn btn-warning">

                                    <a href="{{ URL::to('/list_product_a') }}" class="btn btn-danger"> Annuler</a>


                                </div>
                            </div>
                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial:../../partials/_footer.html -->
                        @include('include.footerAdmin')
                        <!-- partial -->
                </div>

            @endsection
