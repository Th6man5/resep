@extends('layouts.main')
@section('content')
    <style>
        .circle {
            background-color: #f25b0a;
            border-radius: 50%;
            display: inline-block;
            height: 50px;
            width: 50px;
        }
    </style>
    <div class="container">
        <h3 class="text-center my-3">Recipe Reports</h3>
        <div class="card w-75 m-auto">
            <div class="card-body">
                <div class="d-flex justify-content-around text-center">
                    <div>
                        <i class="bi bi-bookmark" style="font-size: 2rem;"></i>
                        <p class="m-0">Saved</p>
                        <p class="m-0">Total: 0</p>
                    </div>
                    <div>
                        <i class="bi bi-printer" style="font-size: 2rem;"></i>
                        <p class="m-0">Printed</p>
                        <p class="m-0">Total: 0</p>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-center text-center">
                    <div>
                        <div class="circle">
                            <i class="bi bi-trophy" style="font-size: 2rem; color: white;"></i>
                        </div>
                        <p>Your Populer Recipe</p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($recipe as $resep)
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm">
                                <img class="" src="https://source.unsplash.com/500x500/?food">
                                <h5 class="text-center my-2">{{ $resep->recipe_name }}</h5>
                                <p class="badge bg-primary text-center w-50 m-auto ">{{ $resep->country->name }}</p>

                                <a href="/{{ $resep->id }}" class="btn btn-primary mt-3">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endsection