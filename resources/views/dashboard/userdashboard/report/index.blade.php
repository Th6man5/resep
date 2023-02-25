@extends('dashboard.layouts.make')
@section('content')
    {{-- <a href="{{ route('user.report.generate_pdf') }}" target="_blank" title="Save"
            class="btn bg-green3 hover:bg-green2 text-black border-none text-xs md:text-sm"><i
                class="bi bi-save-fill text-2xl text-white"></i></a> --}}
    <style>
        .circle {

            border-radius: 50%;
            display: inline-block;
            height: 50px;
            width: 50px;
        }

        @media print {
            #button {
                display: none;
            }

            #recipes {
                display: none;
            }

            #hrtag {
                display: none;
            }

            #hrtag2 {
                display: none;
            }

            #reportses {
                margin-bottom: 10px;
            }

            #paginate {
                display: none;
            }

            #throphy {
                display: none;
            }
        }
    </style>
    <div class="ml-auto">
        <a target="_blank" title="Print" onclick="window.print(); return false;" id="button"
            class="btn bg-green3 hover:bg-green2  border-none rounded-lg "><i
                class="bi bi-printer-fill text-2xl  text-white"></i></a>
    </div>
    <main>

        <h3 class="text-center my-3 text-4xl">Recipe Reports</h3>


        <div class="stats stats-vertical md:stats-horizontal shadow  flex" id="reportses">

            <div class="stat">
                <div class="stat-figure ">
                    <i class="bi bi-bookmark-heart-fill lg:text-3xl hidden lg:block text-red1"></i>
                </div>
                <div class="stat-title">Saved</div>
                <div class="stat-value">{{ $saved->count() }}</div>

            </div>

            <div class="stat">
                <div class="stat-figure ">
                    <i class="bi bi-eye-fill lg:text-3xl hidden lg:block text-blue-700"></i>
                </div>
                <div class="stat-title">Views</div>
                <div class="stat-value">{{ $view }}</div>
            </div>

            <div class="stat">
                <div class="stat-figure ">
                    <i class="bi bi-credit-card-2-front-fill lg:text-3xl hidden lg:block text-green-700"></i>
                </div>
                <div class="stat-title">Recipes</div>
                <div class="stat-value">{{ $recipe->total() }}</div>
            </div>

        </div>





        <hr class="mb-5 mt-5 border-slate-300" id="hrtag2">
        {{-- Throphies Icon --}}
        <div class="text-center">
            <div class="circle bg-primary1 hover:bg-secondary1  transition-all " id="throphy">
                <i class="bi bi-trophy-fill" style="font-size: 2rem; color: white;"></i>
            </div>
            <p class="text-xl uppercase mb-5 mt-1">Top 3</p>
        </div>

        @if ($recipe->count())
            <div class="grid lg:grid-cols-3  mb-10 gap-4">
                <div class="bg-white rounded overflow-hidden shadow-md relative hover:bg-whitep transition-all">
                    @if ($recipe[0]->image)
                        <a href="/{{ $recipe[0]->id }}">
                            <img src="{{ asset('storage/' . $recipe[0]->image) }}" class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @else
                        <a href="/{{ $recipe[0]->id }}">
                            <img src="https://source.unsplash.com/1000x1000/?{{ $recipe[0]->recipe_name }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @endif
                    <div class="m-4">
                        <span class="font-bold block">
                            {{ $recipe[0]->recipe_name }}
                        </span>
                        <a class=" text-gray-500 text-sm hover:text-slate-600  transition-all">
                            {{ $recipe[0]->country->name ?? 'Unknown' }}
                        </a>

                    </div>
                    <div
                        class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $recipe[0]->views->count() }}
                        </p>
                    </div>

                </div>

                <div class="bg-white rounded overflow-hidden shadow-md relative hover:bg-whitep transition-all">
                    @if ($recipe[1]->image)
                        <a href="/{{ $recipe[1]->id }}">
                            <img src="{{ asset('storage/' . $recipe[1]->image) }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @else
                        <a href="/{{ $recipe[1]->id }}">
                            <img src="https://source.unsplash.com/1000x1000/?{{ $recipe[1]->recipe_name }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @endif
                    <div class="m-4">
                        <span class="font-bold block">
                            {{ $recipe[1]->recipe_name }}
                        </span>
                        <a class=" text-gray-500 text-sm hover:text-slate-600  transition-all">
                            {{ $recipe[1]->country->name ?? 'Unknown' }}
                        </a>
                    </div>
                    <div
                        class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $recipe[1]->views->count() }}
                        </p>
                    </div>

                </div>

                <div class="bg-white rounded overflow-hidden shadow-md relative hover:bg-whitep transition-all">
                    @if ($recipe[2]->image)
                        <a href="/{{ $recipe[2]->id }}">
                            <img src="{{ asset('storage/' . $recipe[2]->image) }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @else
                        <a href="/{{ $recipe[2]->id }}">
                            <img src="https://source.unsplash.com/1000x1000/?{{ $recipe[2]->recipe_name }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @endif
                    <div class="m-4">
                        <span class="font-bold block">
                            {{ $recipe[2]->recipe_name }}
                        </span>
                        <a class=" text-gray-500 text-sm hover:text-slate-600  transition-all">
                            {{ $recipe[2]->country->name ?? 'Unknown' }}
                        </a>

                    </div>
                    <div
                        class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $recipe[2]->views->count() }}
                        </p>
                    </div>

                </div>


            </div>

            <hr class="mb-10 border-slate-300" id="hrtag">


            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10" id="recipes">
                @foreach ($recipe->skip(3) as $resep)
                    <div class="bg-white rounded overflow-hidden shadow-md relative hover:bg-whitep transition-all">
                        @if ($resep->image)
                            <a href="/{{ $resep->id }}">
                                <img src="{{ asset('storage/' . $resep->image) }}"
                                    class="w-full h-32 sm:h-48 object-cover">
                            </a>
                        @else
                            <a href="/{{ $resep->id }}">
                                <img src="https://source.unsplash.com/1000x1000/?{{ $resep->recipe_name }}"
                                    class="w-full h-32 sm:h-48 object-cover">
                            </a>
                        @endif
                        <div class="m-4">
                            <span class="font-bold block">
                                {{ $resep->recipe_name }}
                            </span>
                            <a class=" text-gray-500 text-sm hover:text-slate-600  transition-all">
                                {{ $resep->country->name ?? 'Unknown' }}
                            </a>

                        </div>
                        <div
                            class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 transition-all">
                            <i class="bi bi-eye-fill text-lg"></i>
                            <p>
                                {{ $resep->views->count() }}
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>
            <div class="mt-10 mb-10" id="paginate">
                {{ $recipe->render() }}
            </div>
        @else
            <p class="text-sm font-semibold mt-2 pt-1 mb-0 text-center">
                No Recipe found!
                <a href="/user/dashboard/recipe/create"
                    class="text-green-600 hover:text-green-700 focus:text-green-700 transition duration-200 ease-in-out">Make
                    Recipe?</a>
            </p>
        @endif
    </main>

@endsection
