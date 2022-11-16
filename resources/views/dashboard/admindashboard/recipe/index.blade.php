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
        <h1 class="mb-5">
            Number of Recipes: {{ $recipe->count() }}
        </h1>
        <div class="table-responsive ">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Recipe Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Reads</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($recipe as $resep)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $resep->recipe_name }}</td>
                            <td>{{ $resep->maker->username }}</td>
                            <td>{{ $resep->reads }}</td>
                            {{-- <td>{{ $barang->stok }}</td> --}}
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
