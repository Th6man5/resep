@extends('dashboard.layouts.main')
@section('content')
    <p>{{ auth()->user()->name }}</p>
    <p>{{ auth()->user()->username }}</p>
    <a href="/dashboard/user/" class="btn btn-danger">Edit</a>
@endsection
