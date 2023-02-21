@extends('dashboard.layouts.make')
@section('content')
    <div class="bg-white p-10 rounded-xl">
        <form method="POST" action="{{ route('user.password.update') }}">
            @csrf
            <div class="grid grid-rows-3 lg:grid-cols-3 gap-2 p-10">

                <div class="form-control w-full max-w-xs">
                    <label class="label" for="current_password">
                        <span class="label-text">Current Password</span>
                    </label>
                    <input type="password" name="current_password" placeholder="Type here"
                        class="input input-bordered w-full max-w-xs" />
                    @error('current_password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label" for="password">
                            <span class="label-text">New Password</span>
                        </label>
                        <input type="password" name="password" placeholder="Type here"
                            class="input input-bordered w-full max-w-xs" />
                        @error('current_password')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label" for="password_confirmation">
                            <span class="label-text">Confirm Password</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Type here"
                            class="input input-bordered w-full max-w-xs" />
                    </div>
                </div>

            </div>

            <div class="p-5">
                <button type="submit" class="btn bg-success text-white hover:bg-success border-none">Change
                    Password</button>
                <a type="button" class="mt-2 btn bg-error text-white hover:bg-error border-none"
                    href="{{ route('user.settings.index') }}">Go back</a>
            </div>

        </form>
    </div>
@endsection
