@extends('dashboard.layouts.main')
@section('content')




<div class="container mt-3">
  <div class="row">
     @foreach ($recipe as $resep)
     <div class="col-md-6">
 <div class="card mb-3" style="max-width: 600px; margin: auto;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://source.unsplash.com/1000x1000/?food" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $resep->recipe_name }}</h5>
        <div class="button">
<a href="#" class="btn btn-info "><i class="bi bi-eye-fill"></i>  </a>
               <a href="#" class="btn btn-warning "><i class="bi bi-pencil-square"></i></a>
        </div>
               

      </div>
    </div>
  </div>
</div>
     </div>
   
 
        


@endforeach
 </div>
         </div>


        </div>
        
    </div>
</div>

@endsection