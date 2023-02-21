@extends('layouts.main')
@section('content')
    <div class="grid lg:grid-cols-2 gap-10 relative mb-10">
        <div class="rounded">
            <div class="sticky top-0 " style="top: 100px">
                @if ($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" class=" object-cover shadow-md rounded-lg">
                @else
                    <img src="https://source.unsplash.com/1000x1000/?{{ $recipe->recipe_name }}"
                        class=" object-cover rounded shadow-md">
                @endif
                <div
                    class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 hover:scale-105 transition-all">
                    <i class="bi bi-eye-fill text-lg"></i>
                    <p>
                        {{ $recipe->reads }}
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded border-2  shadow-md p-5">
            <div class="grid grid-cols-4  gap-2 mx-10 p-6 ">

                {{--  Bookmark --}}
                @if ($isBookmarked)
                    <form action="{{ route('recipes.unbookmark', $recipe) }}" method="POST"
                        class="btn bg-yellow1 hover:bg-yellow2 text-black border-none hover:scale-105 text-xs md:text-sm">
                        @csrf
                        @method('delete')
                        <button type="submit" class="uppercase" title="Unbookmark"><i
                                class="bi bi-bookmark-fill text-2xl text-white"></i></button>
                    </form>
                @else
                    <form action="{{ route('recipes.bookmark', $recipe) }}" method="POST"
                        class="btn bg-yellow2 hover:bg-yellow1 text-black border-none hover:scale-105 text-xs md:text-sm">
                        @csrf
                        <button type="submit" class="uppercase" title="Bookmark">
                            <i class="bi bi-bookmark text-2xl text-white"></i>
                        </button>
                    </form>
                @endif

                <a class="hidden" href="{{ route('recipe', ['recipe' => $recipe->id]) }}">Example Link</a>

                {{--  Print --}}
                <a href="{{ route('generate_pdf', $recipe->id) }}" target="_blank" title="Save"
                    class="btn bg-green3 hover:bg-green2 text-black border-none hover:scale-105 text-xs md:text-sm"><i
                        class="bi bi-save-fill text-2xl text-white"></i></a>
                {{--  Share --}}
                <button class="btn bg-green3 hover:bg-green2 text-black border-none hover:scale-105 text-xs md:text-sm"
                    id="copy-link-btn" title="Copy Link"><i class="bi bi-share-fill text-2xl text-white"></i></button>
                {{--  Report --}}
                <button title="Report"
                    class="btn bg-red1 hover:bg-red2 text-black border-none hover:scale-105 text-xs md:text-sm">
                    <i class="bi bi-flag-fill text-2xl text-white"></i></button>
            </div>

            <hr>

            <h1 class="mt-3 text-2xl text-center bold">{{ $recipe->recipe_name }}</h1>

            <div class="text-center my-3 text-lg">
                <a class="text-green3 hover:text-green2 transition-all"
                    href="/maker/{{ $recipe->maker->id }}">{{ $recipe->maker->name }} <span
                        class="text-slate-400">#{{ $recipe->maker->username }}</span>
                </a>
            </div>

            <hr>

            <h1 class="mt-3 text-2xl text-center  uppercase">About</h1>

            <div class="mx-4 my-3">{{ $recipe->about }}</div>

            <hr>
            <div class="grid grid-cols-2 mx-10 text-center text-lg mt-3 p-1 rounded-md">

                <span class=" rounded-l-md p-1 bg-black text-white">
                    <i class="bi bi-clock-fill"></i> {{ $recipe->time }} Minutes
                </span>

                <span class="rounded-r-md p-1 bg-black text-white">
                    <i class="bi bi-person-fill"></i> {{ $recipe->portion }} Portion
                </span>
            </div>
            <h1 class="mt-3 text-2xl text-center  uppercase">Ingredients</h1>

            <div class="mx-4 my-4">{!! $recipe->ingredients !!}</div>

            <hr>

            <h1 class="mt-3 text-2xl text-center  uppercase">Steps</h1>
            <div class="mx-4 my-4">{{ $recipe->steps }}</div>
            <div class="text-center mt-5">
                <form method="POST" action="{{ route('recipes.rate', $recipe->id) }}">
                    @csrf
                    <label for="rating">Rate this recipe:</label>
                    <div class="rating">
                        <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-orange-400"
                            {{ $userRating == 1 ? 'checked' : '' }} checked />
                        <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-orange-400"
                            {{ $userRating == 2 ? 'checked' : '' }} />
                        <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-orange-400"
                            {{ $userRating == 3 ? 'checked' : '' }} />
                        <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-orange-400"
                            {{ $userRating == 4 ? 'checked' : '' }} />
                        <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-orange-400"
                            {{ $userRating == 5 ? 'checked' : '' }} />
                    </div>
                    <button type="submit"
                        class="btn rounded bg-yellow-500 text-black hover:bg-yellow-600 border-none sm:mt-2">Submit
                        rating</button>
                </form>
            </div>

        </div>
    </div>
    <form method="POST" action="{{ route('comments.store', ['recipe' => $recipe->id]) }}">
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <textarea class="textarea textarea-bordered rounded w-full" name="body" placeholder="Give a comment"></textarea>
        <button class="btn mb-5 rounded-md" type="submit">Submit</button>
    </form>



    <div class="bg-white w-full rounded-lg p-4 shadow-md">
        <h1 class="text-4xl text-center font-bold uppercase text-black">Comments</h1>
        @if ($recipe->comments->count())
            <hr class="border-black border-2 bg-black rounded-md m-3">
            <div class="m-2">
                @foreach ($recipe->comments as $comment)
                    <div class="m-2 bg-white1 p-2 rounded-lg">
                        <div class="flex flex-row items-center">
                            @if (auth()->user()->username == $comment->user->username)
                                <h4 class="text-xl flex-none mr-1 leading-none text-red-600">{{ $comment->user->name }}
                                @else
                                    <h4 class="text-xl flex-none mr-1 leading-none">{{ $comment->user->name }}
                            @endif
                            <h4 class="text-sm text-slate-500">#{{ $comment->user->username }}</h4>
                        </div>
                        <p class="text-xs text-slate-400">Posted {{ $comment->created_at->diffForHumans() }}</p>
                        <p class="text-md mt-2 m-2">{{ $comment->body }}</p>
                    </div>
                    <hr class="border-black">
                @endforeach
            </div>
        @else
            <div class="flex items-center justify-center my-5">
                <p class="text-center ">No Comments Yet</p>
                <p class="text-center font-bold ml-1 underline">Be the First!</p>
            </div>
        @endif
    </div>



    <script>
        //Copy Link
        const copyLinkBtn = document.querySelector('#copy-link-btn');
        const link = "{{ route('recipe', ['recipe' => $recipe->id]) }}";

        copyLinkBtn.addEventListener('click', () => {
            navigator.clipboard.writeText(link)
                .then(() => {
                    alert('Link copied to clipboard');
                })
                .catch(err => {
                    alert('Failed to copy link: ', err);
                });
        });


        //PDF
        function printPDF() {
            window.print('invoice.blade.pdf');
        }
    </script>
@endsection
