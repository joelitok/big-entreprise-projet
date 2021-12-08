@extends('layouts.layoutsClient.appClient')
@section('content')
<div class="content"> 
        <!--======= NEWS / FAQS =========-->
        <section class="news">
            <div class="container"> 
                <form action="{{url('/devis_add_save')}}" method="post">
                    @csrf
                     @forelse ($devisInput as $devis)
                        <div  class="form-row">
                             <div class="form-group">
                                    <label style="color: black">{{$devis->champ_name}}</label>
                                    <input type="{{$devis->champ_type}}"  class="form-control" name="bonjour" name="{{$devis->champ_name}}" value="{{$devis->champ_name}}">
                             </div>
                        </div> 
            
                    @empty
                        <div class="justify-content-center">
                            <h1> Aucun formulaire de devis disponible pour se service </h1>
                        </div>
                    @endforelse 
                    
                         <button type="submit" class="btn btn-primary">Envoyer </button>
                  </form>
            </div>
        </section>
@endsection