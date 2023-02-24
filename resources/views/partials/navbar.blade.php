<style>
    #navbar {
        background-blend-mode: multiply;
        background-image: url("{{ asset('img/flower.png') }}");
        background-repeat: repeat;

    }

    @media print {
        #navbar {
            display: none;
        }
    }
</style>


<div class="navbar sticky top-0 z-50 shadow bg-primary1" id="navbar">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case font-bold text-xl" href="/">Mealsup</a>
    </div>
    <div class="flex-none mr-2">
        <ul class="menu menu-horizontal p-0">


            @auth

                <li class="rounded-lg  {{ $active === 'recipe' ? 'text-white' : '' }}"><a href="/user/dashboard/recipe"
                        class="active:bg-secondary1 ">Recipe</a></li>

                @if (auth()->user()->is_admin)
                    <li class="rounded-lg"><a href="/admin/dashboard" class="active:bg-secondary1">admin</a></li>
                @endif

                <div class="dropdown dropdown-end me-3">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            @if (auth()->user()->profile_picture)
                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" />
                            @else
                                <img src="https://placeimg.com/192/192/arch" />
                            @endif
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
                    <a href="/login"
                        class="active:bg-secondary1 nav-link rounded-lg{{ $active === 'login' ? 'text-white ' : '' }}">
                        Login</a>
                </li>
            @endauth
        </ul>

    </div>
</div>
