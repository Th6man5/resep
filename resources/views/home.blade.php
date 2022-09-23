@extends('layouts.main')
@section('content')

     <h1 class="text-center">FeastUP</h1>

     <div class="row justify-content-center">
    
  <div class="col-md-6">
    <form action="/posts">
      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
       @if (request('author '))
          <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
    <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
  <button class="btn btn-primary" type="button">Search</button>
</div>
    </form>
  </div>
</div>


<div class="container">
    <div class="row">
         @foreach ($recipe as $resep)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $resep->recipe_name }}</h5>
                    <p>{{ $resep->country->name }}</p>
                </div>
               
                    <img src="https://source.unsplash.com/500x500/?dog">
           
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection