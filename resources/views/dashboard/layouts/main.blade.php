<!doctype html>
<html lang="en" data-theme="cupcake" class="bg-white">

<head>
    <!-- Required meta tags -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>MealsUP | {{ $title }}</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Montserrat:wght@501&display=swap');


        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>

</head>


<body>


    @include('partials.navbar')
    <main class="sm:px-24 sm:py-10 ">
        @error('name')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror
        @error('username')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror
        <div class="bg-whitep p-4 rounded-lg text-black shadow-sm ">
            <div class="flex">
                <div class="md:flex-none sm:flex-1 p-2 m-3">
                    <div class="avatar">
                        <div class="w-30 rounded-full">
                            <img src="https://placeimg.com/192/192/arch" />
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-2 mt-10 mr-3">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p><small class="text-muted">#{{ auth()->user()->username }}</small></p>
                </div>

                <div class="mt-5 mr-5">

                    <hr>
                    <div class="py-1 mr-1"><label title="Edit Profile" for="my-modal-3"
                            class="btn text-black bg-yellow1 btn-sm hover:text-white hover:bg-yellow1 transition-all hover:scale-105 duration-300"><i
                                class="bi bi-pen-fill "></i></label></div>
                    <hr>
                    <div class="py-1  mr-1"><a title="Dashboard" href="/user/dashboard/report"
                            class="btn bg-green1 text-black btn-sm hover:text-white hover:bg-green1 transition-all hover:scale-105 duration-300"><i
                                class="bi bi-bar-chart-fill"></i></a></div>
                    <hr>
                    <div class="py-1  mr-1"><a title="Settings" href="/user/dashboard/settings"
                            class="btn bg-red2 text-black btn-sm hover:text-white hover:bg-red2 transition-all hover:scale-105 duration-300"><i
                                class="bi bi-gear-fill"></i></a></div>
                    <hr>
                    <div class="py-1 mr-1"><a title="Add Recipe" href="/user/dashboard/recipe/create"
                            class="btn bg-blue1 text-black btn-sm hover:text-white hover:bg-blue1 transition-all duration-300 hover:scale-105"><i
                                class="bi bi-plus-circle-fill"></i></a>
                    </div>
                    <hr>
                </div>

            </div>

            <div class="flex flex-row mt-2 ml-4 mr-4 items-center">
                <div class="ml-2 flex-none mr-5 hover:text-blue-600 transition-all"><a href="/user/dashboard">Saved</a>
                </div>
                <div
                    class="flex-1 hover:text-blue-600 transition-all {{ Request::is('user/dashboard/recipe') ? 'text-blue-600  ' : '' }}">
                    <a href="/user/dashboard/recipe">My Recipe</a>
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
            <label for="my-modal-3"
                class="btn bg-red1 text-black hover:bg-red1 btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Edit Profile</h3>
            <p class="py-2">
            <form method="POST" action="/user/dashboard/update">
                @csrf
                @method('PUT')
                <label class="form-label">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control p-1 rounded-lg "
                    value="{{ auth()->user()->name }}" required>
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

                <label class="form-label">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control"
                    value="{{ auth()->user()->username }}" required>

                @error('username')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror

                <label class="form-label">Email</label>
                <input type="email" name="email" placeholder="Example@gmail.com" class="form-control"
                    value="{{ auth()->user()->email }}" required>

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror


                <input type="submit" class="btn btn-primary btn-sm mt-3" value="Submit">
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
