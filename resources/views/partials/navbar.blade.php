<style>
    nav {
        background: rgb(204, 8, 11);
        background: linear-gradient(90deg, rgba(204, 8, 11, 1) 10%, rgba(242, 91, 10, 1) 25%, rgba(242, 91, 10, 1) 75%, rgba(204, 8, 11, 1) 90%);

    }

    .navbar-brand {
        font-family: 'Fira Sans', sans-serif;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark  sticky-top shadow">
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
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item me-2">
                        <a class="nav-link {{ $active === 'recipe' ? 'active' : '' }}" href="/dashboard/recipe">Recipe</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="image rounded-circle me-2" src="https://source.unsplash.com/30x30/?user"
                                alt="Logo" width="25" height="25">
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
    </div>
</nav>
