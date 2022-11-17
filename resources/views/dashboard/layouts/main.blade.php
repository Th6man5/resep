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
        <div class="bg-base-100 border-2 p-6 rounded-lg text-black shadow-md">
            <div class="flex">
                <div class="md:flex-none sm:flex-1 p-2 m-3">
                    <div class="avatar">
                        <div class="w-30 rounded-full">
                            <img src="https://placeimg.com/192/192/arch" />
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-2 mt-5 mr-3">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p><small class="text-muted">#{{ auth()->user()->username }}</small></p>
                </div>

                <div class="py-2 mt-5 mr-1"><a href="#"
                        class="btn btn-accent btn-sm hover:text-white transition-all hover:scale-105 duration-300"><i
                            class="bi bi-pen-fill "></i></a></div>
                <div class="py-2 mt-5 mr-1"><a href="/user/dashboard/report"
                        class="btn btn-primary btn-sm hover:text-white transition-all hover:scale-105 duration-300"><i
                            class="bi bi-bar-chart-fill"></i></a></div>
                <div class="py-2 mt-5 mr-1"><a href="#"
                        class="btn btn-secondary btn-sm hover:text-white transition-all hover:scale-105 duration-300"><i
                            class="bi bi-gear-fill"></i></a></div>
            </div>

            <div class="flex flex-row mt-2 ml-4 mr-4 items-center">
                <div class="ml-2 flex-none mr-5 hover:text-blue-600 transition-all"><a href="/user/dashboard">Saved</a>
                </div>
                <div class="flex-1 hover:text-blue-600 transition-all"><a href="/user/dashboard/recipe">My Recipe</a>
                </div>
                <div class="mb-1"><a href="/user/dashboard/recipe/create"
                        class="btn btn-primary btn-xs sm:btn-sm md:btn-sm lg:btn-sm hover:text-white transition-all duration-300 hover:scale-105">New
                        Recipe</a></div>
            </div>
        </div>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        feather.replace()
    </script>
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
