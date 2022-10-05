<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>MealsUP | {{ $title }}</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Montserrat:wght@501&display=swap');

        .h1up {
            color: #cc080b;
        }

        * {
            font-family: 'Montserrat', sans-serif;
        }

        a {
            text-decoration: none;
            color: black;
            transition: 0.3s;
        }

        a:hover {
            text-decoration: none;
            color: #cc080b;
            transition: 0.3s;

        }
    </style>
</head>


<body>


    @include('partials.navbar')
    <div class="container mt-4">
        <div class="container-sm">
            <div class="card">

                <div class="d-flex mb-3">
                    <div class="p-2 m-3"><img src="https://source.unsplash.com/500x500/?user" width="200"
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
                    <div class="p-2"><a href="/dashboard/recipe">My Recipe</a></div>
                    <div class="ms-auto"><a href="#" class="btn btn-primary btn-sm">New Recipe</a></div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
