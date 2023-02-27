@extends('dashboard.layouts.admin.main')
@section('container')
    <div id="content" class="bg-black col-span-9  p-6">
        <div>
            <h1 class="font-bold py-4 uppercase">Recipes Data</h1>
            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div>
                            <i class="bi bi-card-text text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-teal-300
                                text-sm font-medium uppercase leading-4">
                                Total Recipes</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $recipe->total() }}</span>
                            </p>
                        </div>
                    </div>
                </div>



                @if (session()->has('delete'))
                    <div class="bg-red-500 p-6 rounded-lg">
                        <div class="flex flex-row space-x-4 items-center m-auto">
                            <div id="stats-1">
                                <i class="bi bi-exclamation-octagon text-3xl"></i>
                            </div>
                            <div>
                                {{ session('delete') }}
                            </div>
                        </div>
                @endif
            </div>

        </div>
        <div class="py-6">

            <div>
                <div class="flex mb-5">
                    <h1 class="font-bold py-4 uppercase">Recipes</h1>
                    <div class="ml-auto">
                        <form action="/admin/dashboard/recipe">

                            <div class="input-group ml-2">
                                <label class="relative block ">
                                    <input type="text" placeholder="Search..." name="search"
                                        class="input input-bordered rounded-none rounded-l-2xl w-full max-w-xs "
                                        value="{{ request('search') }}" />
                                </label>
                                <button class="btn bg-primary1 text-black border-none hover:bg-secondary1 "
                                    type="submit">Search</button>
                            </div>


                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto overflow-hidden">
                    <table class="w-full whitespace-nowrap">
                        <thead class="bg-white/10 ">
                            <th class="text-left py-3 px-2 rounded-l-lg">#</th>
                            <th class="text-left py-3 px-2">Recipe Name</th>
                            <th class="text-left py-3 px-2">Username</th>
                            <th class="text-left py-3 px-2">Reads</th>
                            <th class="text-left py-3 px-2 rounded-r-lg">Actions</th>
                        </thead>
                        @if ($recipe->count())
                            @foreach ($recipe as $resep)
                                <tr class="border-b border-gray-700">
                                    <td class="py-3 px-2 font-bold">
                                        {{ $loop->iteration + $recipe->firstItem() - 1 }}
                                    </td>
                                    <td class="py-3 px-2">{{ $resep->recipe_name }}</td>
                                    <td class="py-3 px-2">{{ $resep->maker->username }}</td>
                                    <td class="py-3 px-2">{{ $resep->views->count() }}</td>
                                    <td class="py-3 px-2">

                                        <div class="inline-flex items-center space-x-1">
                                            <div class="dropdown dropdown-left">
                                                <i tabindex="0" title="Show"
                                                    class="hover:text-indigo-400
                                                bi bi-eye w-5 h-5"></i>
                                                <ul tabindex="0"
                                                    class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                                    <li><a href="/maker/{{ $resep->maker->id }}"
                                                            class="hover:text-indigo-400">Show User</a></li>
                                                    <li><a href="/{{ $resep->id }}" class="hover:text-indigo-400">Show
                                                            Recipe</a></li>
                                                </ul>
                                            </div>
                                            <form onsubmit="return confirm('are you sure you want to delete this?');"
                                                action="/admin/dashboard/recipe/{{ $resep->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button title="Delete" class="hover:text-red-400">
                                                    <i class="bi bi-x-circle w-5 h-5"></i>
                                                </button>
                                            </form>
                                        </div>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center py-4 text-xl">Not Found</td>
                            </tr>
                        @endif


                    </table>
                    {{ $recipe->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
