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

        #arm1 {
            animation: arm 5s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;


        }

        #shoulder1 {
            animation: arm 5s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes arm {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(8deg);
            }
        }

        #shoulder2 {
            animation: arm2 3s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        #arm2 {
            animation: arm2 3s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes arm2 {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(6deg);
            }
        }

        #hair {
            animation: hair 2s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes hair {
            from {
                transform: rotateZ(-4deg);
            }

            to {
                transform: rotateZ(-6deg);
            }
        }

        #head {
            animation: head 2s ease-in-out infinite alternate;
            transform-origin: bottom;
            transform-box: fill-box;
        }

        #neck {
            animation: head 2s ease-in-out infinite alternate;
            transform-origin: bottom;
            transform-box: fill-box;
        }

        @keyframes head {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(-2deg);
            }
        }

        #skirt {
            animation: skirt 3s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes skirt {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(-2deg);
            }
        }

        #back {
            transition: all 1s ease-in-out;
        }

        #back:hover {
            transform: scale(105%) rotateZ(1deg);
        }

        #phone {
            animation: phone 3s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes phone {
            from {
                transform: scale(95%);
            }

            to {
                transform: scale(100%);
            }
        }

        #kecap {
            animation: kecap 6s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        #egg {
            animation: kecap 6s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        @keyframes kecap {
            from {
                transform: rotateZ(-10deg);
            }

            to {
                transform: rotateZ(20deg);
            }
        }

        #Bookmarkbar {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        #Bookmarkbar_2 {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        #Printerbar {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        #Printerbar_2 {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes bar {
            from {
                transform: scale(100%);
            }

            to {
                transform: scale(110%);
            }
        }
    </style>

</head>


<body>


    @include('partials.navbar')
    <main class="px-14 py-6">
        @yield('content')
    </main>



    <script>
        feather.replace()
    </script>
</body>

</html>
