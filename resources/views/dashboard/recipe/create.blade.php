@extends('layouts.main')
@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-md-6" style="margin-bottom: -3px">
                <div class="position-sticky" style="top: 100px">
                    <div class="card shadow-sm" id="img" style="width: 500px; height: 500px;">
                        <a class="btn btn-primary" href="#">Add Picture</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6
                                text-center">
                <div class="card rounded-0 mb-3 shadow-sm ">
                    <div class="card-body">

                        <div class="d-flex justify-content-center mb-1">

                        </div>
                    </div>


                </div>
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5>Ingredients</h5>
                        <div class="d-flex justify-content-center">


                        </div>


                    </div>
                </div>


                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5>Steps</h5>


                    </div>
                </div>


                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5>coba</h5>

                        {{-- <p class="text-start">{{ $ingredients->na }}</p> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
