@extends('layouts.layoutShopAdmin.appShop')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row grid-margin">
        <div class="col-12">
          <form method="post" action="{{url('/product_add_save')}}" enctype="multipart/form-data">
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
                <div class="col-lg-3">
                  <label class="col-form-label">Nom : </label>
                </div>
                <div class="col-lg-8">
                  <input class="form-control" maxlength="25"  type="text"  name="product_name" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label class="col-form-label">Description:</label>
                </div>
                <div class="col-lg-8">
                  <input class="form-control"  type="text"  name="product_description" required>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-3">
                  <label class="col-form-label">Prix:</label>
                </div>
                <div class="col-lg-8">
                  <input class="form-control"  type="number"  name="product_price" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-3">
                  <label class="col-form-label">Catégorie</label>
                </div>
                <div class="col-lg-8">
                  <select id="cname" class="form-control" name="product_category" required>
                    @if($categories)
                    @foreach ($categories as $category)
                      <option></option>
                    <option >{{$category->category_name}} </option>   
                    @endforeach
                    @endif
                   </select>
                  </div>
              </div>

              <div class="form-group row">
                <div class="col-lg-3">
                  <label class="col-form-label">Image</label>
                </div>
                <div class="col-lg-8">
                  {{-- img-fluid --}}
                   
                <input  class="form-control img-fluid " name="product_image" type="file" 
                      style=""
                   
                    id="capture" 
                    accept="image/*" 
                    capture 
                    multiple
                    id="image" required>
                      <p><img src="" id="img" class="mt-3" /></p>
                </div>
              </div>

                  <style>
                  p>img{
                        max-width:90%;
                        height: 150px;
                      }

                  </style>

                    <script>
                          document.addEventListener('DOMContentLoaded', (ev)=>{
                            let input = document.getElementById('capture');
                                    input.addEventListener('change', (ev)=>{
                                        console.dir( input.files[0] );
                                        if(input.files[0].type.indexOf("image/") > -1){
                                            let img = document.getElementById('img');
                                            img.src = window.URL.createObjectURL(input.files[0]);
                                        } 
                                      })
                                    
                                })
                    </script>


            </div>




            
            <div class="form-group row">
              <div class="col-lg-3">

                </div>
                <div class="col-lg-8">
                  <input type="submit" value="Envoyer" class="btn btn-success">
                  <a href="{{URL::to('/list_product')}}" class="btn btn-danger"> Annuler</a>
                
                
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