<div class="navbar sticky top-0 z-50 shadow bg-green1" id="navbar">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case font-bold text-xl" href="/">Mealsup</a>
    </div>
    <div class="flex-none mr-2">
        <ul class="menu menu-horizontal p-0">


            @auth
                <li class="rounded-lg active:bg-green3  {{ $active === 'recipe' ? 'text-white' : '' }}"><a
                        href="/user/dashboard/recipe">Recipe</a></li>

                <li class="rounded-lg {{ $active === 'recipe' ? 'text-white' : '' }}"><a
                        href="/admin/dashboard/recipe">admin</a></li>

                <div class="dropdown dropdown-end me-3">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/80/80/people" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-black text-white rounded-box w-52">

                        <li class="hover:bg-slate-500 transition-all"><a
                                class="active:bg-slate-500 active:text-white w-full" href="/user/dashboard">My
                                Dashboard</a></li>

                        <li class="hover:bg-red-500 transition-all ">
                            <form class="active:bg-red-500 active:text-white w-full" action="/logout" method="post">
                                @csrf
                                <button class="active:bg-red-500 active:text-white" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link rounded-lg{{ $active === 'login' ? 'text-white bg-green1 ' : '' }}">
                        Login</a>
                </li>
            </ul>
        @endauth
    </div>
</div>
