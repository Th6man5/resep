@extends('layouts.main')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@501&display=swap');

        .h1up {
            color: #cc080b;
        }

        #cards {
            position: absolute;
        }
    </style>
    <div class="row justify-content-center">

        <div class="col-md-6">
            <form action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('maker'))
                    <input type="hidden" name="maker" value="{{ request('maker') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </form>
        </div>
    </div>

    <h2 id="meal" class="text-center">POPULAR RECIPE</h2>

    @if ($recipe->count())
        <div class="container">
            <div class="row">
                @foreach ($recipe as $resep)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            <img class="" src="https://source.unsplash.com/500x500/?{{ $resep->recipe_name }}">
                            <div id="cards" class="badge bg-primary text-center w-50 ms-auto ">
                                <a href="/?country={{ $resep->country->name }}"
                                    style="text-decoration: none; color: white;">{{ $resep->country->name }}</a>
                            </div>
                            <h5 class="text-center my-2">{{ $resep->recipe_name }}</h5>
                            <div class="text-center"><i class="bi bi-eye-fill me-1"></i>{{ $resep->reads }}</div>
                            <a href="/{{ $resep->id }}" class="btn btn-primary mt-3">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Not Found</p>
    @endif

    {{ $recipe->render() }}
@endsection
