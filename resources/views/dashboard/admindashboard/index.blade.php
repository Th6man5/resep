@extends('dashboard.layouts.admin.main')
@section('container')
    <div id="content" class="bg-black col-span-9  p-6">
        <div>
            <div class="ml-auto">
                <a target="_blank" title="Print" onclick="window.print(); return false;" id="print"
                    class="btn bg-green3 hover:bg-green2  border-none rounded-lg "><i
                        class="bi bi-printer-fill text-2xl  text-white"></i></a>
            </div>
            <h1 class="font-bold py-4 uppercase">Reports</h1>
            <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-1">
                            <i class="bi bi-people text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-indigo-300 text-sm font-medium uppercase leading-4">Users</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $user->count() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-2">
                            <i class="bi bi-card-text text-3xl"></i>
                        </div>
                        <div>
                            <p
                                class="text-teal-300
                                text-sm font-medium uppercase leading-4">
                                Recipes</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $recipe->count() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-3">
                            <i class="bi bi-exclamation-octagon text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-red-400
                                text-sm font-medium uppercase leading-4">
                                Reports</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $report->count() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-4">
                            <i class="bi bi-tag text-3xl"></i>
                        </div>
                        <div>
                            <p
                                class="text-blue-400
                                text-sm font-medium uppercase leading-4">
                                Category</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $category->count() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/10 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-5">
                            <i class="bi bi-flag text-3xl"></i>
                        </div>
                        <div>
                            <p
                                class="text-yellow-400
                                text-sm font-medium uppercase leading-4">
                                Country</p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                <span>{{ $country->count() }}</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
