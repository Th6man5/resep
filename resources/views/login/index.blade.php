@extends('layouts.main')

@section('content')
    <div class="mx-6 my-14 bg-white p-10  shadow-lg rounded-lg ">
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

        @if (session()->has('success'))
            <div class="alert alert-success shadow-none rounded-lg transition-all">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-5">
                <img src="/img/undraw_breakfast_psiw-removebg-preview.png" class="w-full" alt="food image" />
            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20">

                <form action="/login" method="POST">
                    @csrf
                    <!-- Email input -->
                    <div class="mb-6">
                        <input type="email" name="email"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none @error('email') is-invalid @enderror"
                            placeholder="Email address" autofocus required />
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
                            placeholder="Password" required />
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <a href="#!"
                            class="text-green1 hover:text-green2 focus:text-green-700 active:text-green-800 duration-200 transition ease-in-out">Forgot
                            password?</a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit"
                        class="inline-block px-7 py-3 bg-green1 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-green2 hover:shadow-lg focus:bg-green2 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green2 active:shadow-lg transition duration-150 ease-in-out w-full">
                        Sign in
                    </button>
                    <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                        Don't have an account?
                        <a href="/register"
                            class="text-green-600 hover:text-green-700 focus:text-green-700 transition duration-200 ease-in-out">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>


    {{-- <main class="form-signin w-100 m-auto text-center">
        <form action="/login" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-2">Not registered? <a href="/register">Register Now!</a></small>
    </main> --}}
@endsection
