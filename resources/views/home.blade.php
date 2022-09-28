@extends('layouts.main')
@section('content')

     <h1 class="text-center">MEALSUP</h1>

     {{-- <div class="row justify-content-center">
    
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
</div> --}}
@guest

<div class="container text-center">
<h4>Not Logged In</h4>

</div>

@endguest

@auth
<div class="container">
    <div class="row">
         @foreach ($recipe as $resep)
        <div class="col-md-3 mb-4">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $resep->recipe_name }}</h5>
                    <h5>Daerah</h5>
                    <p>{{ $resep->country->name }}</p>
                    <h5>Tentang</h5>
                    <p>{{ $resep->about }}</p>
                    <h5>Langkah</h5>
                    <p>{{ $resep->steps }}</p>
                    <h5>Bahan</h5>
                    <p>{{ $resep->ingredients }}</p>
                </div> --}}
                    <img src="https://source.unsplash.com/500x500/?food">
                
                      <h5 class="text-center my-2">{{ $resep->recipe_name }}</h5>
                      <p class="text-center">{{ $resep->category->name }}</p>
                
            </div>
        </div>
        @endforeach
    </div>
</div>
@endauth
@endsection