@extends('layouts.main')
@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-md-6" style="margin-bottom: -3px">
                <div class="position-sticky" style="top: 100px">
                    <div class="card shadow-sm" id="img">
                        <img src="https://source.unsplash.com/500x500/?food" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <div class="card rounded-0 mb-3 shadow-sm ">
                    <div class="card-body">
                        <a href="#" class="btn btn-outline-warning">Save Recipe</a>
                        <a href="#" class="btn btn-outline-secondary">Share</a>
                        <a href="#" class="btn btn-outline-secondary">Print</a>
                        <a href="#" class="btn btn-outline-danger">Report</a>
                        <hr>
                        <h5>{{ $recipe->recipe_name }}</h5>
                        <div class="d-flex justify-content-center mb-1" style="font-size: 20px">
                            <div class="me-1"><a href="/?maker={{ $recipe->maker->name }}">{{ $recipe->maker->name }}</a>
                            </div>
                            <div class="text-muted">#{{ $recipe->maker->username }}</div>
                        </div>
                        <div class="me-1">{{ $recipe->about }}</div>
                    </div>


                </div>
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5>Ingredients</h5>
                        <div class="d-flex justify-content-center">
                            <p class="me-5"><i class="bi bi-clock-fill"></i> {{ $recipe->time }}</p>
                            <p><i class="bi bi-person-fill"></i> {{ $recipe->portion }} Portion</p>
                        </div>

                        <p class="text-start">{{ $recipe->ingredients }}</p>
                    </div>
                </div>


                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5>Steps</h5>

                        <p class="text-start">{{ $recipe->steps }}</p>
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
