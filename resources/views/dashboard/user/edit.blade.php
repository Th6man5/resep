@extends('dashboard.layouts.main')
@section('content')
    <form method="POST" action="/dashboard/user/edit/">
        @csrf
        @method('PUT')
        <label class="form-label">Name</label>
        <input type="text" name="name" placeholder="Name" id="" class="form-control" value="{{ $user->name }}"
            required>

        <label class="form-label mt-2">Username</label>
        <input type="text" name="username" placeholder="Username" id="" class="form-control"
            value="{{ $user->username }}" required>
        <input type="submit" class="btn btn-primary mt-3" value="Submit">
    </form>
@endsection
