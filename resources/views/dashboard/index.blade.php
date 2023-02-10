@extends('dashboard.layouts.main')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success shadow-none sm:rounded-lg rounded-none transition-all mt-2 m-auto">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{!! session('success') !!}</span>
            </div>
        </div>
    @endif

    @if (count($saved) > 0)
        <div class="grid grid-cols-2 m-4 items-center">
            <span class="text-lg">
                {{ $saved->count() }} Recipes
            </span>
            <form action="/user/dashboard/recipe" class="relative block justify-self-end">
                <label>
                    <input type="text" name="search" placeholder="Search"
                        class="input input-bordered rounded-md w-full max-w-xs" value="{{ request('search') }}" />
                </label>
            </form>
        </div>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10 mb-5 mt-5 mx-4">
            @foreach ($saved as $book)
                <div class="bg-white rounded overflow-hidden shadow-md relative hover:bg-whitep transition-all ">
                    @if ($book->recipe->image)
                        <a href="/{{ $book->recipe->id }}">
                            <img src="{{ asset('storage/' . $book->recipe->image) }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @else
                        <a href="/{{ $book->recipe->id }}">
                            <img src="https://source.unsplash.com/1000x1000/?{{ $book->recipe->recipe_name }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @endif
                    <div class="grid grid-cols-2">
                        <div class="m-4">
                            <span class="font-bold block"
                                style=" overflow: hidden;  white-space: nowrap; text-overflow: ellipsis;">
                                {{ $book->recipe->recipe_name }}
                            </span>
                            <a class="text-sm hover:text-gray-300" href="/maker/{{ $book->recipe->maker->id }}">
                                {{ $book->recipe->maker->name }}
                            </a>
                        </div>
                        <div class="ml-auto mr-5 my-auto">
                            <form action="{{ route('recipes.unbookmark', $book->recipe->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"> <i
                                        class="bi bi-bookmark-fill text-2xl cursor-pointer  transition-all hover:text-red1"></i></button>
                            </form>

                        </div>
                    </div>

                    <div
                        class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 hover:scale-105 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $book->recipe->reads }}
                        </p>
                    </div>


                </div>
            @endforeach
        </div>
    @else
        <p class="text-center sm:text-2xl font-bold mt-5">No Bookmarked Recipe Found</p>
        <p class="text-center mt-2">Go find some <a class="text-green3 hover:text-green2" href="/">Recipe!</a></p>
    @endif


@endsection
