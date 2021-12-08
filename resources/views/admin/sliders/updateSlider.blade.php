@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-12">
                    <form method="post" action="{{ url('/slider_update_save_action') }}" enctype="multipart/form-data">
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
                                <h4 class="card-title" style="text-align: center">Nouveau slider</h4>
                                <div class="form-group row">
                                    <input type="hidden" value="{{ $slider->id }}" name="id">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Nom : </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" type="text" name="slider_name"
                                            value="{{ $slider->slider_name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Description:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="slider_shot_description"
                                            value="{{ $slider->slider_shot_description }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Image</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" name="slider_image" type="file"
                                            value="{{ $slider->slider_image }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-8">
                                    <input type="submit" value="Envoyer" class="btn btn-success">
                                    <a href="{{ URL::to('/admin') }}" class="btn btn-danger"> Annuler</a>

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
