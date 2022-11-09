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

        #cards {
            position: absolute
        }
    </style>

    <div class="container">
        <h3 class="text-center my-3">Recipe Reports</h3>
        <div class="card m-auto">
            <div class="card-body">
                <div class="d-flex justify-content-evenly text-center">
                    <div>
                        <i class="bi bi-bookmark" style="font-size: 2rem;"></i>
                        <p class="m-0">Saved</p>
                        <p class="m-0">Total: {{ $view }} </p>


                    </div>
                    <div>
                        <i class="bi bi-eye" style="font-size: 2rem;"></i>
                        <p class="m-0">Views</p>
                        <p class="m-0">Total: {{ $view }} </p>


                    </div>
                    <div>
                        <i class="bi bi-card-list" style="font-size: 2rem;"></i>
                        <p class="m-0">Recipe</p>
                        <p class="m-0">Total: {{ $recipe->count() }}</p>
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
                    <div class="col-md-3 mb-4 ms-auto">
                        <div class="card shadow-sm">
                            <img class="" src="https://source.unsplash.com/500x500/?{{ $recipe[0]->recipe_name }}">
                            <div id="cards" class="badge bg-primary text-center w-50  ">
                                {{ $recipe[0]->country->name }}</div>
                            <h5 class="text-center my-2">{{ $recipe[0]->recipe_name }}</h5>
                            <div class="text-center"><i class="bi bi-eye-fill me-1"></i>{{ $recipe[0]->reads }}</div>
                            <a href="/{{ $recipe[0]->id }}" class="btn btn-primary mt-3">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 mt-1">
                        <div class="card shadow-sm">
                            <img class="" src="https://source.unsplash.com/500x500/?{{ $recipe[1]->recipe_name }}">
                            <div id="cards" class="badge bg-primary text-center w-50  ">
                                {{ $recipe[1]->country->name }}</div>
                            <h5 class="text-center my-2">{{ $recipe[1]->recipe_name }}</h5>
                            <div class="text-center"><i class="bi bi-eye-fill me-1"></i>{{ $recipe[1]->reads }}</div>
                            <a href="/{{ $recipe[1]->id }}" class="btn btn-primary mt-3">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 me-auto mt-2">
                        <div class="card shadow-sm">
                            <img class="" src="https://source.unsplash.com/500x500/?{{ $recipe[2]->recipe_name }}">
                            <div id="cards" class="badge bg-primary text-center w-50  ">
                                {{ $recipe[2]->country->name }}</div>
                            <h5 class="text-center my-2">{{ $recipe[2]->recipe_name }}</h5>
                            <div class="text-center"><i class="bi bi-eye-fill me-1"></i>{{ $recipe[2]->reads }}</div>
                            <a href="/{{ $recipe[2]->id }}" class="btn btn-primary mt-3">Read More</a>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach ($recipe->skip(3) as $resep)
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-sm">
                                <img class="" src="https://source.unsplash.com/500x500/?{{ $resep->recipe_name }}">
                                <div id="cards" class="badge bg-primary text-center w-50 m-auto ">
                                    {{ $resep->country->name }}</div>
                                <h5 class="text-center my-2">{{ $resep->recipe_name }}</h5>
                                <div class="text-center"><i class="bi bi-eye-fill me-1"></i>{{ $resep->reads }}</div>
                                <a href="/{{ $resep->id }}" class="btn btn-primary mt-3">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>



            </div>
        @endsection
