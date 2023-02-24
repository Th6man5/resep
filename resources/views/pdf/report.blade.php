<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
    @vite('resources/css/app.css')
</head>
<style>
    * {
        font-family: 'Montserrat', sans-serif;
    }

    .page-break {
        page-break-after: always;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .flex {
        text-align: center;
    }

    .card {
        background-color: burlywood;
        padding: 10px;



    }

    img {
        border-radius: 10px;
    }
</style>

<body>
    <table class="flex">
        <tbody>

            <td class="card">

                <img src="{{ public_path('storage/' . $recipe[0]->image) }}">
                <h2>{{ $recipe[0]->recipe_name }}</h2>
                <p>Number of views: {{ $recipe[0]->reads }}</p>
            </td>

            <td class="card">
                <img src="{{ public_path('storage/' . $recipe[1]->image) }}">
                <h2>{{ $recipe[1]->recipe_name }}</h2>
                <p>Number of views: {{ $recipe[1]->reads }}</p>
            </td>


            <td class="card">
                <img src="{{ public_path('storage/' . $recipe[2]->image) }}">
                <h2>{{ $recipe[2]->recipe_name }}</h2>
                <p>Number of views: {{ $recipe[2]->reads }}</p>
            </td>


        </tbody>
    </table>

    <div class="card">
        <p>Number of views: {{ $view }}</p>
    </div>



    <p class="m-0">Saved</p>
    <p class="m-0">Total: {{ $saved->count() }} </p>
</body>

{{-- <div class="page-break"></div>
<h1>Page 2</h1> --}}
