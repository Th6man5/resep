<!doctype html>
<html lang="en">


<head>

    <!-- component -->
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
        :root {
            font-family: 'Inter', sans-serif;
        }

        @supports (font-variation-settings: normal) {
            :root {
                font-family: 'Inter var', sans-serif;
            }
        }

        @media print {
            #grid {
                grid: none;
            }

            #menu {
                display: none;
            }

            #stats {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            #print {
                display: none;
            }

        }
    </style>


    <title>{{ config('app.name') }} | {{ $title }}</title>
    @vite('resources/css/app.css')


</head>

<body>

    <div class="antialiased w-full min-h-screen text-slate-300 relative bg-black">
        <div class="grid grid-cols-12 min-h-screen" id="grid">
            @include('dashboard.layouts.admin.sidebar')

            @yield('container')
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

</body>

</html>
