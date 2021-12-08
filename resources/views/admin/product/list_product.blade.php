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
                        <h4 class="card-title col-10">Articles</h4>
                        <a href="{{ URL::to('/product_add_a') }}" class="btn btn-outline-primary mb-4">
                            Ajouter
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">

                                    <thead>
                                        <tr>
                                            <th>Ordre #</th>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Date de création</th>
                                            <th>Status</th>
                                            <th colspan="3" style="text-align:center">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($products)



                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $inc }}</td>
                                                    <td> <img
                                                            src="/public_images/{{ json_decode($product->product_image)['0'] ?? null }}"
                                                            alt="images"></td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_price }}</td>
                                                    <td>{{ $product->created_at->format('d/m/Y   H:i:s') }}</td>

                                                    <td>
                                                        @if ($product->product_status == 1)
                                                            <label class="badge badge-success"> Activé</label>
                                                        @else
                                                            <label class="badge badge-danger"> Desactivé</label>
                                                        @endif

                                                    </td>
                                                    <td><a
                                                            onclick="window.location='{{ url('/product_update_save_a/' . $product->id) }}'"><i
                                                                class="ti-pencil-alt"></i></a></td>

                                                    <td>
                                                        <a href="{{ url('/delete_product_a/' . $product->id) }}"
                                                            id="delete"><i class="ti-trash"></i></a>
                                                    </td>
                                                    <td>
                                                        @if ($product->product_status == 1)
                                                            <button class="btn btn-outline-warning"
                                                                onclick="window.location='{{ url('/desactiverproduct_a/' . $product->id) }}'">désactiver</button>
                                                        @else
                                                            <button class="btn btn-outline-success"
                                                                onclick="window.location='{{ url('/activerproduct_a/' . $product->id) }}'">activer</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <input type="hidden" value="{{ $inc = $inc + 1 }}">

                                            @empty
                                                <tr>
                                                    <td colspan="9" style="text-align: center"> Aucun Article disponible
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endif



                                    </tbody>
                                </table>
                                <div class="col-lg-9"> </div>
                                <div style="text-align: right" class="col-lg-3">
                                    <span> {{ $products->links('pagination.paginatelinks') }}</span>
                                </div>


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
