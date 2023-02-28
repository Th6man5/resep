<!doctype html>
<html lang="en" data-theme="cupcake">

<head>
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
    <main class="sm:px-24 sm:py-10">

        <div class="bg-whitep p-4 rounded-lg text-black shadow-sm ">
            <div class="flex mb-5">
                <div class="md:flex-none sm:flex-1 p-2 m-3">
                    <label class="avatar">
                        <div class="lg:w-56 w-44 rounded-full">
                            @if (auth()->user()->profile_picture)
                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" />
                            @else
                                <img src="/img/profile.png" />
                            @endif
                        </div>
                    </label>
                </div>
                <div class="flex-auto p-2 mt-10 mr-3">
                    <h3>{{ auth()->user()->name }}</h3>
                    <p><small class="text-muted">#{{ auth()->user()->username }}</small></p>
                </div>

                <div class="mt-5 mr-5">

                    <hr>
                    <div class="py-1 mr-1"><label title="Edit Profile" for="my-modal-3"
                            class="btn text-black border-none bg-yellow1 btn-sm hover:text-white hover:bg-yellow1 transition-all  duration-300"><i
                                class="bi bi-pen-fill "></i></label></div>
                    <hr>
                    <div class="py-1  mr-1"><a title="Dashboard" href="/user/dashboard/report"
                            class="btn bg-success border-none text-black btn-sm hover:text-white hover:bg-success transition-all  duration-300"><i
                                class="bi bi-bar-chart-fill"></i></a></div>
                    <hr>
                    <div class="py-1  mr-1"><a title="Settings" href="/user/dashboard/settings"
                            class="btn bg-red2 border-none text-black btn-sm hover:text-white hover:bg-red2 transition-all  duration-300"><i
                                class="bi bi-gear-fill"></i></a></div>
                    <hr>
                    <div class="py-1 mr-1"><a title="Add Recipe" href="/user/dashboard/recipe/create"
                            class="btn bg-blue1 border-none text-black btn-sm hover:text-white hover:bg-blue1 transition-all duration-300 "><i
                                class="bi bi-plus-circle-fill"></i></a>
                    </div>
                    <hr>
                </div>

            </div>

            <div class="flex flex-row mt-2 ml-4 mr-4 items-center">
                <div
                    class="ml-2 flex-none mr-5 hover:text-blue-600 transition-all {{ Request::is('user/dashboard') ? 'text-blue-600  ' : '' }}">
                    <a href="/user/dashboard">Saved</a>
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
            <form method="POST" action="/user/dashboard/update" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Pick a file</span>
                    </label>
                    <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="profile_picture"
                        id="imgInp" accept="image/png , image/jpeg" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" placeholder="Name" name="name" class="input input-bordered w-full max-w-xs"
                        value="{{ auth()->user()->name }}" required />

                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" name="username"
                        class="input input-bordered w-full max-w-xs" value="{{ auth()->user()->username }}" required />

                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" placeholder="Email" name="email"
                        class="input input-bordered w-full max-w-xs" value="{{ auth()->user()->email }}" required />

                </div>
                <div class="mt-5">
                    <input type="submit" class="btn btn-success place-self-end mt-3" value="Submit">
                </div>

            </form>
            </p>
        </div>
    </div>

</body>


<script>
    imgInp.onchange = evt => {
        const blah = document.getElementById('blah');

        blah.classList.remove('hidden');
        blah.classList.add('block');

        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

</html>
