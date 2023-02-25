@extends('dashboard.layouts.make')
@section('content')
    <form method="POST" action="/user/dashboard/recipe/{{ $recipe->id }}" enctype="multipart/form-data"
        class="grid grid-cols-1 lg:grid-cols-2 gap-4 relative">
        @csrf
        @method('PUT')

        <div class="mb-4 lg:mb-0 px-2 py-2">
            <div class="shadow">
                <input type="file" class="file-input border-none rounded-none w-full @error('image') is-invalid @enderror"
                    name="image" id="imgInp" value="{{ old('image') }}" accept="image/png , image/jpeg" required />
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @if ($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" id="blah" class=" object-cover mt-4 sticky top-24">
            @else
                <img id="blah" src="#" class="hidden mt-4 sticky top-24" />
            @endif

        </div>



        <div class=" rounded shadow-md bg-white">
            <div class="block m-4 ">
                <span class="block text-xl ml-2 text-center text-black">
                    Recipe Name
                </span>
                <input type="text" name="recipe_name" value="{{ old('recipe_name', $recipe->recipe_name) }}" required
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 "
                    placeholder="Example: Pineapple Pizza" />
                @error('name')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="block m-4 mt-4 ">
                <span class="block text-xl ml-2 text-center text-black">
                    About
                </span>
                <input type="text" name="about" placeholder="About this Recipe" required
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 "
                    value="{{ old('about', $recipe->about) }}" />
                @error('about')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <hr class="mt-6">

            <div class="block m-4 mt-4 ">
                <div class="grid grid-cols-2 items-center gap-4">

                    <div class="ml-5">
                        <span class=" text-lg  text-black">
                            Time <i class="bi bi-clock-fill"></i>
                    </div>

                    <div class="form-control">
                        <label class="input-group">
                            <input type="number" name="time" placeholder="Time" required
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 "
                                value="{{ old('time', $recipe->time) }}" />
                            <span class="mt-1 px-3 text-sm">Minutes</span>
                        </label>
                        @error('portion')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="ml-5">
                        <span class=" text-lg  text-black ">
                            Portion <i class="bi bi-person-fill"></i>

                    </div>

                    <div class="form-control">
                        <label class="input-group">
                            <input type="number" name="portion" placeholder="Portion" required
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 "
                                value="{{ old('portion', $recipe->portion) }}" />
                            <span class="mt-1 px-3 text-sm">People</span>
                        </label>
                        @error('portion')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="block m-4 mt-4 text-center">
                <span class="block text-xl ml-2 text-black">
                    Ingredients
                </span>
                <textarea type="text" name="ingredients" id="ingredients" placeholder="Ingredients">{{ old('ingredients', $recipe->ingredients) }}</textarea>
                @error('ingredients')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <hr>

            <div class="block m-4 mt-4 text-center">
                <span class="block text-xl ml-2 text-black">
                    Steps
                </span>
                <textarea type="text" name="steps" id="steps" placeholder="Burn for 30 minutes in the oven" required>{{ old('steps', $recipe->steps) }}</textarea>
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
                        </select>
                    </span>

                    <span class="block text-lg ml-2 text-black">
                        Country <i class="bi bi-flag-fill"></i>
                        <select type="text" name="country_id" placeholder="Country" required
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md text-sm focus:ring-1 ">
                            @foreach ($country as $con)
                                <option value="{{ $con->id }}">{{ old('country', $con->name) }}</option>
                            @endforeach
                        </select></span>
                </div>
            </div>
            <div class="text-right mb-4 mr-4">
                <input type="submit"
                    class="btn bg-success text-black hover:bg-green3 hover:scale-105 btn-md mt-3 rounded-md border-none"
                    value="Submit">
            </div>
        </div>
    </form>
    </div>


    </main>
    <script>
        imgInp.onchange = evt => {
            const blah = document.getElementById('blah');

            blah.classList.remove('hidden');
            blah.classList.add('block');

            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>


    <script>
        ClassicEditor.create(document.querySelector('#ingredients'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).then(editor => {
            // get the existing value
            const existingValue = "{!! old('ingredients', $recipe->ingredients) !!}"; // replace with your actual variable name

            // set the value in the editor
            editor.setData(existingValue);
        }).catch(error => {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector('#steps'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).then(editor2 => {
            // get the existing value
            const existingValue = "{!! old('ingredients', $recipe->steps) !!}"; // replace with your actual variable name

            // set the value in the editor
            editor2.setData(existingValue);
        }).catch(error => {
            console.error(error);
        });
    </script>
@endsection
