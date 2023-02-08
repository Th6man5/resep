@extends('dashboard.layouts.admin.main')
@section('container')
    <div id="content" class="bg-black col-span-9  p-6">
        <div>
            <h1 class="font-bold py-4 uppercase">Categories Data</h1>
            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-1">
                            <i class="bi bi-card-text text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-blue-400
                                text-sm font-medium uppercase leading-4">
                                Total Category</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $category->total() }}</span>
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
                <h1 class="font-bold py-4 uppercase">Recipes</h1>
                <div class="overflow-x-auto overflow-hidden">
                    <table class="w-full whitespace-nowrap">
                        <thead class="bg-white/10 ">
                            <th class="text-left py-3 px-2 rounded-l-lg">#</th>
                            <th class="text-center py-3 px-2">Name</th>
                            <th class="text-center py-3 px-2 rounded-r-lg">Actions</th>
                        </thead>
                        @foreach ($category as $cat)
                            <tr class="border-b border-gray-700">
                                <td class="py-3 px-2 font-bold">
                                    {{ $loop->iteration + $category->firstItem() - 1 }}
                                </td>
                                <td class="text-center py-3 px-2">{{ $cat->name }}</td>
                                <td class="text-center py-3 px-2">

                                    <div class="inline-flex items-center text-center space-x-1">
                                        <div class="dropdown dropdown-left">
                                            <i tabindex="0" title="Edit"
                                                class="hover:text-indigo-400
                                                bi bi-pencil w-5 h-5"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </table>
                    {{ $category->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
