@extends('dashboard.layouts.main')
@section('content')
    <div class="container-sm">
        <div class="card shadow-sm">

            <div class="d-flex mb-3">
                <div class="p-2 m-3"><img src="https://source.unsplash.com/500x500/?anime" width="200"
                        class="rounded-circle img-thumbnail" />
                </div>
                <div class="me-auto p-2 mt-5">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p><small class="text-muted">#{{ auth()->user()->username }}</small></p>
                </div>
                <div class="ms-2 py-2 mt-5"><a href="#" class="btn btn-success btn-sm"><i
                            class="bi bi-pen-fill"></i></a></div>
                <div class="p-2 mt-5"><a href="#" class="btn btn-primary btn-sm"><i
                            class="bi bi-bar-chart-fill"></i></a></div>
                <div class="py-2 mt-5 me-2"><a href="#" class="btn btn-secondary btn-sm"><i
                            class="bi bi-gear-fill"></i></a></div>
            </div>
            <div class="d-flex flex-row mb-2 ms-4 me-4">
                <div class="p-2"><a href="/dashboard">Saved</a></div>
                <div class="p-2"><a style="color: brown" href="/dashboard/recipe">My Recipe</a></div>
                <div class="ms-auto"><a href="/dashboard/recipe/create" class="btn btn-primary btn-sm">New
                        Recipe</a></div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('delete') }}
        </div>
    @endif

    <div class="container mt-3">
        <div class="row">
            @foreach ($recipe as $resep)
                <div class="col-md-6">
                    <div class="card mb-3 shadow-sm" style="max-width: 600px; margin: auto;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://source.unsplash.com/1000x1000/?food" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $resep->recipe_name }}</h5>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <p><i class="bi bi-clock"></i> {{ $resep->time }} Menit</p>
                                        </div>

                                        <div class="col">
                                            <p><i class="bi bi-clock"></i> {{ $resep->portion }} Porsi</p>
                                        </div>

                                    </div>

                                    <div class="button">
                                        <a href="/{{ $resep->id }}" class="btn btn-info "><i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning "><i class="bi bi-pencil-square"></i></a>
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
