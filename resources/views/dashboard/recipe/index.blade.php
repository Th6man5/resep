@extends('dashboard.layouts.main')
@section('content')




<div class="container mt-3">
    <div class="row">
         @foreach ($recipe as $resep)
        <div class="col-md-2 mb-4">
            <div class="card">
                    <img class="img-thumbnail" src="https://source.unsplash.com/500x500/?food">
                
                      <h6 class="text-center my-2">{{ $resep->recipe_name }}</h6>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection