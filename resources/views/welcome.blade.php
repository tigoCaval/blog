@extends('layouts.navbar')

@section('content')
    
<div class="container" >
    <div class="row">
      @foreach ($articles as $item)
          <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"></div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <a href="{{url('/article',$item->id)}}">  
                      <p><img class="img-fluid" src="{{$item->image}}" alt="" width="168" height="168"></p>
                      <p><strong>{{$item->title}}</strong> </p>
                    </a> 
                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    {{ $articles->links() }}
</div>



@endsection