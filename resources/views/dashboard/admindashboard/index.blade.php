@extends('dashboard.layouts.admin.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3 bg-dark border-0 text-light">Logout <span data-feather="log-out"
                    class="align-text-bottom"></span></button>
        </form>
    </div>
    <div class="container">
        <h1>
            Number of User: {{ $user->count() }}
        </h1>
        <h1>
            Number of Recipes: {{ $recipe->count() }}
        </h1>
    </div>
@endsection
