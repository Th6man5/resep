@extends('dashboard.layouts.main')
@section('content')
    <div class="container-sm">
        <div class="card">

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
                <div class="p-2"><a style="color: brown" href="/dashboard">Saved</a></div>
                <div class="p-2"><a href="/dashboard/recipe">My Recipe</a></div>
                <div class="ms-auto"><a href="/dashboard/recipe/create" class="btn btn-primary btn-sm">New
                        Recipe</a></div>
            </div>
        </div>
    </div>
@endsection
