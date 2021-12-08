@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title col-10">Gestion des Services</h4>

                            <div class="m-4">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="nav-item">
                                        <a href="#home" class="nav-link active" data-toggle="tab">Nouveau</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="home">
                                    <form method="post" action="{{ url('/service_add_save') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Nom : </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" maxlength="25" type="text"
                                                            name="service_name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Description:</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" type="text" name="service_description"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Image</label>
                                                    </div>
                                                    <div class="col-lg-8">


                                                        {{-- add images --}}
                                                        <div class="input-group control-group increment">
                                                            <input type="file" name="service_image[]"
                                                                class="form-control">&nbsp;
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success add" type="button"><i
                                                                        class="ti ti-plus"></i>&nbsp;Add</button>
                                                            </div>
                                                        </div>

                                                        {{-- delete image --}}
                                                        <div class="clone hide">
                                                            <div class="control-group input-group" style="margin-top:10px">
                                                                <input type="file" name="service_image[]"
                                                                    class="form-control"> &nbsp;
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-danger remove" type="button"><i
                                                                            class="ti ti-close"></i>&nbsp;
                                                                        Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script type="text/javascript">
                                                            $(document).ready(function() {
                                                                $(".add").click(function() {
                                                                    var html = $(".clone").html();
                                                                    $(".increment").after(html);
                                                                });
                                                                $("body").on("click", ".remove", function() {
                                                                    $(this).parents(".control-group").remove();
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>






                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <button type="submit" value="Enregistrer"
                                                    class="btn btn-success">Enregistrer
                                                </button>

                                                <a value="Annuler" href="{{ url('/service_list') }}"
                                                    class="btn btn-danger ml-4">Annuler</a>
                                            </div>
                                        </div>
                                    </form>
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
