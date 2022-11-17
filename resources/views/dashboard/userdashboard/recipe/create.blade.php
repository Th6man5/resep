@extends('dashboard.layouts.make')
@section('content')
    <form method="POST" action="/user/dashboard/recipe" enctype="multipart/form-data">
        @csrf
        <main class="px-10 py-6 ">
            <div class="grid lg:grid-cols-2 gap-10 relative">
                <div class="rounded" style="margin-bottom: -3px">
                    <div class="sticky top-0 shadow-md" style="top: 100px">
                        <input type="file"
                            class="file-input file-input-ghost rounded-none w-full max-w-xs @error('image') is-invalid @enderror"
                            name="image" id="imgInp" value="{{ old('image') }}" accept="image/png , image/jpeg"
                            required />
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <img id="blah" src="#" />
                    </div>
                </div>
                <div class=" rounded border-2  shadow-md">
                    <div class="block m-4 ">
                        <span class="block text-xl ml-2 text-center text-black">
                            Recipe Name
                        </span>
                        <input type="text" name="recipe_name" value="{{ old('recipe_name') }}" required
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 "
                            placeholder="Example: Pineapple Pizza" />
                    </div>

                    <div class="block m-4 mt-4 ">
                        <span class="block text-xl ml-2 text-black">
                            About
                        </span>
                        <input type="text" name="about" placeholder="About this Recipe" required
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 " />
                    </div>

                    <hr class="mt-6">

                    <div class="block m-4 mt-4 ">
                        <div class="grid grid-cols-2 text-center">
                            <span class="block text-lg  text-black">
                                Time <i class="bi bi-clock-fill"></i>
                                <input type="text" name="time" placeholder="Time" required
                                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 " /></span>

                            <span class="block text-lg ml-2 text-black">
                                Portion <i class="bi bi-person-fill"></i>
                                <input type="text" name="portion" placeholder="Portion" required
                                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 " /></span>
                        </div>
                    </div>

                    <div class="block m-4 mt-4 text-center">
                        <span class="block text-xl ml-2 text-black">
                            Ingredients
                        </span>
                        <textarea type="text" name="ingredients" placeholder="Ingredients" required
                            class="mt-1 px-2 py-1 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 "></textarea>

                    </div>

                    <hr>

                    <div class="block m-4 mt-4 text-center">
                        <span class="block text-xl ml-2 text-black">
                            Steps
                        </span>
                        <textarea type="text" name="steps" placeholder="Burn for 30 minutes in the oven" required
                            class="mt-1 px-2 py-1 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 "></textarea>
                    </div>

                    <div class="block m-4 mt-4 ">
                        <div class="grid grid-cols-2 text-center">
                            <span class="block text-lg text-black">
                                Category <i class="bi bi-tag-fill"></i>
                                <select type="text" name="category_id" placeholder="category" required
                                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 ">

                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select></span>

                            <span class="block text-lg ml-2 text-black">
                                Country <i class="bi bi-flag-fill"></i>
                                <select type="text" name="country_id" placeholder="Country" required
                                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 ">
                                    @foreach ($country as $con)
                                        <option value="{{ $con->id }}">{{ $con->name }}</option>
                                    @endforeach
                                </select></span>
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <input type="submit" class="btn btn-primary mt-3 rounded-md" value="Submit">
                    </div>
                </div>
            </div>


        </main>
    </form>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
