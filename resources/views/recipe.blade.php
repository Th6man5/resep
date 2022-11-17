@extends('layouts.main')
@section('content')
    <main class="px-10 py-6 ">
        <div class="grid lg:grid-cols-2 gap-10 relative">
            <div class="rounded" style="margin-bottom: -3px">
                <div class="sticky top-0 shadow-md" style="top: 100px">
                    @if ($recipe->image)
                        <img src="{{ asset('storage/' . $recipe->image) }}" class=" object-cover">
                    @else
                        <img src="https://source.unsplash.com/1000x1000/?{{ $recipe->recipe_name }}" class=" object-cover">
                    @endif
                    <div
                        class="bg-primary text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-green-500 hover:scale-95 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $recipe->reads }}
                        </p>
                    </div>
                </div>



            </div>
            <div class=" rounded border-2  shadow-md">
                <div class="grid grid-cols-4 gap-2 mx-10 p-6 ">
                    <button class="btn btn-warning hover:bg-yellow-500 hover:scale-105">Save</button>
                    <button class="btn btn-success hover:bg-green-500 hover:scale-105">Print</button>
                    <button class="btn btn-success hover:bg-green-500 hover:scale-105">Share</button>
                    <button class="btn btn-error hover:bg-red-500 hover:scale-105">Report</button>
                </div>
                <hr>
                <h1 class="mt-3 text-2xl text-center">{{ $recipe->recipe_name }}</h1>

                <div class="text-center my-3 text-lg">
                    <a class="text-green-600 hover:text-green-700"
                        href="/maker/{{ $recipe->maker->id }}">{{ $recipe->maker->name }}</a>
                    <a class="text-slate-400">#{{ $recipe->maker->username }}</a>
                </div>
                <hr>
                <h1 class="mt-3 text-2xl text-center  uppercase">About</h1>
                <div class="mx-4 my-3 text-center">{{ $recipe->about }}</div>
                <hr>
                <h1 class="mt-3 text-2xl text-center  uppercase">Ingredients</h1>
                <div class="grid grid-cols-2 gap-2 mx-10 text-center text-lg mt-3">
                    <span class="bg-primary rounded-full">
                        <i class="bi bi-clock-fill"></i> {{ $recipe->time }} Minutes
                    </span>
                    <span class="bg-primary rounded-full">
                        <i class="bi bi-person-fill"></i> {{ $recipe->portion }} Portion
                    </span>
                </div>
                <div class="mx-4 my-3 text-center">{{ $recipe->ingredients }}</div>
                <hr>
                <h1 class="mt-3 text-2xl text-center  uppercase">Steps</h1>
                <div class="mx-4 my-3 text-center">{{ $recipe->ingredients }}</div>


    </main>
    {{-- <div class="container-sm">
        <div class="row">
            <div class="col-md-6" style="margin-bottom: -3px">
                <div class="position-sticky" style="top: 100px">
                    <div class="card shadow-sm" id="img">
                        @if ($recipe->image)
                            <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="...">
                        @else
                            <img src="https://source.unsplash.com/500x500/?food" class="card-img-top" alt="...">
                        @endif

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
@endsection
