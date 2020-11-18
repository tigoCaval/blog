@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
       

         <div class="col-md-8" >
            <div class="card">
               <div class="card-body">
                 <h2 class="text-center">{{$content->title}}</h2>    
                 <div>
                 <p class="text-center"> Publicado por {{$content->user->name}}, {{$date}}</p>
                 </div>
                 <div class="text-center"><p><img class="img-fluid" src="{{$content->image}}" alt="" width="300" height="200"></p></div>
                  <p class="text-justify">{{$content->description}}</p>    
               </div>
            </div>
         </div>
          
    </div>
 </div>
@endsection