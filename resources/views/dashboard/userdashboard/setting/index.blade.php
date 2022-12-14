@extends('dashboard.layouts.make')
@section('content')
    <main class="px-10 py-6">
        <div class="bg-base-200 p-2 text-center">
            <h3 class="mb-10 mt-6 text-4xl">Settings</h3>
            <form class="mb-4" action="/logout" method="post">
                @csrf
                <a class="btn btn-secondary">
                    <button class="" type="submit">Logout</button>
                </a>
            </form>
        </div>
    </main>
@endsection
