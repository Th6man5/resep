<div class="navbar sticky top-0 z-50 shadow bg-green1" id="navbar">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case font-bold text-xl" href="/">Mealsup</a>
    </div>
    <div class="flex-none mr-2">
        <ul class="menu menu-horizontal p-0">


            @auth

                <li class="rounded-lg active:bg-green3  {{ $active === 'recipe' ? 'text-white' : '' }}"><a
                        href="/user/dashboard/recipe" class="active:bg-green3 ">Recipe</a></li>

                @if (auth()->user()->is_admin)
                    <li class="rounded-lg {{ $active === 'recipe' ? 'text-white' : '' }}"><a href="/admin/dashboard/recipe"
                            class="active:bg-green3">admin</a></li>
                @endif

                <div class="dropdown dropdown-end me-3">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-black text-white rounded-box w-52">

                        <li class="hover:bg-slate-500 transition-all "><a
                                class="active:bg-slate-500 active:text-white w-full" href="/user/dashboard">My
                                Dashboard</a></li>

                        <li class="hover:bg-red-500 transition-all ">
                            <form class="active:bg-red-500 active:text-white w-full" action="/logout" method="post">
                                @csrf
                                <button class=" active:text-white w-full text-left" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link rounded-lg{{ $active === 'login' ? 'text-white bg-green1 ' : '' }}">
                        Login</a>
                </li>
            @endauth
        </ul>

    </div>
</div>
{{-- <header class="sticky top-0 z-50 ">
    <nav class="flex flex-wrap items-center justify-between w-full py-4 md:py-0 px-6 text-lg text-gray-700 bg-green1 ">
        <div>
            <a href="/" class="hover:text-white text-black transition-all">
                Mealsup
            </a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block "
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

        <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
            <ul class="pt-4 text-base text-black md:flex md:justify-between md:pt-0">
                @auth
                    <li>
                        <a class="md:p-4 py-2 block hover:text-white  transition-all"
                            href="/user/dashboard/recipe">Recipe</a>
                    </li>
                    @if (auth()->user()->is_admin)
                        <li>
                            <a class="md:p-4 py-2 block hover:text-white  transition-all" href="/admin/dashboard/">Admin</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a class="md:p-4 py-2 block hover:text-white  transition-all" href="#">Sign
                            In</a>
                    </li>
                </ul>
            @endauth
        </div>
    </nav>
</header>

<script>
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');


    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script> --}}
