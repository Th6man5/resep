@extends('layouts.main')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@501&display=swap');
    </style>


    @if ($recipe->count())
        {{-- <div class="row justify-content-center">
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
            </div> --}}
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10">
            @foreach ($recipe as $resep)
                <div
                    class="bg-whitep rounded overflow-hidden shadow-md relative hover:bg-red1 hover:scale-105 transition-all hover:text-white">
                    @if ($resep->image)
                        <a href="/{{ $resep->id }}">
                            <img src="{{ asset('storage/' . $resep->image) }}" class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @else
                        <a href="/{{ $resep->id }}">
                            <img src="https://source.unsplash.com/1000x1000/?{{ $resep->recipe_name }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @endif
                    <div class="m-4">
                        <span class="font-bold block">
                            {{ $resep->recipe_name }}
                        </span>
                        <a class="text-sm hover:text-gray-300" href="/maker/{{ $resep->maker->id }}">
                            {{ $resep->maker->name }}
                        </a>
                    </div>
                    <div
                        class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 hover:scale-105 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $resep->reads }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    @else
        <p class="text-center fs-4">Not Found</p>
    @endif

    {{ $recipe->render() }}




    {{--
    <h2 id="meal" class="text-center">{{ $title }}</h2>

    @if ($recipe->count())
        <div class="container">
            <div class="row">
                @foreach ($recipe as $resep)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            @if ($resep->image)
                                <img id="imgcard" src="{{ asset('storage/' . $resep->image) }}" alt="...">
                            @else
                                <img id="imgcard" class=""
                                    src="https://source.unsplash.com/500x500/?{{ $resep->recipe_name }}">
                            @endif

                            <div id="cards" class="badge bg-primary text-center w-50 ms-auto ">
                                <a href="/?country={{ $resep->country->name }}"
                                    style="text-decoration: none; color: white;">{{ $resep->country->name }}</a>
                            </div>
                            <div id="cards" class="badge bg-primary text-center w-50 me-auto ">
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

    {{ $recipe->render() }} --}}
@endsection
