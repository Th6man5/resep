@extends('layouts.main')
@section('content')
    <div class="bg-whitep p-6 rounded-lg text-black shadow-sm">
        <div class="flex">
            <div class="md:flex-none sm:flex-1 p-2 m-3">
                <label class="avatar">
                    <div class="lg:w-56 w-44 rounded-full">
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" />
                        @else
                            <img src="https://placeimg.com/192/192/arch" />
                        @endif
                    </div>
                </label>
            </div>
            <div class="flex-auto p-2 mt-10 mr-3">
                <h3>{{ $user->name }}</h3>
                <p><small class="text-muted">#{{ $user->username }}</small></p>
            </div>
        </div>

        <div class="flex flex-row mt-2 ml-4 mr-4 items-center">

            <div class="flex-1 ml-2 hover:text-blue-600 transition-all"><a href="/maker/{{ $user->id }}">
                    Recipe</a>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-2 m-4 items-center">
        <span class="text-lg">
            {{ $recipe->total() }} Recipe
        </span>
        <form action="/maker/{{ $user->id }}" class="relative block justify-self-end">
            <label>
                <input type="text" name="search" placeholder="Search"
                    class="input input-bordered rounded-md w-full max-w-xs" value="{{ request('search') }}" />
            </label>
        </form>
    </div>
    @if ($recipe->count())
        <div class="grid lg:grid-cols-2  gap-10 ">
            @foreach ($recipe as $resep)
                <div
                    class="bg-white hover:bg-whitep hover:text-black rounded overflow-hidden shadow-md hover:shadow-lg relative  transition-all">
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
                    <div class="m-4 ">
                        <div class="grid lg:grid-cols-2 items-center ">
                            <span class="font-bold block"
                                style=" overflow: hidden;  white-space: nowrap; text-overflow: ellipsis;">
                                {{ $resep->recipe_name }}
                            </span>
                        </div>
                    </div>
                    <div
                        class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center 
                     hover:bg-skin2 hover:scale-95 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $resep->reads }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
        <div class="mt-5 mb-10">
            {{ $recipe->render() }}
        </div>
    @else
        <p class="text-center sm:text-2xl font-bold">No Recipe Found</p>
    @endif



    </div>


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
@endsection
