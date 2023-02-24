@extends('layouts.main')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success shadow-none sm:rounded-lg rounded-none transition-all m-auto mb-4">
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
    @if (session()->has('error'))
        <div class="alert alert-success shadow-none sm:rounded-lg rounded-none transition-all m-auto mb-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @error('reason')
        <div class="alert alert-warbubf shadow-none sm:rounded-lg rounded-none transition-all m-auto mb-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>{{ $message }}</span>
            </div>
        </div>
    @enderror

    {{-- IMAGE --}}
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
                <label title="Report" for="my-modal-3"
                    class="btn bg-red1 hover:bg-red2 text-black border-none hover:scale-105 text-xs md:text-sm">
                    <i class="bi bi-flag-fill text-2xl text-white"></i></label>



            </div>

            <hr>

            {{--  RECIPE NAME --}}
            <h1 class="mt-3 text-2xl text-center bold">{{ $recipe->recipe_name }}</h1>

            <div class="text-center my-3 text-lg">
                <a class="text-green3 hover:text-green2 transition-all"
                    href="/maker/{{ $recipe->maker->id }}">{{ $recipe->maker->name }} <span
                        class="text-slate-400">#{{ $recipe->maker->username }}</span>
                </a>
            </div>

            <hr>

            {{-- ABOUT --}}
            <h1 class="mt-3 text-2xl text-center  uppercase">About</h1>

            <div class="mx-4 my-3">{{ $recipe->about }}</div>

            <hr>

            {{-- TIME & PORTION --}}
            <div class="grid grid-cols-2 mx-10 text-center text-lg mt-3 p-1 rounded-md">

                <span class=" rounded-l-md p-1 bg-black text-white">
                    <i class="bi bi-clock-fill"></i> {{ $recipe->time }} Minutes
                </span>

                <span class="rounded-r-md p-1 bg-black text-white">
                    <i class="bi bi-person-fill"></i> {{ $recipe->portion }} Portion
                </span>
            </div>

            {{-- INGREDIENTS --}}
            <h1 class="mt-3 text-2xl text-center  uppercase">Ingredients</h1>

            <div class="mx-4 my-4">{!! $recipe->ingredients !!}</div>

            <hr>

            {{--  STEPS --}}
            <h1 class="mt-3 text-2xl text-center  uppercase">Steps</h1>
            <div class="mx-4 my-4">{{ $recipe->steps }}</div>

            {{-- RATING --}}
            <div class="text-center mt-5 bg-whitep rounded-xl p-5">
                <div class="mb-2">
                    @if ($recipe->ratings()->count() > 0)
                        <span>Rating average: {{ number_format($recipe->averageRating(), 1) }}</span>
                    @else
                        <span>No ratings yet.</span>
                    @endif
                </div>
                <form method="POST" action="{{ route('recipes.rate', $recipe->id) }}">
                    @csrf
                    <label>Rate this recipe:</label>
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

    {{-- COMMENTS --}}
    <form method="POST" action="{{ route('comments.store', ['recipe' => $recipe->id]) }}">
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <textarea class="textarea textarea-bordered rounded w-full" name="body" placeholder="Give a comment"></textarea>
        <button class="btn mb-5 rounded-md" type="submit">Submit</button>
    </form>



    <div class="bg-white w-full rounded-lg p-4 shadow-md">
        <h1 class="text-4xl text-center font-bold uppercase text-black">Comments</h1>
        @if ($recipe->comments->count())
            <hr class="border-black my-3">
            <div class="m-2">
                @foreach ($recipe->comments as $comment)
                    <div class="m-2 bg-whitep p-5 rounded-lg">
                        <div class="flex flex-row items-center">
                            @if (auth()->check() && auth()->user()->id === $comment->user_id)
                                <h4 class="text-xl flex-none mr-1 leading-none text-red-600">{{ $comment->user->name }}
                                @else
                                    <h4 class="text-xl flex-none mr-1 leading-none">{{ $comment->user->name }}
                            @endif
                            <h4 class="text-sm text-slate-500">#{{ $comment->user->username }}</h4>
                            <div class="ml-auto">
                                @if (auth()->check() && auth()->user()->id === $comment->user_id)
                                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}"
                                        onsubmit="return confirm('are you sure you want to delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i
                                                class="bi bi-x-octagon-fill text-2xl text-red-500 hover:text-red-600"></i></button>
                                    </form>
                                @endif
                            </div>

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



    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Report</h3>
            <p class="py-4">
                Please report any content that contains advertising, pornography, hate speech, or other content unrelated to
                cooking to the MealsUP team. Thank you.
            <form method="POST" action="{{ route('recipes.report', $recipe->id) }}">
                @csrf
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Reason for Report</span>
                    </label>
                    <select name="reason"class="rounded-lg">
                        <option value="">Select a reason</option>
                        <option value="inappropriate content">Inappropriate content</option>
                        <option value="inaccurate information">Inaccurate information</option>
                        <option value="other">Other</option>
                    </select>

                </div>
                <div class="form-control w-full max-w-xs mt-3">
                    <label class="label">
                        <span class="label-text">Aditional Details:</span>
                    </label>
                    <textarea name="details" class="rounded-lg"></textarea>

                </div>
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-success">Submit Report</button>
                </div>
            </form>
            </p>
        </div>
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
            window.print('recipe.blade.pdf');
        }
    </script>
@endsection
