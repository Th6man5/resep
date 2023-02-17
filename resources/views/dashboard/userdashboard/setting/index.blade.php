@extends('dashboard.layouts.make')
@section('content')
    <main class="px-10 py-6">
        <div class="shadow-lg p-2 text-center">
            <h3 class="mb-10 mt-6 text-4xl uppercase font-bold">Settings</h3>
            <button class="btn  bg-green1 border-none text-black hover:bg-green3 hover:scale-105 rounded-md mb-5">
                Change Password
            </button>
            <form class="mb-4" action="/logout" method="post">
                @csrf
                <button class="btn bg-red1 border-none text-black hover:bg-red2 hover:scale-105 rounded-md"
                    type="submit">Logout</button>
            </form>
        </div>
    </main>
@endsection
