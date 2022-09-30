@extends('layouts.main')
@section('content')


<div class="container-sm">
    <div class="card">
  
      <div class="d-flex mb-3">
  <div class="p-2 m-3"><img src="https://source.unsplash.com/500x500/?user" width="200" class="rounded-circle img-thumbnail" /></div>
   <div class="me-auto p-2 mt-5"> <h3>{{ auth()->user()->name }}</h3>
          <p><small class="text-muted">#{{ auth()->user()->username }}</small></p></div>
  <div class="p-2 mt-5"><a href="#" class="btn btn-success">EDIT</a></div>
  <div class="p-2 mt-5 me-2"><a href="#" class="btn btn-secondary">SETTINGS</a></div>  
</div>
      <div class="d-flex flex-row mb-2 ms-4">
  <div class="p-2">Saved</div>
  <div class="p-2"><a href="/recipe">My Recipe</a></div>
</div>
 
    </div>
</div>

<div class="container mt-5">
    <div class="row">
         @foreach ($recipe as $resep)
        <div class="col-md-2 mb-4">
            <div class="card">
                    <img src="https://source.unsplash.com/500x500/?food">
                
                      <h5 class="text-center my-2">{{ $resep->recipe_name }}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
Hello
@endsection