
<div class="container-fluid">
    <div class="row">
        <div class="col justify-c">
          
        </div>
      <div class="col d-flex"> 
        <i style="font-weight:bold;color:black" class="mr-2"> Prix min: </i>
              
              <i class="text-danger d-flex" style="font-weight:bold;">	
              <output class="ml-2 mr-2">
              @if($selectedMinPrice)
                    {{$selectedMinPrice}}
              @endif
              </output>
              <input type="range"  class="bg-danger text-white" step="500" min="{{$min_price}}" max="{{$max_price}}"  
                    oninput="this.previousElementSibling.value = this.value" 
                
                wire:model="selectedMinPrice">

              </i> <br>
        <i style="font-weight:bold;color:black">Prix max: </i>
        
             <i class="text-danger d-flex" style="font-weight:bold;"> 
            <output class="ml-2">
              @if($selectedMaxPrice)
                  {{$selectedMaxPrice}}
              @endif
              </output>
             <input type="range"  class="bg-danger text-white ml-2 mr-2" step="500" min="{{$max_price-$min_price}}" max="{{$max_price}}"  
              oninput="this.previousElementSibling.value = this.value"  wire:model="selectedMaxPrice">
              </i> 
      </div>    
      </div>


        


@if(!$hidden)
{{-- <section class="offer-banner-wrap gray pt-4" >
  <div class="container-fluid">
  <div class="row">
  <div class="col-lg-12 col-md-12">
  <div class="owl-carousel banner-offers owl-theme">
  @foreach ($products as $product)                                <!-- Single Item -->
  <div class="item">
  <div class="offer_item">
  <div class="offer_item_thumb">
  <div class="offer-overlay"></div>
  <img src="/public_images/{{json_decode($product->product_image)['0']}}">   
  <div class="offer_caption">
  <div class="offer_bottom_caption">
  <p>{{$product->product_name}}</p>
  <div class="offer_title">{{\Illuminate\Support\Str::limit($product->product_description, 20, $end='...')}}</div>
  <span>{{$product->product_price}} FCFA</span>
   </div>
  <a  onclick="window.location='{{url('/detail_shop/'.$product->id)}}'" class="btn offer_box_btn"> <b style="color: white">voir plus  </b> </a>
  </div>
  </div>
  </div>
  @endforeach
  </div>
  </div>
  </div>
  </div>
  <div class="ht-25"></div>
  </section>    --}}
@endif











<div class="mb-3"></div>
<!-- row -->
<div class="row">

    @forelse ($products as $product)
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="woo_product_grid">
            <span class="woo_pr_tag hot">{{$product->product_name}}</span>
            <div class="woo_product_thumb">
         <img src="/public_images/{{json_decode($product->product_image)['0']}}"> 
            </div>
            <div class="woo_product_caption center">
                <div class="woo_title">
                    <h4 class="woo_pro_title"><div class="offer_title">{{\Illuminate\Support\Str::limit($product->product_description, 20, $end='...')}}</div></h4>
                </div>
                <div class="woo_price">
                    <h6>{{$product->product_price}} FCFA</h6>
                </div>
            </div>
            <div class="woo_product_cart hover">
                <ul>
                    <li><a onclick="window.location='{{url('/detail_shop/'.$product->id)}}'" class="woo_cart_btn btn_cart"><i class="ti-eye"></i></a></li>
                    <li><a href="/add_to_caddy/{{$product->id}}" class="woo_cart_btn btn_view"><i class="ti-shopping-cart"></i></a></li>
                    <li><a href="" class="woo_cart_btn btn_save"><i class="ti-heart"></i></a></li>
                </ul>
            </div>								
        </div>
    </div>  
@empty
<div style="text-align: center">
        <h2 class="mr-10"> Aucun résultat trouvé</h2>
</div>
@endforelse


<div class="row">
<div class="col-lg-12">
</div>  
</div>
</div>
