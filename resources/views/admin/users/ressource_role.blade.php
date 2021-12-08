@extends('layouts.layoutAdmin.appAdmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card-body">
                <h4 class="card-title col-10">Ressource du rôle <b> {{ $role->name }}</b></h4>

                <div class=" container row mt-5 ml-5 mr-5">
                    @foreach ($ressources as $ressource)
                        <div class="form-group mr-4">
                            {{-- <input {{ $role->exist ? "checked" : '' }} onclick="attribuer()" id="check" type="checkbox" --}}
                            {{-- value={{ $role->id }}> --}}
                            <label class="switch">
                                <input type="checkbox" value={{ $ressource->id }}
                                    {{ $ressource->exist ? 'checked' : '' }} onclick="attribuer()" id="check">
                                <span class="slider round"></span>
                            </label>
                            <span class="text-center mt-4 ml-2"> {{ $ressource->name }} </span>
                            {{-- <label for="role">{{ $role->name }} --}}
                        </div>

                    @endforeach
                </div>
                {{ $ressources->links('pagination.paginatelinks') }}
            </div>

            <form method="POST" class="container" action="{{ route('affecterRessource') }}">
                @csrf
                <input type="hidden" id="selected" name="ids">
                <input type="hidden" id="user_id" name="role_id" value={{ $role->id }}>
                <button id="btn" type="submit" class="mt-4 btn btn-sm btn-success" onclick="selected()" disabled>
                    Terminer
                </button>
            </form>
        </div>

        @include('include.footerAdmin')
    </div>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>

    <script>
        function attribuer() {
            data = [...document.querySelectorAll('#check:checked')].map(e => e.value);
            let btn = document.getElementById('btn');
            if (data != null ? data.length > 0 : false) {
                btn.disabled = false;
                document.getElementById("selected").value = data;
            } else {
                btn.disabled = true;
            }
        }

        function selected() {
            document.getElementById("selected").value = data;
        }
    </script>
@endsection
