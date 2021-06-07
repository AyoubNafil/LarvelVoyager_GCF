@extends('voyager::master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ voyager_asset('js/Search.js') }}"></script>
<div class="container-fluid">
    <div class="card bg-white" >
        <div class="card-header card-color">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">List classes par filiere</p>
        </div>
        <div class="card-body container-fluid" >
            <div class="row">


                <div class="col-sm-6 mb-2">
                    <label for="filiere">Filiere : </label>
                    <select id="filiere" class="custom-select" style="width: 892px;"></select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn" style="padding-bottom:10px;
                            margin-left: 18px;
                            margin-bottom: 10px;">Rechercher</button>
                </div>
            </div>
            <div class="row table-responsive m-auto rounded">
                <table id="tsearch" class="table table-hover" style="width: 100%;">
                    <thead>
                        <tr class="text-uppercase bg-light">
                            <th scope="col">classes</th>
                        </tr>
                    </thead>
                    <tbody id="table-content">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection