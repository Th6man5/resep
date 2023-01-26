@extends('layouts.main')
@section('content')
    <div class="grid lg:grid-cols-2 gap-10 relative mb-10">
        <div class="rounded">
            <div class="sticky top-0 shadow-md" style="top: 100px">
                @if ($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" class=" object-cover">
                @else
                    <img src="https://source.unsplash.com/1000x1000/?{{ $recipe->recipe_name }}" class=" object-cover">
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
        <div class="bg-white rounded border-2  shadow-md">
            <div class="grid grid-cols-4 gap-2 mx-10 p-6 ">
                <button
                    class="btn bg-yellow1 hover:bg-yellow2 text-black border-none hover:scale-105 sm:text-xs lg:text-sm">Save</button>
                <a href="" @click.prevent="printme" target="_blank"
                    class="btn bg-green1 hover:bg-green2 text-black border-none hover:scale-105 sm:text-xs lg:text-sm">Print</a>
                <button onclick="copyText()"
                    class="btn bg-green1 hover:bg-green2 text-black border-none hover:scale-105 sm:text-xs lg:text-sm">Share</button>
                <button class="btn bg-red1 hover:bg-red2 text-black border-none hover:scale-105 sm:text-xs lg:text-sm">
                    Report</button>
            </div>

            <hr>

            <h1 class="mt-3 text-2xl text-center bold">{{ $recipe->recipe_name }}</h1>

            <div class="text-center my-3 text-lg">
                <a class="text-green1 hover:text-green2 transition-all"
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

            <script>
                function copyText() {

                    /* Copy text into clipboard */
                    navigator.clipboard.writeText("http://127.0.0.1:8000/{{ $recipe->id }}");
                    alert("Text Copied!");
                }

                const app = new Vue({
                    el: '#app',
                    router,
                    data: {
                        search: ''
                    },
                    methods: {
                        searchit: _.debounce(() => {
                            Fire.$emit('searching');
                        }, 1000),

                        printme() {
                            window.print();
                        }
                    },
                });
            </script>
        @endsection
