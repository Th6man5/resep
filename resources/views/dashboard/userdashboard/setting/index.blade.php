@extends('dashboard.layouts.make')
@section('content')
    <main class="px-10 py-6 ">
        <div class="shadow-lg p-2 text-center bg-white">
            <h3 class="mb-10 mt-6 text-4xl uppercase font-bold">Settings</h3>
            <a href="{{ route('user.password.show') }}"
                class="btn  bg-green3 border-none text-black hover:bg-green3 hover:scale-105 rounded-md mb-5">
                Change Password
            </a>
            <form class="mb-4" action="/logout" method="post">
                @csrf
                <button class="btn bg-red1 border-none text-black hover:bg-red2 hover:scale-105 rounded-md"
                    type="submit">Logout</button>
            </form>
        </div>
    </main>
@endsection
