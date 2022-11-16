<style>
    /* #navbarmain {
        background: rgb(204, 8, 11);
        background: linear-gradient(90deg, rgba(204, 8, 11, 1) 10%, rgba(242, 91, 10, 1) 25%, rgba(242, 91, 10, 1) 75%, rgba(204, 8, 11, 1) 90%);

    }

    .navbar-brand {
        font-family: 'Fira Sans', sans-serif;
    }

    #navbar {
        z-index: 10000;
    } */
</style>

<div class="navbar bg-green-400 sticky top-0 z-50 shadow" id="navbar ">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl" href="/">Mealsup</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal p-0">


            @auth
                <li class="text-white"><a href="/user/dashboard/recipe">Recipe</a></li>
                <div class="dropdown dropdown-end me-3">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/80/80/people" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-black text-white rounded-box w-52">

                        <li class="hover:bg-slate-500 transition-all"><a class="active:bg-slate-500 active:text-white"
                                href="/user/dashboard">My
                                Dashboard</a></li>

                        <li class="hover:bg-red-500 transition-all">
                            <form class="active:bg-red-500 active:text-white" action="/logout" method="post">
                                @csrf
                                <button class="active:bg-red-500 active:text-white" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"> Login</a>
                </li>
            </ul>
        @endauth
    </div>
</div>
{{-- <nav id="navbarmain"class="navbar navbar-expand-lg navbar-dark  sticky-top shadow">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="/img/mealsuplogo.png" width="30" height="24"
                class="d-inline-block align-text-top me-2">MEALSUP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                {{-- <li class="nav-item">
            <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About</a>
          </li> --}}
{{-- </ul>
<ul class="navbar-nav ms-auto">
    @auth
        <li class="nav-item me-2">
            <a class="nav-link {{ $active === 'recipe' ? 'active' : '' }}" href="/dashboard/recipe">Recipe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $active === 'report' ? 'active' : '' }}" href="/dashboard/report">Report</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img class="image rounded-circle me-2" src="https://source.unsplash.com/30x30/?user" alt="Logo"
                    width="25" height="25">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                        My Dashboard</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                            Logout</a>
                </li></button>
                </form>
        </li>
    </ul>
@else
    <li class="nav-item">
        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"> Login</a>
    </li>
    </ul>
@endauth
</div>
</div> --}}
