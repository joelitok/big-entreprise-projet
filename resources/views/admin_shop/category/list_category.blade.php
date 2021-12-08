@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <input type="hidden" value="{{$inc=1}}">

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
                    <div class="row">
                        <h4 class="card-title col-10">Liste des catégories</h4>
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary mb-4">
                            Ajouter
                        </button>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle catégorie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">



                                    <form method="post" action="{{url('/category_add_save')}}"
                                          enctype="multipart/form-data">
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
                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">Nom : </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" maxlength="25" type="text"
                                                               name="category_name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label class="col-form-label">selection la catégorie: </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                            <select name="idParent" id="idParent" class="form-control">
                                                            <option value="">Aucun</option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{$category->id}}"> {{$category->category_name}}</option>
                                                            @endforeach

                                                           </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="submit" value="Envoyer" class="btn btn-success">
                                                    <button class="btn btn-danger" data-dismiss="modal"> Annuler
                                                    </button>


                                                </div>
                                            </div>

                                        </div>
                                    </form>




                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">

                                    <thead>
                                    <tr>
                                        <th>Ordre #</th>

                                        <th>Nom</th>
                                        <th>Date de création</th>
                                        <th>Status</th>
                                        <th colspan="3" style="text-align:center">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($categories)
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{$inc}}</td>

                                                <td>{{$category->category_name}}</td>
                                                <td>{{$category->created_at->format('d/m/Y   H:i:s')}}</td>

                                                <td>
                                                    @if($category->category_status==1)
                                                        <label class="badge badge-success"> Activé</label>
                                                    @else
                                                        <label class="badge badge-danger"> Desactivé</label>
                                                    @endif

                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-primary"
                                                            onclick="window.location='{{url('/category_update_save/'.$category->id)}}'">
                                                        Edit
                                                    </button>
                                                </td>

                                                <td>
                                                    <a class="btn btn-outline-danger"
                                                       href="{{url('/delete_category/'.$category->id)}}" id="delete">Delete</a>
                                                </td>
                                                <td>
                                                    @if($category->category_status==1)
                                                        <button class="btn btn-outline-warning"
                                                                onclick="window.location='{{url('/desactivercategory/'.$category->id)}}'">
                                                            désactiver
                                                        </button>
                                                    @else
                                                        <button class="btn btn-outline-success"
                                                                onclick="window.location='{{url('/activercategory/'.$category->id)}}'">
                                                            activer
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <input type="hidden" value="{{$inc=$inc+1}}">

                                        @endforeach
                                    @endif
                                    </tbody>

                                </table>
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
