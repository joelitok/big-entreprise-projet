@extends('layouts.layoutShopAdmin.appShop')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row grid-margin">
        <div class="col-12">
          <form method="post" action="{{url('/product_update_save_action')}}" enctype="multipart/form-data">
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
              <h4 class="card-title" style="text-align: center">Nouveau product</h4>
              <div class="form-group row">
                <input type="hidden" value="{{$product->id}}" name="id">
                <div class="col-lg-3">
                  <label class="col-form-label">Nom : </label>
                </div>
                <div class="col-lg-8">
                  <input class="form-control" maxlength="25"  type="text"  name="product_name" value="{{$product->product_name}}" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label class="col-form-label">Description:</label>
                </div>
                <div class="col-lg-8">
                  <input class="form-control"  type="text"  name="product_description" value="{{$product->product_description}}" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-3">
                  <label class="col-form-label">Prix:</label>
                </div>
                <div class="col-lg-8">
                  <input class="form-control"  type="number"  name="product_price" value="{{$product->product_price}}" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-3">
                  <label class="col-form-label">Image</label>
                </div>
                <div class="col-lg-8">
                  <input  class="form-control" name="product_image" type="file" value="{{$product->product_image}}" required>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-3">
                <label class="col-form-label">Catégorie</label>
              </div>
              <div class="col-lg-8">

<select id="cname" class="form-control" name="product_category">
<option> {{$product->product_category}} </option>
@if($categories)
@foreach ($categories as $category)
@if($category->category_name!= $product->product_category)
<option >{{ $category->category_name}} </option>      
@endif
@endforeach
@endif

                 </select>
                </div>
            </div>


            <div class="form-group row">
              <div class="col-lg-3">
                 </div>
                <div class="col-lg-8">
                  <input type="submit" value="Envoyer" class="btn btn-success">
                  <a href="{{URL::to('/admin_shop')}}" class="btn btn-danger"> Annuler</a>
                  
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