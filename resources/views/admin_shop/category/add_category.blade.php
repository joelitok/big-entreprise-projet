@extends('layouts.layoutShopAdmin.appShop')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin">
                <div class="col-12">
                    <form method="post" action="{{url('/category_add_save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            @if(Session::has('status'))
                                <div class="alert alert-success">
                                    {{Session::get('status')}}
                                    {{Session::put('status',null)}}
                                </div>
                            @endif

                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center">Nouvelle category</h4>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Nom : </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input class="form-control" maxlength="25" type="text" name="category_name"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-8">

                                    <input type="submit" value="Envoyer" class="btn btn-success">
                                    <a href="{{URL::to('/list_category')}}" class="btn btn-danger"> Annuler</a>
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
