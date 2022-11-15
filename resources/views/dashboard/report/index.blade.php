@extends('layouts.main')
@section('content')
    <style>
        .circle {

            border-radius: 50%;
            display: inline-block;
            height: 50px;
            width: 50px;
        }
    </style>
    <main class="px-16 py-6 ">


        <h3 class="text-center my-3 text-4xl">Recipe Reports</h3>

        <div class="grid grid-cols-3  mb-10 gap-4 text-center mt-5">
            <div>
                <div
                    class="circle bg-green-700 hover:bg-green-800 hover:scale-110 transition-all duration-1000 hover:rotate-[360deg]">
                    <i class="bi bi-bookmark-fill text-white" style="font-size: 2rem;"></i>
                </div>

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


        <hr class="mb-5">
        {{-- Throphies Icon --}}
        <div class="text-center">
            <div
                class="circle bg-green-700 hover:bg-green-800 hover:scale-110 transition-all duration-1000 hover:rotate-[360deg]">
                <i class="bi bi-trophy-fill" style="font-size: 2rem; color: white;"></i>
            </div>
            <p class="text-xl uppercase mb-5">Top 3</p>
        </div>


        <div class="grid lg:grid-cols-3  mb-10 gap-4">
            <div
                class="bg-white rounded overflow-hidden shadow-md relative hover:bg-sky-300 hover:scale-105 transition-all">
                @if ($recipe[0]->image)
                    <a href="/{{ $recipe[0]->id }}">
                        <img src="{{ asset('storage/' . $recipe[0]->image) }}" class="w-full h-32 sm:h-48 object-cover">
                    </a>
                @else
                    <a href="/{{ $recipe[0]->id }}">
                        <img src="https://source.unsplash.com/1000x1000/?{{ $recipe[0]->recipe_name }}"
                            class="w-full h-32 sm:h-48 object-cover">
                    </a>
                @endif
                <div class="m-4">
                    <span class="font-bold block">
                        {{ $recipe[0]->recipe_name }}
                    </span>
                    <a class=" text-gray-500 text-sm hover:text-slate-600 hover:text-base transition-all"
                        href="/?maker={{ $recipe[0]->country->name }}">
                        {{ $recipe[0]->country->name }}
                    </a>

                </div>
                <div
                    class="bg-green-500 text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-green-600 hover:scale-95 transition-all">
                    <i data-feather="eye"></i>
                    <p>
                        {{ $recipe[0]->reads }}
                    </p>
                </div>

            </div>

            <div
                class="bg-white rounded overflow-hidden shadow-md relative hover:bg-sky-300 hover:scale-105 transition-all">
                @if ($recipe[1]->image)
                    <a href="/{{ $recipe[1]->id }}">
                        <img src="{{ asset('storage/' . $recipe[1]->image) }}" class="w-full h-32 sm:h-48 object-cover">
                    </a>
                @else
                    <a href="/{{ $recipe[1]->id }}">
                        <img src="https://source.unsplash.com/1000x1000/?{{ $recipe[1]->recipe_name }}"
                            class="w-full h-32 sm:h-48 object-cover">
                    </a>
                @endif
                <div class="m-4">
                    <span class="font-bold block">
                        {{ $recipe[1]->recipe_name }}
                    </span>
                    <a class=" text-gray-500 text-sm hover:text-slate-600 hover:text-base transition-all"
                        href="/?maker={{ $recipe[1]->country->name }}">
                        {{ $recipe[1]->country->name }}
                    </a>
                </div>
                <div
                    class="bg-green-500 text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-green-600 hover:scale-95 transition-all">
                    <i data-feather="eye"></i>
                    <p>
                        {{ $recipe[1]->reads }}
                    </p>
                </div>

            </div>

            <div
                class="bg-white rounded overflow-hidden shadow-md relative hover:bg-sky-300 hover:scale-105 transition-all">
                @if ($recipe[2]->image)
                    <a href="/{{ $recipe[2]->id }}">
                        <img src="{{ asset('storage/' . $recipe[2]->image) }}" class="w-full h-32 sm:h-48 object-cover">
                    </a>
                @else
                    <a href="/{{ $recipe[2]->id }}">
                        <img src="https://source.unsplash.com/1000x1000/?{{ $recipe[2]->recipe_name }}"
                            class="w-full h-32 sm:h-48 object-cover">
                    </a>
                @endif
                <div class="m-4">
                    <span class="font-bold block">
                        {{ $recipe[2]->recipe_name }}
                    </span>
                    <a class=" text-gray-500 text-sm hover:text-slate-600 hover:text-base transition-all"
                        href="/?maker={{ $recipe[2]->country->name }}">
                        {{ $recipe[2]->country->name }}
                    </a>

                </div>
                <div
                    class="bg-green-500 text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-green-600 hover:scale-95 transition-all">
                    <i data-feather="eye"></i>
                    <p>
                        {{ $recipe[2]->reads }}
                    </p>
                </div>

            </div>


        </div>
        <hr class="mb-10">


        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10">
            @foreach ($recipe->skip(3) as $resep)
                <div
                    class="bg-white rounded overflow-hidden shadow-md relative hover:bg-sky-300 hover:scale-105 transition-all">
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
                        <a class=" text-gray-500 text-sm hover:text-slate-600 hover:text-base transition-all"
                            href="/?maker={{ $resep->country->name }}">
                            {{ $resep->country->name }}
                        </a>

                    </div>
                    <div
                        class="bg-green-500 text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-green-600 hover:scale-95 transition-all">
                        <i data-feather="eye"></i>
                        <p>
                            {{ $resep->reads }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    </main>
    {{-- <div class="row">
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
                </div> --}}
@endsection
