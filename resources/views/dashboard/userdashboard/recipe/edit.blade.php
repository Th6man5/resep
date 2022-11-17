@extends('dashboard.layouts.make')
@section('content')
    <div class="container-sm">
        <form method="POST" action="/user/dashboard/recipe/{{ $recipe->id }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6" style="margin-bottom: -3px">
                    <div class="position-sticky" style="top: 100px">
                        <div class="card shadow-sm" id="img" style="width: 500px; height: 500px;">
                            <a class="btn btn-primary" href="#">Add Picture</a>
                        </div>
                    </div>
                </div>



                <div class="col-md-6 text-center">

                    <div class="card mb-3 shadow-sm">
                        <div class="text-start">
                            <div class="card-body">
                                <form method="POST" action="/user/dashboard/recipe">
                                    @csrf

                                    <label class="form-label">Recipe Name</label>
                                    <input type="text" name="recipe_name" placeholder="Recipe Name" id=""
                                        class="form-control" value="{{ $recipe->recipe_name }}" required>

                                    <label class="form-label mt-2">About</label>
                                    <input type="text" name="about" placeholder="About" id=""
                                        class="form-control" value="{{ $recipe->about }}" required>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm">
                        <div class="text-start">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Time <i class="bi bi-clock-fill"></i></label>
                                        <input type="text" name="time" placeholder="Time" class="form-control"
                                            value="{{ $recipe->time }}" required>
                                    </div>

                                    <div class="col">
                                        <label class="form-label">Portion <i class="bi bi-person-fill"></i></label>
                                        <input type="text" name="portion" placeholder="Portion" class="form-control"
                                            value="{{ $recipe->portion }}" required>
                                    </div>

                                </div>

                                <label class="form-label mt-2">Ingredients</label>
                                <textarea type="text" name="ingredients" rows="3" placeholder="Ingredients" id="" class="form-control"
                                    value="{{ $recipe->about }}" required>{{ $recipe->ingredients }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 shadow-sm">
                        <div class="text-start">
                            <div class="card-body">
                                <label class="form-label">Steps</label>
                                <textarea type="text" name="steps" rows="3" placeholder="Steps" id="" class="form-control">{{ $recipe->steps }}</textarea>
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
@endsection
