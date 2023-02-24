@extends('dashboard.layouts.admin.main')
@section('container')
    <div id="content" class="bg-black col-span-9  p-6">
        <div>
            <h1 class="font-bold py-4 uppercase">Reports</h1>
            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-1">
                            <i class="bi bi-flag text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-red-400
                                text-sm font-medium uppercase leading-4">
                                Total Reports</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $report->total() }}</span>
                            </p>
                        </div>
                    </div>
                </div>



                @if (session()->has('success'))
                    <div class="bg-green-500 p-6 rounded-lg">
                        <div class="flex flex-row space-x-4 items-center m-auto">
                            <div id="stats-1">
                                <i class="bi bi-check-circle text-3xl"></i>
                            </div>
                            <div>
                                {!! session('success') !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>

        <div class="py-6">

            <div class="grid  lg:grid-cols-3 md:grid-cols-2 grid-cols-1  gap-10">
                @foreach ($report as $rep)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-base-100">
                        <figure>
                            @if ($rep->recipe->image)
                                <img src="{{ asset('storage/' . $rep->recipe->image) }}">
                            @else
                                <img src="https://source.unsplash.com/500x500/?{{ $rep->recipe->recipe_name }}">
                            @endif

                        </figure>

                        <div class="card-body">

                            <h2 class="text-lg font-bold">Recipe Name: </h2>
                            <div>{{ $rep->recipe->recipe_name }}</div>
                            <h2 class="text-lg font-bold">Reason:</h2>
                            <div>{{ $rep->reason }}</div>
                            <h2 class="text-lg font-bold ">Details:</h2>
                            @if (is_null($rep->details))
                                none
                            @else
                                <div>{{ $rep->details }}</div>
                            @endif
                            <h2 class="text-lg font-bold ">Reporter:</h2>
                            <div>{{ $rep->user->username }}</div>
                            <div class="mt-4 text-center">
                                <form action="/admin/dashboard/report/{{ $rep->id }}"
                                    onsubmit="return confirm('are you sure you want to delete this?');" method="POST"
                                    class=" mb-2">
                                    @method('delete')
                                    @csrf
                                    <button title="Delete" class="btn hover:text-red-400 ">
                                        Delete Report
                                    </button>
                                </form>
                                <form action="/admin/dashboard/report/{{ $rep->id }}/destroy-with-recipe"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button title="Delete report and recipe" class="btn hover:text-red-400"
                                        type="submit">Delete
                                        Report and
                                        Recipe</button>
                                </form>
                            </div>




                        </div>
                    </div>
                @endforeach
            </div>
            {{ $report->links() }}
        </div>
    </div>
@endsection
