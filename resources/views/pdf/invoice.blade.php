<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>

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
</style>
<div style="text-align: center;">
    <img src="{{ public_path('storage/' . $recipe->image) }}" style="width: 100%; height: 50%;">
</div>
<h1 style="text-align: center; text-transform: uppercase;">{{ $recipe->recipe_name }}</h1>
<hr>
<p style="text-align: center; margin-top: 20px; margin-bottom: 20px;">{{ $recipe->about }}</p>
<hr>
<h2 style="text-align: center">Ingredients</h2>
<p style="margin-bottom: 20px;">{!! $recipe->ingredients !!}</p>
<hr>
<h2 style="text-align: center">Steps</h2>
<p style="margin-bottom: 20px;">{{ $recipe->steps }}</p>
<hr>

{{-- <div class="page-break"></div>
<h1>Page 2</h1> --}}
