@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
      @if($user)
         <div class="col-md-auto" style="background-color: brown">
            @if(Auth::user()->photo)
              <img src="{{$user->photo}}" alt="" width="300" height="200">
            @endif   
         </div>

         <div class="col-md-8" style="background-color: chartreuse">
            <div class="card">
               <div class="card-body">
                  <label for=""> {{$user->name}}</label>
                  <p>{{$user->description}}</p>
               
               </div>
            </div>
         </div>
      @else
            <p> Seu perfil está vazio!!!!</p>    
      @endif  
    </div>
 </div>
@endsection