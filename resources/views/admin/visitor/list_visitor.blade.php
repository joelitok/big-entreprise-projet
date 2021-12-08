@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <input type="hidden" value="{{ $inc = 1 }}">

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

                    <div class="row">
                        <h4 class="card-title col-10">Visites</h4>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">

                                    <thead>
                                        <tr>
                                            <th>Ordre #</th>

                                            <th>Adresse IP</th>
                                            <th>Page</th>
                                            <th>Date et Heures</th>
                                            <th style="text-align:center">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        @if ($visitors)
                                            @forelse  ($visitors as $visitor)
                                                <tr>

                                                    <td>{{ $inc }}</td>
                                                    <td>{{ $visitor->visitor_ip_address }}</td>
                                                    <td>{{ $visitor->page }}</td>
                                                    <td>{{ $visitor->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <a class="btn btn-outline-danger"
                                                            href="{{ url('/delete_visitor/' . $visitor->id) }}"
                                                            id="delete">Delete</a>
                                                    </td>
                                                </tr>

                                                <input type="hidden" value="{{ $inc = $inc + 1 }}">
                                            @empty
                                                <tr>
                                                    <td colspan="5" style="text-align: center"> Aucune visites sur le site
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endif
                                    </tbody>
                                </table>
                                {{ $visitors->links('pagination.paginatelinks') }}
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
