@extends('layouts.layoutShopAdmin.appShop')
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
        <h4 class="card-title">Gestion des commandes</h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">

                <thead>
                  <tr>
                    
                      <th>Numéro</th>
                      <th>Etat</th>
                      
                      <th  colspan="3" style="text-align:center">Action</th>
                  </tr>
                </thead>
                <tbody>

                 @if($orders)
                 @foreach ($orders as $order)
                 <tr>
                  <td>{{$order->numero}}</td>


                  @if($order->order_status==2)   
                  <td style="color: yellow"> <strong> Récu </strong></td> 
                  @elseif($order->order_status==3)
                  <td style="color: rgb(40, 117, 161)"> <strong> Encours de vente</strong> </td> 
                  @elseif($order->order_status==4)
                  <td style="color: pink"> <strong> Encours de livraison</strong> </td>
                  @elseif($order->order_status==5)
                  <td style="color: green"> <strong> Livré</strong> </td>
                  @else
                  <td style="color: red"> <strong>  Rejeté</strong> </td>
                  @endif
                  
              
                     <td> <i class="ti-eye" data-toggle="modal" data-target="#exampleModalLong{{$order->id}}"> </i></td>
                     <td><a  onclick="window.location='{{url('/voir_pdf/'.$order->id.'/'.$order->client_id)}}'"> <i class="ti-download"> </i></a></td>
                   <td>

                    @if($order->order_status==2)   
                    <a href="{{url('/transfer_s/'.$order->id)}}"  style="color: red" id="delivery"> <i class="ti-close"> </i></a>
                    @elseif($order->order_status==3)
                    <a href="">  <i class="ti-shopping-cart"></i></a> 
                    @elseif($order->order_status==4)
                    <a href="">  <i class="ti-time"></i></a> 
                    @elseif($order->order_status==5)
                     <a href=""><i class="ti-save"> </i></a>
                    @else
                    <a href=""><i class="ti-back-left"> </i></a>)
                  @endif  
                  </td>





                  <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                  
                                  @foreach ($client as $clt)
                                  @if($clt->id==$order->client_id)
                                  {{$clt->firstname}} &nbsp; {{$clt->phone}} 
                                  @endif
                                  @endforeach
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                   
                                
                                
                               @foreach($order->contents as $caddy)
                                <?php $order->total += $caddy->total_price; ?>
                              <p>
                                  <img src="/storage/product_images/{{$caddy->product->product_image}}" height="100px" width="80px"> 
                                    &nbsp; Prix  : <strong> {{$caddy->product->product_price}} FCFA ; 
                                    </strong>  &nbsp; Nom : <strong> {{$caddy->product->product_name}} 
                                      &nbsp; Q: {{$caddy->quantite}}</strong> </p>
                                      @endforeach 
                                  
                                  <p style="text-align: right">Quantité &nbsp; : <strong> {{$order->contents->count()}} </strong></p>    
                                  <p style="text-align: right">Prix Total &nbsp; : <strong> {{$order->total}}  FCFA  </strong></p>    
                                  
                                  </div> 

                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button>
                              </div>
                            </div>
                          </div>
                        </div>

                 
                  </tr>
              
                      @endforeach  
                      @endif 

                </tbody>
              </table>
             {{$orders->links('pagination.paginatelinks')}}
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