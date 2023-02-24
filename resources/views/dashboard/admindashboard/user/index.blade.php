@extends('dashboard.layouts.admin.main')
@section('container')
    <div id="content" class="bg-black col-span-9  p-6">
        <div>
            <h1 class="font-bold py-4 uppercase">Users Data</h1>
            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-1">
                            <i class="bi bi-people text-3xl"></i>
                        </div>
                        <div>
                            <p
                                class="text-indigo-300
                                text-sm font-medium uppercase leading-4">
                                Total Users</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $user->where('is_admin', false)->count() }}</span>
                            </p>

                        </div>
                    </div>

                </div>
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-1">
                            <i class="bi bi-person text-3xl"></i>
                        </div>
                        <div>
                            <p
                                class="text-lime-500
                                text-sm font-medium uppercase leading-4">
                                Total Admins</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $user->where('is_admin', true)->count() }}
                                </span>
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

            <div id="last-users">
                <div class="flex mb-5">
                    <h1 class="font-bold py-4 uppercase">Users</h1>
                    <div class="ml-auto">
                        <form action="/admin/dashboard/user">

                            <div class="input-group">
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
                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap mb-5">
                        <thead class="bg-white/10">
                            <th class="text-left py-3 px-2 rounded-l-lg">#</th>
                            <th class="text-left py-3 px-2">Name</th>
                            <th class="text-left py-3 px-2">Username</th>
                            <th class="text-left py-3 px-2">Email</th>
                            <th class="text-left py-3 px-2 rounded-r-lg">Actions</th>
                        </thead>
                        @foreach ($user as $use)
                            @if ($use->is_admin)
                                @continue
                            @endif
                            <tr class="border-b border-gray-700">
                                <td class="py-3 px-2 font-bold">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="py-3 px-2">{{ $use->name }}</td>
                                <td class="py-3 px-2">{{ $use->username }}</td>
                                <td class="py-3 px-2">{{ $use->email }}</td>

                                <td class="py-3 px-2">

                                    <div class="inline-flex items-center space-x-1">
                                        <div class="dropdown dropdown-top dropdown-left">
                                            <i tabindex="0" title="Show"
                                                class="hover:text-indigo-400
                                                bi bi-eye w-5 h-5"></i>
                                            <ul tabindex="0"
                                                class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a href="/maker/{{ $use->id }}" class="hover:text-indigo-400">Show
                                                        User</a></li>
                                            </ul>
                                        </div>
                                        <form action="/admin/dashboard/user/{{ $use->id }}"
                                            onsubmit="return confirm('are you sure you want to delete this?');"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button title="Delete" class="hover:text-red-400">
                                                <i class="bi bi-x-circle w-5 h-5"></i>
                                            </button>
                                        </form>
                                    </div>
                        @endforeach
                    </table>
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
