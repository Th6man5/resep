@extends('dashboard.layouts.main')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('edit') }}
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-error mt-3" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    <div class="grid grid-cols-2 m-4 ">
        <span class="text-lg">
            {{ $recipe->count() }} Recipe
        </span>
        <label class="relative block justify-self-end">
            <input
                class="placeholder:italic placeholder:text-slate-400 block bg-white w-auto border border-slate-300 rounded-md py-2 pl-2 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                placeholder="Search recipe" type="text" name="search" />
        </label>
    </div>

    <div class="grid lg:grid-cols-2  gap-10">
        @foreach ($recipe as $resep)
            <div class="bg-base-100 border-2 rounded overflow-hidden shadow-md relative transition-all">
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
                    <div class="grid lg:grid-cols-2 items-center">
                        <span class="font-bold block">
                            {{ $resep->recipe_name }}
                        </span>
                        <div class="flex lg:ml-auto">

                            <a href="/{{ $resep->id }}"
                                class="btn btn-primary btn-sm mr-1 hover:text-white transition-all hover:scale-105 duration-300"><i
                                    class="bi bi-eye-fill"></i></a>
                            <a href="/user/dashboard/recipe/{{ $resep->id }}/edit"
                                class="btn btn-accent btn-sm mr-1 hover:text-white transition-all hover:scale-105 duration-300"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="/user/dashboard/recipe/{{ $resep->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button
                                    class="btn btn-secondary btn-sm hover:text-white transition-all hover:scale-105 duration-300"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </div>

                </div>
                <div
                    class="bg-green-500 text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-green-600 hover:scale-95 transition-all">
                    <i class="bi bi-eye-fill text-lg"></i>
                    <p>
                        {{ $resep->reads }}
                    </p>
                </div>

            </div>
        @endforeach

    </div>
@endsection

{{-- <div class="container mt-3">

    <div class="row justify-content-between text-center m-auto">

        @foreach ($recipe as $resep)
            <div class="col-md-5">
                <div class="card mb-3 shadow-sm" style="max-width: 600px; margin: auto;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if ($resep->image)
                                <img src="{{ asset('storage/' . $resep->image) }}" class="img-fluid rounded-start"
                                    alt="...">
                            @else
                                <img src="https://source.unsplash.com/1000x1000/?{{ $resep->recipe_name }}"
                                    class="img-fluid rounded-start" alt="...">
                            @endif

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $resep->recipe_name }}</h5>
                                <div class="row mt-2 mb-2">
                                    <div class="col">
                                        <p><i class="bi bi-clock"></i> {{ $resep->time }} Minutes</p>
                                    </div>

                                    <div class="col">
                                        <p><i class="bi bi-person-fill"></i> {{ $resep->portion }} Portion</p>
                                    </div>

                                </div>

                               


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}