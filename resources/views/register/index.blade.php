@extends('layouts.main')
@section('content')
    <div class="mx-6 my-14 bg-white p-10  shadow-lg rounded-lg">
        @if (session()->has('loginError'))
            <div class="alert alert-error shadow-none rounded-lg transition-all">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ session('loginError') }}</span>
                </div>
            </div>
        @endif
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-5">
                <img src="/img/undraw_breakfast_psiw-removebg-preview.png" class="w-full" alt="food image" />
            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20">

                <form action="/register" method="POST" autocomplete="off">
                    @csrf

                    <div class="mb-6">
                        <input type="text" name="name"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none"
                            placeholder="Name" required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" name="username"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none"
                            placeholder="Username" required value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="email" name="email"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none "
                            placeholder="name@example.com" autofocus required value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input type="password" name="password"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none"
                            placeholder="Password" required value="{{ old('password') }}" />
                        @error('password')
                            <div class="text-gray-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit"
                        class="inline-block px-7 py-3 bg-green1 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-green2 hover:shadow-lg focus:bg-green2 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green2 active:shadow-lg transition duration-150 ease-in-out w-full"
                        data-mdb-ripple="true" data-mdb-ripple-color="light">
                        Sign up
                    </button>
                    <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                        Already registered?
                        <a href="/login"
                            class="text-green-600 hover:text-green-700 focus:text-green-700 transition duration-200 ease-in-out">Login
                            Now!</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name"
                            class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                            placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required value="{{ old('password') }}">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-2">Already registered? <a href="/login">Login Now!</a></small>
            </main>
        </div>
    </div> --}}
@endsection
