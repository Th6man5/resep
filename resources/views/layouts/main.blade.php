<!doctype html>
<html lang="en" data-theme="cupcake" class="bg-white">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css"> --}}

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
    <main class="px-16 py-6 ">
        @yield('content')
    </main>



    <script>
        feather.replace()
    </script>
</body>

</html>
