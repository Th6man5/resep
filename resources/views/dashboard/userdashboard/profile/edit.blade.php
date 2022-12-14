@extends('dashboard.layouts.make')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-error mt-3" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <form method="POST" action="/user/dashboard/update">
        @csrf
        @method('PUT')
        <label class="form-label">Name</label>
        <input type="text" name="name" placeholder="Recipe Name" class="form-control" value="{{ auth()->user()->name }}"
            required>
        @error('name')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror

        <label class="form-label">Username</label>
        <input type="text" name="username" placeholder="Recipe Name" class="form-control"
            value="{{ auth()->user()->username }}" required>

        @error('username')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror

        <label class="form-label">Email</label>
        <input type="email" name="email" placeholder="Recipe Name" class="form-control"
            value="{{ auth()->user()->email }}" required>

        @error('email')
            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
        @enderror


        <input type="submit" class="btn btn-primary mt-3" value="Submit">
    </form>
@endsection
