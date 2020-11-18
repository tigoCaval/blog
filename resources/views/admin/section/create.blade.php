@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert-primary">Cadastrar Seção</div>
                <div class="card-body">
                    <!-- Mensagens de erros -->
                    @if($errors->any())
                        @foreach($errors->all() as $error )
                            <p class="alert alert-danger"> 
                            {{$error}}
                            </p> 
                        @endforeach                    
                    @endif

                    <!-- $_SESSION SUCCESS -->
                    @if(session('success'))
                        <div class="alert alert-success">
                           {{session('success')}}   
                        </div>
                    @endif                 

                
                   <form method="Post" action="{{route('sections.store')}}">
                        @csrf

                        <div class="form-group">
                          <label for="labelDescription">Descrição</label>
                          <input type="text" class="form-control" id="inputDescription" name="description" autocomplete="off" placeholder="Inserir descrição">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                  
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection