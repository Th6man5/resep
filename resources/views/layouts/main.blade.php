<!doctype html>
<html lang="en" data-theme="cupcake">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>{{ config('app.name') }} | {{ $title }}</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Montserrat:wght@501&display=swap');


        * {
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-blend-mode: multiply;
            background-image: url("{{ asset('img/pattern.png') }}");
            background-repeat: repeat;
            max-width: 100%;
            min-height: 100vh;
        }
    </style>

</head>


<body class="bg-white1">


    @include('partials.navbar')
    <main class="sm:px-24 sm:py-10 px-6 py-6">
        @yield('content')
    </main>



    <script>
        feather.replace()
    </script>
</body>

</html>
