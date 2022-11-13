@extends('dashboard.layouts.main')
@section('content')
    <form method="POST" action="/dashboard/recipe" enctype="multipart/form-data">
        @csrf
        <div class="container-sm">
            <div class="row">
                <div class="col-md-6" style="margin-bottom: -3px">
                    <div class="position-sticky" style="top: 100px">
                        <div class="card shadow-sm" id="img">

                            {{-- Image Input --}}
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="imgInp" value="{{ old('image') }}" accept="image/png , image/jpeg" required>

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <img id="blah" src="#" alt="your image" />
                        </div>
                    </div>
                </div>



                <div class="col-md-6 text-center">

                    <div class="card mb-3 shadow-sm">
                        <div class="text-start">
                            <div class="card-body">


                                <label class="form-label">Recipe Name</label>
                                <input type="text" name="recipe_name" placeholder="Example: Pineapple Pizza"
                                    id="" class="form-control" value="{{ old('recipe_name') }}" required>

                                <label class="form-label mt-2">About</label>
                                <input type="text" name="about" placeholder="About" id="" class="form-control"
                                    required>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm">
                        <div class="text-start">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Time <i class="bi bi-clock-fill"></i></label>
                                        <input type="text" name="time" placeholder="1 jam 20 menit"
                                            class="form-control" required>
                                    </div>

                                    <div class="col">
                                        <label class="form-label">Portion <i class="bi bi-person-fill"></i></label>
                                        <input type="text" name="portion" placeholder="2 person" class="form-control"
                                            required>
                                    </div>

                                </div>

                                <label class="form-label mt-2">Ingredients</label>
                                <textarea type="text" name="ingredients" rows="3" placeholder="Ingredients" id="" class="form-control"
                                    required></textarea>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Launch static backdrop modal
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 shadow-sm">
                        <div class="text-start">
                            <div class="card-body">
                                <label class="form-label">Steps</label>
                                <textarea type="text" name="steps" rows="3" placeholder="Burn for 30 minutes in the oven" id=""
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm">
                        <div class="text-start">
                            <div class="card-body">

                                <label class="form-label mt-2">Country</label>
                                <select class="form-select" name="country_id" required>
                                    @foreach ($country as $con)
                                        <option value="{{ $con->id }}">{{ $con->name }}</option>
                                    @endforeach
                                </select>

                                <label class="form-label mt-2">Category</label>
                                <select class="form-select" name="category_id" required>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Submit">

                </div>
    </form>
    </div>
    </div>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
