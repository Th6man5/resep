@extends('dashboard.layouts.admin.main')
@section('container')
    <div id="content" class="bg-black col-span-9  p-6">
        <div>
            <h1 class="font-bold py-4 uppercase">Categories Data</h1>
            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div>
                            <i class="bi bi-tags text-3xl"></i>
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


                @error('name')
                    <div class="bg-red-500 p-6 rounded-lg">
                        <div class="flex flex-row space-x-4 items-center m-auto">
                            <div id="stats-1">
                                <i class="bi bi-exclamation-octagon text-3xl"></i>
                            </div>
                            <div>
                                {{ $message }}
                            </div>
                        </div>
                    </div>
                @enderror

                @if (session()->has('success'))
                    <div class="bg-green-500 p-6 rounded-lg">
                        <div class="flex flex-row space-x-4 items-center m-auto">
                            <div id="stats-1">
                                <i class="bi bi-check-circle text-3xl"></i>
                            </div>
                            <div>
                                {!! session('success') !!}
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </div>
        <div class="py-6">

            <div>
                <div class="grid grid-cols-2 place-items-start">
                    <h1 class="font-bold py-4 items-center uppercase">Recipes</h1>
                    <label for="add-category" href="#addcategory"
                        class="btn btn-md py-4 justify-self-end text-xs bg-blue1 text-white hover:bg-blue-800">Add
                        Category</label>
                </div>

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
                                    <div class="inline-flex items-center space-x-1">
                                        <label for="edit-category-{{ $cat->id }}">
                                            <i tabindex="0" title="Edit"
                                                class="hover:text-indigo-400 bi bi-pencil w-5 h-5"></i>
                                        </label>
                                        <form action="/admin/dashboard/category/{{ $cat->id }}"
                                            onsubmit="return confirm('are you sure you want to delete this?');"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button title="Delete" class="hover:text-red-400">
                                                <i class="bi bi-x-circle w-5 h-5"></i>
                                            </button>
                                        </form>

                                        {{-- Modal for the edit --}}

                                        <input type="checkbox" id="edit-category-{{ $cat->id }}"
                                            class="modal-toggle" />
                                        <div class="modal text-start">
                                            <div class="modal-box relative bg-slate-900">
                                                <label for="edit-category-{{ $cat->id }}"
                                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                                <h3 class="font-bold text-lg">Edit Category </h3>
                                                <p class="py-4">
                                                <form method="POST" action="/admin/dashboard/category/update">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="category_id" value="{{ $cat->id }}" />
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" placeholder="Name"
                                                        class="form-control p-1 rounded-lg "
                                                        value="{{ old('name', $cat->name) }}" required>
                                                    @error('name')
                                                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                                    @enderror
                                                    <div class="modal-action">
                                                        <input type="submit" class="btn btn-primary btn-md mt-3"
                                                            value="Submit">
                                                    </div>
                                                </form>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach



                    </table>

                    <input type="checkbox" id="add-category" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box relative bg-slate-900">
                            <label for="add-category" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                            <h3 class="font-bold text-lg">Add Category </h3>
                            <p class="py-4">
                            <form method="POST" action="/admin/dashboard/category">
                                @csrf

                                <label class="form-label">Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control p-1 rounded-lg "
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                @enderror


                                <div class="modal-action">
                                    <input type="submit" class="btn btn-primary btn-md mt-3" value="Submit">
                                </div>
                            </form>
                            </p>
                        </div>
                    </div>


                    {{ $category->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
