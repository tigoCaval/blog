@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert-primary">Editar Seção</div>
                <div class="card-body">
                    <!-- Mensagens de erros -->
                    @if($errors->any())
                        @foreach($errors->all() as $error )
                            <p class="alert alert-danger"> 
                            {{$error}}
                            </p> 
                        @endforeach
                    @endif
                
                   <form method="Post" action="{{route('sections.update',$section->id)}}">
                        @csrf
                        @method('Put')

                        <div class="form-group">
                          <label for="labelDescription">Descrição</label>
                          <input type="text" class="form-control" id="inputDescription" name="description" autocomplete="off" placeholder="Inserir descrição" value="{{$section->description}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                  
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection