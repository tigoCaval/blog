@extends('layouts.admin')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Painel de Controle</h1>
    
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      @can('view-any', App\Models\Section::class)
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Painel Seção</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <a href="{{route('sections.index')}}">Seção</a>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan 
      <!-- Earnings (Monthly) Card Example -->
      @can('view-any', App\Models\Content::class)
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Painel Artigos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                 <a href="{{route('contents.index')}}">Artigos</a> 
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-align-justify fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Meus Artigos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div> <!-- End Row -->

  </div>
  <!-- /.container-fluid -->
  

@endsection
