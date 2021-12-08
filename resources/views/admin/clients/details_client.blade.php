@extends('layouts.layoutAdmin.appAdmin')
@section('content')

    <div class="main-panel">
        @livewire('detail-client-component', ['client'=>$client])
        @include('include.footerAdmin')
        <!-- partial -->
    </div>
@endsection
