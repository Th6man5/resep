@extends('dashboard.layouts.main')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-warning mt-3" role="alert">
            {{ session('edit') }}
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    <div class="container mt-3">

        <div class="row justify-evenly">

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

                                    <div class="button ">
                                        <a href="/{{ $resep->id }}" class="btn btn-info hover:text-white "><i
                                                class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="/dashboard/recipe/{{ $resep->id }}/edit" class="btn btn-success "><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form action="/dashboard/recipe/{{ $resep->id }}" class="d-inline"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger "><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    </div>

    </div>
    </div>
@endsection
