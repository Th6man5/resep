@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
         @foreach ($recipe as $resep)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $resep->recipe_name }}</h5>
                </div>
                <div class="card-body">
                    {!! $resep->description !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection