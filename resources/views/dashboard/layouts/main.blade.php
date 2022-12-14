<!doctype html>
<html lang="en" data-theme="cupcake">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>MealsUP | {{ $title }}</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Montserrat:wght@501&display=swap');

        .h1up {
            color: #cc080b;
        }

        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>

</head>


<body>


    @include('partials.navbar')
    <main class="px-14 py-6">
        @error('name')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror
        @error('username')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror
        <div class="bg-base-100 border-2 p-6 rounded-lg text-black shadow-md">
            <div class="flex">
                <div class="md:flex-none sm:flex-1 p-2 m-3">
                    <div class="avatar">
                        <div class="w-30 rounded-full">
                            <img src="https://placeimg.com/192/192/arch" />
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-2 mt-20 mr-3">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p><small class="text-muted">#{{ auth()->user()->username }}</small></p>
                </div>

                <div class="mt-5 mr-5">

                    <hr>
                    <div class="py-2 mr-1"><label for="my-modal-3"
                            class="btn btn-accent btn-sm hover:text-white transition-all hover:scale-105 duration-300"><i
                                class="bi bi-pen-fill "></i></label></div>
                    <hr>
                    <div class="py-2  mr-1"><a href="/user/dashboard/report"
                            class="btn btn-primary btn-sm hover:text-white transition-all hover:scale-105 duration-300"><i
                                class="bi bi-bar-chart-fill"></i></a></div>
                    <hr>
                    <div class="py-2  mr-1"><a href="/user/dashboard/settings"
                            class="btn btn-secondary btn-sm hover:text-white transition-all hover:scale-105 duration-300"><i
                                class="bi bi-gear-fill"></i></a></div>
                    <hr>
                    <div class="py-2 mr-1"><a href="/user/dashboard/recipe/create"
                            class="btn btn-primary btn-sm hover:text-white transition-all duration-300 hover:scale-105"><i
                                class="bi bi-plus-circle-fill"></i></a>
                    </div>
                    <hr>
                </div>

            </div>

            <div class="flex flex-row mt-2 ml-4 mr-4 items-center">
                <div class="ml-2 flex-none mr-5 hover:text-blue-600 transition-all"><a href="/user/dashboard">Saved</a>
                </div>
                <div class="flex-1 hover:text-blue-600 transition-all"><a href="/user/dashboard/recipe">My Recipe</a>
                </div>

            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success shadow-none rounded-lg transition-all mt-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        feather.replace()
    </script>
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Edit Profile</h3>
            <p class="py-4">
            <form method="POST" action="/user/dashboard/update">
                @csrf
                @method('PUT')
                <label class="form-label">Name</label>
                <input type="text" name="name" placeholder="Recipe Name" class="form-control"
                    value="{{ auth()->user()->name }}" required>
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

                <label class="form-label">Username</label>
                <input type="text" name="username" placeholder="Recipe Name" class="form-control"
                    value="{{ auth()->user()->username }}" required>

                @error('username')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

                <label class="form-label">Email</label>
                <input type="email" name="email" placeholder="Recipe Name" class="form-control"
                    value="{{ auth()->user()->email }}" required>

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror


                <input type="submit" class="btn btn-primary mt-3" value="Submit">
            </form>
            </p>
        </div>
    </div>

</body>

</html>
{{-- <div class="container mt-4">
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
                    <div class="p-2 mt-5"><a href="/user/dashboard/report" class="btn btn-primary btn-sm"><i
                                class="bi bi-bar-chart-fill"></i></a></div>
                    <div class="py-2 mt-5 me-2"><a href="#" class="btn btn-secondary btn-sm"><i
                                class="bi bi-gear-fill"></i></a></div>
                </div>
                <div class="d-flex flex-row mb-2 ms-4 me-4">
                    <div class="p-2"><a href="/user/dashboard">Saved</a></div>
                    <div class="p-2"><a href="/user/dashboard/recipe">My Recipe</a></div>
                    <div class="ms-auto"><a href="/user/dashboard/recipe/create" class="btn btn-primary btn-md">New
                            Recipe</a></div>
                </div>
            </div>
        </div> --}}
