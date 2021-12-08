@extends('layouts.layoutDelivery.appDelivery')
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
          <h4 class="card-title">Liste des commandes</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">

                  <thead>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Email</th>
                        
                        <th>Etat</th>
                        
                        <th  colspan="3" style="text-align:center">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                   @if($orders)
                   @foreach ($orders as $order)
                   <tr>
                    <td>{{$order->order_user_name}}</td>
                    <td>{{$order->order_user_email}}</td>

                    
                  @if($order->order_status==4)
                  <td style="color: pink"> <strong> Encours de livraison</strong> </td>
                  @elseif($order->order_status==5)
                  <td style="color: green"> <strong> Livré</strong> </td>
                  @else
                  <td style="color: red"> <strong>  Rejeté</strong> </td>
                  @endif 

                    <td> <i class="ti-eye" data-toggle="modal" data-target="#exampleModalLong{{$order->id}}"> </i></td>
                    <td><a  onclick="window.location='{{url('/voir_pdf/'.$order->id)}}'"> <i class="ti-download"> </i></a></td>
                     <td>
                       
                        @if($order->order_status==4)
                        <a   href="{{url('/transfer_d/'.$order->id)}}" style="color: red" id="delivery"> <i class="ti-close"> </i></a>
                        @elseif($order->order_status==5)
                         <a href=""><i class="ti-save"> </i></a>
                        @else
                         <a href=""><i class="ti-back-left"> </i></a>
                        @endif

                    
                {{-- <a  href="{{url('/delete_order/'.$order->id)}}" id="delete"><i class="ti-trash"></i></a>--}}
             </td> 
                   
                    
                     
                    <!-- Modal -->
                      <div class="modal fade" id="exampleModalLong{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">{{$order->order_user_name}} &nbsp; {{$order->order_user_phone}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                               @foreach($order->caddy->items as $item)
                               <p>
                                 <img src="/storage/product_images/{{$item['product_image']}}" height="100px" width="80px">  &nbsp; Prix  : <strong> {{$item['product_price']}} FCFA ; </strong>  &nbsp; Nom : <strong> {{$item['product_name']}} </strong> </p>
                                 {{-- <p style="text-align: justify">{{$item['product_name']}} </p> --}}
                                @endforeach 
                               <p style="text-align: right">Prix Total &nbsp; : <strong> {{$order->caddy->totalPrice}}  FCFA  </strong></p>    
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